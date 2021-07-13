<?php

use app\models\Group;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Swimmer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="swimmer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?php if($model->role != 'swimmer'): ?>
    <div id = "status_div">
    <?= $form->field($model, 'status')->dropDownList(["active"=>"active", "inactive"=>"inactive"]) ?>
    </div>
    <?php endif;?>

    <?= $form->field($model, 'group_id')->dropDownList(Group::getAllGroups())->label('Group') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
