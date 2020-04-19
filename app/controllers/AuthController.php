<?php

namespace app\controllers;

use app\models\SignupForm;
use app\models\LoginForm;
use app\controllers\MainController;
use app\services\AuthService;
use app\services\exceptions\AuthException;

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
        
        return $rules;
    }
    
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            
            return $this->routeUser();
        }

        $model = new LoginForm();
        if ($model->load(\Yii::$app->request->post()) && $model->login()) {
            
            return $this->routeUser();
        }

        $model->password = '';
        
        return $this->render('index', [
            'loginForm' => $model,
            'signupForm' => new SignupForm(),
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
        
        $model = new SignupForm();
        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            
            try {
                AuthService::saveNewUser($model);
                \Yii::$app->getSession()->setFlash('success', 'Регистрация прошла успешно! Используйте свой логин и пароль для входа.');
                
                return $this->routeUser();
                
            } catch (AuthException $ex) {
                \Yii::$app->getSession()->setFlash('error', $ex->getMessage());
            }
        }
    
        return $this->render('index', [
            'loginForm' => new LoginForm(),
            'signupForm' => $model,
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
