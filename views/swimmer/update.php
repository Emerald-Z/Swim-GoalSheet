<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Swimmer */

$this->title = Yii::t('app', 'Update Swimmer: {name}', [
    'name' => $model->first_name." ".$model->last_name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Swimmers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->first_name." ".$model->last_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="swimmer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
