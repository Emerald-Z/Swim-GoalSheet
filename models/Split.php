<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "split".
 *
 * @property int $id
 * @property string|null $event_name
 * @property float|null $split_1
 * @property float|null $split_2
 * @property float|null $split_3
 * @property float|null $split_4
 * @property float|null $split_5
 */
class Split extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'split';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['split_1', 'split_2', 'split_3', 'split_4', 'split_5'], 'number'],
            [['event_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'event_name' => 'Event Name',
            'split_1' => 'Split 1',
            'split_2' => 'Split 2',
            'split_3' => 'Split 3',
            'split_4' => 'Split 4',
            'split_5' => 'Split 5',
        ];
    }
}
