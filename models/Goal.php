<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "goal".
 *
 * @property int $id
 * @property string|null $event
 * @property string|null $goal
 * @property string|null $step_name_1
 * @property float|null $step_time_1
 */
class Goal extends \yii\db\ActiveRecord
{

    public $events = ["50 FREE" , "100 FREE"
    , "200 FREE", "500 FREE" , "1000 FREE" , "1650 FREE",
    "100 FLY" , "200 FLY" , "100 BACK" , "200 BACK", 
    "100 BREAST" , "200 BREAST"];
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'goal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['step_time_1', 'step_time_2', 'step_time_3', 'step_time_4', 'step_time_5'], 'number'],
            [['event', 'goal', 'step_name_1', 'step_name_2', 'step_name_3', 'step_name_4', 'step_name_5'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'event' => 'Event',
            'goal' => 'Goal',
            
    
        ];
    }

    public function getGoalsByUserId($id)
    {
        return Yii::$app->db->createCommand('select event from goal where user_id = :id', [':id' => $id])->queryColumn();
    }

    public function getSplit(){
        return $this->hasOne(Split::class, ['event_name'=>'event']);
    }

    public function getUser(){
        return $this->hasOne(User::class, ['id'=>'user_id']);
    }
    public function getGroup(){
        return $this->hasMany(User::class, ['id'=>'user_id']);
    }
}
