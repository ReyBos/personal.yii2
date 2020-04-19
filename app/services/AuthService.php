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
        
        if ($user->save()) {
            $auth = \Yii::$app->authManager;
            $authorRole = $auth->getRole('user');
            $auth->assign($authorRole, $user->getId());
        
            return true;
            
        } else {
            throw new AuthException('При регистрации пользователя на сервере произошла ошибка, приносим извинения!');
        }
    }
    
}
