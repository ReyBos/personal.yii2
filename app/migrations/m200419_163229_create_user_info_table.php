<?php

use yii\db\Migration;

class m200419_163229_create_user_info_table extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        
        $this->createTable('user_info', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'first_name' => $this->string(255)->notNull(),
            'last_name' => $this->string(255)->notNull(),
            'birthday' => $this->dateTime()->notNull(),
            'gender' => 'ENUM("male", "female")',
            'registration_date' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
            'is_active' => 'ENUM("active", "blocked", "deleted")',
        ], $tableOptions);
        
        $sql = "ALTER TABLE user_info ALTER gender SET DEFAULT 'male';"
                . "ALTER TABLE user_info ALTER is_active SET DEFAULT 'active'";
        $this->execute($sql);
        
        $this->createIndex('idx-user-username', 'user', 'username');
        $this->createIndex('idx-user_info-user_id', 'user_info', 'user_id');
        
        $this->addForeignKey(
            'fk-user_info-user_id', 
            'user_info', 
            'user_id', 
            'user', 
            'id',
        );
    }

    public function safeDown()
    {
        $this->dropTable('user_info');
        $this->dropIndex('idx-user-username', 'user');
        $this->dropIndex('idx-user_info-user_id', 'user_info');
        $this->dropForeignKey('fk-user_info-user_id', 'user_info');
    }
}
