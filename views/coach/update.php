<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Coach */

$this->title = Yii::t('app', 'Edit Account: {name}', [
    'name' => $model->first_name,
]);
$this->params['breadcrumbs'][] = ['label' => $model->first_name, 'url' => ['account', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Edit Account');
?>
<div class="coach-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
