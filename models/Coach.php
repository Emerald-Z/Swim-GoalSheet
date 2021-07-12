<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string|null $role
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $email
 * @property string|null $password
 * @property string|null $status
 * @property string|null $access_token
 * @property int|null $group_id
 * @property string|null $coach_code
 * @property int|null $coach_id
 */
class Coach extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['group_id', 'coach_id'], 'integer'],
            [['role', 'first_name', 'last_name', 'email', 'password', 'status', 'access_token', 'coach_code'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role' => 'Role',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'password' => 'Password',
            'status' => 'Status',
            'access_token' => 'Access Token',
            'group_id' => 'Group ID',
            'coach_code' => 'Coach Code',
            'coach_id' => 'Coach ID',
        ];
    }
}
