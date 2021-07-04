<?php

use app\models\Goal;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Goal */

$this->title = Yii::t('app', 'Create Goal');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Goals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="goal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>
  

    <?= $form->field($model, 'event')->dropDownList($events) ?>

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
    <label id='label_step_name_5'> hekki </label>
    <?= $form->field($model, 'step_time_5')->textInput(['maxlength' => true]) -> label(false) ?>
    </div>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
