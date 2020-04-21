<?php

namespace app\controllers;

use app\controllers\MainController;

class UserInfoController extends MainController
{
    public function behaviors()
    {
        $rules = parent::behaviors();
        $rules['access']['rules'] = [
            [
                'actions' => [
                    'index',
                    'template',
                ],
                'allow' => true,
                'roles' => ['@'],
            ],
        ];
        
        return $rules;
    }
    
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionTemplate()
    {
        $this->layout = 'main-template';
        
        return $this->render('index');
    }
}
