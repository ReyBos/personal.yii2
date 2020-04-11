<?php

use yii\db\Migration;

class m200411_151401_create_user_table extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => $this->string(255)->notNull()->unique(),
            'role' => $this->string(255)->notNull()->defaultValue('user'),
            'password' => $this->string(255)->notNull(),
            'auth_key' => $this->string(255),
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('user');
    }
}
