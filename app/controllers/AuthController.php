<?php

namespace app\controllers;

use app\models\SignupForm;
use app\models\LoginForm;
use app\controllers\MainController;
use app\services\AuthService;
use app\services\exceptions\AuthException;
use app\models\UserInfo;

class AuthController extends MainController
{
    public $layout = 'auth';
    
    public function behaviors()
    {
        $rules = parent::behaviors();
        $rules['access']['rules'] = [
            [
                'actions' => [
                    'login',
                    'logout',
                ],
                'allow' => true,
                'roles' => ['@'],
            ],
            [
                'actions' => [
                    'login',
                    'signup',
                ],
                'allow' => true,
                'roles' => ['?'],
            ],
        ];
        
        $rules['verbs']['actions'] = [
            'logout' => ['post', 'get'],
        ];
        
        return $rules;
    }
    
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            
            return $this->routeUser();
        }

        $loginForm = new LoginForm();
        if ($loginForm->load(\Yii::$app->request->post()) && $loginForm->login()) {
            
            return $this->routeUser();
        }

        $loginForm->password = '';
        
        return $this->render('index', [
            'loginForm' => $loginForm,
            'signupForm' => new SignupForm(),
            'userInfo' => new UserInfo(),
            //для определения какая вкладка активна на странице: логин/регистрация
            'isLogin' => true,
        ]);
    }
    
    public function actionLogout()
    {
        \Yii::$app->user->logout();

        return $this->routeUser();
    }
    
    public function actionSignup()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->routeUser();
        }
        
        $signupForm = new SignupForm();
        $userInfo = new UserInfo();
        
        if ($signupForm->load(\Yii::$app->request->post()) && 
            $userInfo->load(\Yii::$app->request->post()) && 
            $signupForm->validate() &&
            $userInfo->validate()
        ) {
            
            $transaction = \Yii::$app->db->beginTransaction();
            try {
                AuthService::saveNewUser($signupForm, $userInfo);
                $transaction->commit();
                \Yii::$app->getSession()->setFlash('success', 'Регистрация прошла успешно! Используйте свой логин и пароль для входа.');
                
                return $this->actionLogin();
                
            } catch (AuthException $ex) {
                $transaction->rollBack();
                \Yii::$app->getSession()->setFlash('error', $ex->getMessage());
            }
        }
                
        $signupForm->password = '';
        
        return $this->render('index', [
            'loginForm' => new LoginForm(),
            'signupForm' => $signupForm,
            'userInfo' => $userInfo,
            'isLogin' => false,
        ]);
    }
    
    protected function routeUser()
    {
        if (\Yii::$app->getUser()->getIdentity()) {
            
            if (\Yii::$app->user->can('moderator')) {
                return 'Админка';
            }
            
            if (\Yii::$app->user->can('user')) {
                
                return $this->redirect('/user-info/index');
            }
            
        } else {
            
            return $this->redirect('/auth/login');
        }
    }

}
