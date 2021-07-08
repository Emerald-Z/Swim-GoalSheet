<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Team Goals');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="goal-teams">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
           
            [
                'label'=>'Name',
                'value'=>function($data){
                    return $data->user->first_name;
                }
            ],
            'event',
            'goal',
            'step_name_1',
            'step_time_1',
            'step_name_2',
            'step_time_2',
            'step_name_3',
            'step_time_3',
            'step_name_4',
            'step_time_4',
            'step_name_5',
            'step_time_5',
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
