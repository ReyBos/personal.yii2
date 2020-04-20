<?php

namespace app\services;

use app\models\User;
use app\services\exceptions\AuthException;

class AuthService 
{
    /**
     * @param SignupForm $signupForm
     * @param UserInfo $userInfo
     * @return bool если пользователь сохранен успешно
     * @throws AuthException при ошибке сохранения пользователя
     */
    public function saveNewUser($signupForm, $userInfo)
    {
        $user = new User();
        $user->username = $signupForm->username;
        $user->password = \Yii::$app->security->generatePasswordHash($signupForm->password);
        
        if ($user->save()) {
            
            $userInfo->user_id = $user->id;
            $userInfo->birthday = date('Y-m-d', strtotime($userInfo->birthday_site));
            if (!$userInfo->save()) {
                throw new AuthException('При регистрации пользователя на сервере произошла ошибка, приносим извинения!');
            }
            
            $auth = \Yii::$app->authManager;
            $authorRole = $auth->getRole('user');
            $auth->assign($authorRole, $user->getId());
        
            return true;
            
        } else {
            throw new AuthException('При регистрации пользователя на сервере произошла ошибка, приносим извинения!');
        }
    }
    
}
