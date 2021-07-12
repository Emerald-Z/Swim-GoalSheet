<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Groups');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="group-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Group'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'group_name',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons'=>[

                    'Goals and Splits' => function ($url, $model, $key) {	

                      return Html::a('<span class="glyphicon glyphicon-plus">Goals and Splits</span>', ['/swimmer/goals_and_splits', 'id' => $model->id], [

                        'title' => Yii::t('yii', 'Create'),

                        ]);                                

  

                    }

                ]                 
            ],
        ],
    ]); ?>


</div>
