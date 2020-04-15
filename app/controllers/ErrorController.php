<?php

namespace app\controllers;

use yii\web\Controller;

/**
 * ErrorController implements error showing operations
 */
class ErrorController extends Controller
{

    public function actions()
    {
        return [
            'index' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

}