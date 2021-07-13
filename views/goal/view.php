<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Goal */

$this->title = $model->event;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Goals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="goal-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'event',
            'goal',
            'step_name_1',
            'step_time_1',
            'step_name_2',
            'step_time_2',
            'step_name_3',
            'step_time_3',
            'step_name_4',
            'step_time_4',
            'step_name_5',
            'step_time_5',
        ],
    ]) ?>

</div>
