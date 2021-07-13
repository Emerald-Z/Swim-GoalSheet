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

    <?php if (in_array($model->event, $start15)) : ?>
            <label id='label_step_name_1'>Start 15m</label>
        <?php else: ?>
            <label id='label_step_name_1'>Pace 50yd</label>
    <?php endif; ?>   
    <?= $form->field($model, 'step_time_1')->textInput(['maxlength' => true]) -> label(false) ?>

    <?php if (in_array($model->event, $start15)) : ?>
            <label id='label_step_name_2'>Start 25 yd</label>
        <?php elseif (in_array($model->event, $pace75)) : ?>
            <label id='label_step_name_2'>Pace 75 yd</label>
        <?php else: ?>
            <label id='label_step_name_2'>Pace 100 yd</label>
    <?php endif; ?> 
    <?= $form->field($model, 'step_time_2')->textInput(['maxlength' => true]) -> label(false) ?>

    <?php if ($model->event == "50 FREE") : ?>
            <label id='label_step_name_3'>Pace 25 yd</label>
    <?php elseif (in_array($model->event, ["100 FREE"=>"100 FREE", "100 FLY"=>"100 FLY", "100 BREAST"=>"100 BREAST", "100 BACK"=>"100 BACK"])) : ?>
        <label id='label_step_name_3'>Start 50yd</label>
    <?php elseif (in_array($model->event, ["1000 FREE"=>"1000 FREE", "1650 FREE"=>"1650 FREE"])) : ?>
        <label id='label_step_name_3'>Pace 150 yd</label>
    <?php else: ?>
        <label id='label_step_name_3'>Pace 100 yd</label>
    <?php endif; ?> 
    <?= $form->field($model, 'step_time_3')->textInput(['maxlength' => true]) -> label(false) ?>

    <?php if ($model->event == "50 FREE") : ?>
            <label id='label_step_name_4'>Turn 10yd</label>
        <?php elseif (in_array($model->event, ["100 FREE"=>"100 FREE", "100 FLY"=>"100 FLY", "100 BREAST"=>"100 BREAST", "100 BACK"=>"100 BACK"])) : ?>
            <label id='label_step_name_4'>Pace 25 yd</label>
        <?php else: ?>
            <label id='label_step_name_4'>Start 50 yd</label>
    <?php endif; ?> 
    <?= $form->field($model, 'step_time_4')->textInput(['maxlength' => true]) -> label(false) ?>

    <div id = "column_5">
    <?php if (in_array($model->event, ["100 FREE"=>"100 FREE", "100 FLY"=>"100 FLY", "100 BREAST"=>"100 BREAST", "100 BACK"=>"100 BACK"])) : ?>
            <script> $('#column_5').show(); </script>
            <label id='label_step_name_5'>Pace 50 yd</label>
        <?php elseif (in_array($model->event, ["50 FREE"=>"50 FREE", "1000 FREE"=>"1000 FREE", "1650 FREE"=>"1650 FREE"])) : ?>
            <script> $('#column_5').hide(); </script>
        <?php else: ?>
            <label id='label_step_name_5'>Start 100 yd</label>
    <?php endif; ?>    
    <?= $form->field($model, 'step_time_5')->textInput(['maxlength' => true]) -> label(false) ?>
    </div>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
    event = $('#goal-event').val;
    if (["50 FREE", "100 FREE", "100 FLY", "100 BREAST", "100 BACK"].includes(event)){
            $('#label_step_name_1').text('Start 15m');
            $('#label_step_name_2').text('Start 25yd');
            $('#label_step_name_3').text('Pace 100yd');
            $('#label_step_name_4').text('Start 50 yd');
            $('#label_step_name_5').text('Start 100 yd');

            if(strcmp($type_of_event, '50 FREE') == 0){
                $('#label_step_name_3').text('Start 50 yd');
                $('#label_step_name_4').text('Turn 10 yd');
            }


        }else if (["200 FREE", "500 FREE", "1000 FREE", "1650 FREE", "200 FLY", "200 BACK", "200 BREAST"].includes(event)){
            $('#label_step_name_1').text('Pace 50 yd');
            $('#label_step_name_2').text('Pace 75 yd');
            $('#label_step_name_3').text('Pace 100yd');
            $('#label_step_name_4').text('Start 50 yd');
            $('#label_step_name_5').text('Start 100 yd');

            if (["1000 FREE", "1650 FREE"].includes(event)){
                $('#label_step_name_2').text('Pace 100 yd');
                $('#label_step_name_3').text('Pace 150yd');
            }
        }
        
       


       if (["50 FREE", "1650 FREE", "1000 FREE"].includes(event)){
            $('#column_5').hide(); 
       } else {
            $('#column_5').show();  
       }

</script>

