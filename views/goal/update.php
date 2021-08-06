<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Goal */

$this->title = Yii::t('app', 'Update Goal: {name}', [
    'name' => $goal->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Goals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $goal->id, 'url' => ['view', 'id' => $goal->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="goal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $goal,
       // 'events' => $events,
    ]) ?>

</div>
