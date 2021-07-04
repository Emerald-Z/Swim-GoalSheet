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

    <?= $form->field($model, 'event')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'goal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'step_time_1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'step_time_2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'step_time_3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'step_time_4')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'step_time_5')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
