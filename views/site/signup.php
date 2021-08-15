<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Button;

/* @var $this yii\web\View */
/* @var $model app\models\Swimmer */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Sign Up';
?>

<div class="signup">
<p>
    <?= Html::a('Sign up as a Coach', ['/site/signup_coach'], ['class'=>'btn btn-primary']) ?>
    <?= Html::a('Sign up as a Swimmer', ['/site/signup_swimmer'], ['class'=>'btn btn-primary']) ?>

    </p>

</div>