<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Coach */

$this->title = Yii::t('app', 'Create Coach');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Coaches'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coach-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
