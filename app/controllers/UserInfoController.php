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
}
