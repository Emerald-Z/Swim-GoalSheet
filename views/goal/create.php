<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Goal */

$this->title = Yii::t('app', 'Create Goal');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Goals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="goal-create">

<h1><?= Html::encode($this->title) ?></h1>

<?= $this->render('_form', [
    'model' => $goal,
    'events' => $events
]) ?>

</div>
