<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "group".
 *
 * @property int $id
 * @property string|null $group_name
 * @property int|null $coach_id
 */
class Group extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['coach_id'], 'integer'],
            [['group_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'group_name' => 'Group Name',
            'coach_id' => 'Coach ID',
        ];
    }

    public function getUser(){
        return $this->hasMany(User::class, ['group_id'=>'id']);
    }

    public static function getAllGroups(){
        $groups = Group::find()->all();
        $result = [];
        foreach ($groups as $group) {
            $result [$group->id] = $group->group_name;
        }
        return $result;
    }

}
