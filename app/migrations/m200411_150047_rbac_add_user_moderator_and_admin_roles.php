<?php

use yii\db\Migration;

class m200411_150047_rbac_add_user_moderator_and_admin_roles extends Migration
{
    public function safeUp()
    {
        $auth = Yii::$app->authManager;
        
        $role = $auth->createRole('user');
        $role->description = 'User';
        $auth->add($role);
        
        $role = $auth->createRole('moderator');
        $role->description = 'Moderator';
        $auth->add($role);
        
        $role = $auth->createRole('admin');
        $role->description = 'Admin';
        $auth->add($role);
    }

    public function safeDown()
    {
        $role = \Yii::$app->authManager->getRole("user");
        \Yii::$app->authManager->remove($role);
        
        $role = \Yii::$app->authManager->getRole("moderator");
        \Yii::$app->authManager->remove($role);
        
        $role = \Yii::$app->authManager->getRole("admin");
        \Yii::$app->authManager->remove($role);
    }
}
