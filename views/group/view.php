<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Group */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="group-view">

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
            'group_name',
        ],
    ]) ?>

<h1>Swimmers</h1>

<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'first_name',
            'last_name',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}',
                'buttons'=>[

                    'delete' => function ($url, $model, $key) {	

                      return Html::a('<span class="glyphicon glyphicon-trash">Remove from Group</span>', ['/swimmer/remove_from_group', 'id' => $model->id], [

                        'title' => Yii::t('yii', 'Create'),

                        ]);                                

  

                    }

                ]                 
            ],
        ],
    ]); ?>

</div>

<div class="view-group-stats">
<p>
    <?= Html::a('View Group Stats', ['/group/goals_and_splits', 'id' => $model->id], ['class'=>'btn btn-primary']) ?>

    </p>

</div>

