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
    const GENDER_MALE = 'male';
    const GENDER_FEMALE = 'female';
    
    public $birthday_site;
    
    public static function tableName()
    {
        return 'user_info';
    }

    public function rules()
    {
        return [
            [['first_name', 'last_name', 'birthday_site', 'gender'], 'required'],
            [['user_id'], 'integer'],
            [['birthday', 'registration_date'], 'safe'],
            [['birthday_site'], 'date', 'format' => 'php:d.m.Y'],
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
            'birthday_site' => 'Дата рождения',
            'gender' => 'Пол',
            'registration_date' => 'Дата регистрации',
            'is_active' => 'Статус',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
    
    public function getGenderList() 
    {
        return [
            self::GENDER_MALE => 'Мужской',
            self::GENDER_FEMALE => 'Женский',
        ];
    }
    
    public function getBirthday_site()
    {
        return $this->birthday ? date('d.m.Y', strtotime($this->birthday)) : '';
    }
}
