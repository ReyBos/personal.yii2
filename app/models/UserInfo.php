<?php

namespace app\models;

/**
 * This is the model class for table "user_info".
 *
 * @property int $id
 * @property int $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $birthday
 * @property string|null $gender
 * @property string|null $registration_date
 * @property string|null $is_active
 *
 * @property User $user
 */
class UserInfo extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'user_info';
    }

    public function rules()
    {
        return [
            [['user_id', 'first_name', 'last_name', 'birthday', 'gender'], 'required'],
            [['user_id'], 'integer'],
            [['birthday', 'registration_date'], 'safe'],
            [['gender', 'is_active'], 'string'],
            [['first_name', 'last_name'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'birthday' => 'День рождения',
            'gender' => 'Пол',
            'registration_date' => 'Дата регистрации',
            'is_active' => 'Статус',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
