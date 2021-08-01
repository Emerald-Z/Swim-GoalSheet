<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Swimmers');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="swimmer-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Swimmer'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'first_name',
            'last_name',
            'email:email',
            'status',
            //'access_token',
            [
                'label'=>'Group',
                'attribute' => 'group',
                'value'=>function($data){
                    if ($data->group->group_name == null){
                        return "";
                    }
                    return $data->group->group_name;
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons'=>[

                    'whatever' => function ($url, $model, $key) {	

                      return Html::a('<span class="glyphicon glyphicon-plus">whate</span>', ['/swimmer/whatever', 'id' => $model->id], [

                        'title' => Yii::t('yii', 'Create'),

                        ]);                                

  

                    }

                ]                 
            ],
        ],
    ]); ?>



</div>
