<?php

namespace app\controllers;

use yii\web\Controller;

/**
 * ErrorController implements error showing operations
 */
class ErrorController extends Controller
{
    public function actionError()
    {
        $exception = \Yii::$app->errorHandler->exception;

        if ($exception !== null) {
            $statusCode = $exception->statusCode;
            $name = $exception->getName();
            $message = $exception->getMessage();

            $this->layout = 'error';

            return $this->render('error', [
                'exception' => $exception,
                'statusCode' => $statusCode,
                'name' => $name,
                'message' => $message,
            ]);
        }
    }
}