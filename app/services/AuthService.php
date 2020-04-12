<?php

namespace app\services;

use app\models\User;
use app\services\exceptions\AuthException;

class AuthService 
{
    /**
     * @param SignupForm $model
     * @return bool если пользователь сохранен успешно
     * @throws AuthException при ошибке сохранения пользователя
     */
    public function saveNewUser($model)
    {
        $user = new User();
        $user->username = $model->username;
        $user->password = \Yii::$app->security->generatePasswordHash($model->password);
        
        if($user->save()){
            return true;
            
        } else {
            throw new AuthException('Ошибка регистрации!');
        }
    }
    
}
