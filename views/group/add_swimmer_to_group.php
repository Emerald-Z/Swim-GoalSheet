<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Group;

/* @var $this yii\web\View */
/* @var $model app\models\Group */
/* @var $form yii\widgets\ActiveForm */

$this->title = "Add Swimmers to Group";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $models->group_name, 'url' => ['view', 'id' => $models->id]];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="add-swimmer-to-group-form">

    <h1>Add Swimmers to Group</h1>

    <?php $form = ActiveForm::begin(); ?>

        <?= Html::checkboxList('user_id', $model, $swimmer) ?>


    <div class="form-group">
        <?= Html::submitButton('Add', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
