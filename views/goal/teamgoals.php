<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Team Goals');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="goal-teams">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="search-form">
        <?php $form = ActiveForm::begin(); ?>
            <div class="row">
                <input type = 'text' name = 'name' value='<?=$name?>'>
                <input type='submit' >
            </div>
        <?php ActiveForm::end(); ?>
    </div>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
           
            [
                'label'=>'First Name',
                'attribute' => 'user_name',
                'value'=>function($data){
                    return $data->user->first_name;
                }
            ],
            [
                'label'=>'Last Name',
                'value'=>function($data){
                    return $data->user->last_name;
                }
            ],
            [
                'label'=>'Group',
                'value'=>function($data){
                    return $data->user->group->group_name;
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
