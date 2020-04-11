<?php

namespace app\controllers;

use app\models\SignupForm;
use app\models\LoginForm;
use app\controllers\MainController;

class AuthController extends MainController
{
    public function behaviors()
    {
        $rules = parent::behaviors();
        $rules['access']['rules'] = [
            [
                'actions' => [
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
            ]
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
        
        return $this->render('login', [
            'model' => $model,
        ]);
    }
    
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->routeUser();
    }
    
    public function actionSignup()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->routeUser();
        }
        
        $model = new SignupForm();
    
        return $this->render('signup', compact('model'));
    }
    
    protected function routeUser()
    {
        
    }

}
