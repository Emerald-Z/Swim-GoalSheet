<?php

use app\controllers\GoalController;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Goal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="goal-form">

    <?php $form = ActiveForm::begin(); ?>
  
    <?php if ($model->isNewRecord) : ?>
    <?= $form->field($model, 'event')->dropDownList($events) ?>
    <?php else: ?>
        <?= $form->field($model, 'event')->textInput(['readonly' => true]) ?>
    <?php endif; ?>

    <?= $form->field($model, 'goal')->textInput(['maxlength' => true]) ?>

    <label id='label_step_name_1'>Start 15m</label>
    <?= $form->field($model, 'step_time_1')->textInput(['maxlength' => true]) -> label(false) ?>

    <label id='label_step_name_2'>Start 25 yd</label>
    <?= $form->field($model, 'step_time_2')->textInput(['maxlength' => true]) -> label(false) ?>

    <label id='label_step_name_3'>Pace 25 yd</label>
    <?= $form->field($model, 'step_time_3')->textInput(['maxlength' => true]) -> label(false) ?>

    <label id='label_step_name_4'>Turn 10yd</label>
    <?= $form->field($model, 'step_time_4')->textInput(['maxlength' => true]) -> label(false) ?>

    <div id = "column_5">
    <label id='label_step_name_5'> </label>
    <?= $form->field($model, 'step_time_5')->textInput(['maxlength' => true]) -> label(false) ?>
    </div>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

