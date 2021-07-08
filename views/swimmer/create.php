<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Swimmer */

$this->title = Yii::t('app', 'Create Swimmer');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Swimmers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="swimmer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
