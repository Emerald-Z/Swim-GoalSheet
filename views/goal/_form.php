<?php

use app\controllers\GoalController;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Goal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="goal-form">

    <?php $start15 [] = ["50 FREE" =>"50 FREE", "100 FREE"=>"100 FREE", "100 FLY"=>"100 FLY", "100 BREAST"=>"100 BREAST", "100 BACK"=>"100 BACK"]; 
            $pace75 [] = ["200 FREE"=>"200 FREE", "500 FREE"=>"500 FREE", "200 FLY"=>"200 FLY", "200 BACK"=>"200 BACK", "200 BREAST"=>"200 BREAST"];
    ?>
    <?php $form = ActiveForm::begin(); ?>
  
    <?php if ($model->isNewRecord) : ?>
            <?= $form->field($model, 'event')->dropDownList($events) ?>
        <?php else: ?>
            <?= $form->field($model, 'event')->textInput(['readonly' => true]) ?>
    <?php endif; ?>

    <?= $form->field($model, 'goal')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
