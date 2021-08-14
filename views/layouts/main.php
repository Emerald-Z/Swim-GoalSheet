<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap4\{Nav, NavBar, Breadcrumbs};

use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Swim GoalSheet',
        //Yii::$app->name

        'brandUrl' => Yii::$app->homeUrl,
        'innerContainerOptions' => ['class' => 'container-fluid'],
                'options' => [
                    'class' => 'navbar navbar-dark bg-dark navbar-expand-lg',
                ],

    ]);
    $items [] = ['label' => 'Login', 'url' => ['/site/login']];
    if (Yii::$app->user->isGuest) {
        $items  = [
            ['label' => 'Login', 'url' => ['/site/login']],
            ['label' => 'Sign Up', 'url' => ['/site/signup']],
        ];
    } else {
        if(Yii::$app->user->identity->role == 'swimmer'){
            $items = [
                ['label' => 'Goal', 'url' => ['/goal']],
                ['label' => 'Splits & Percents', 'url' => ['/goal/split']],
                ['label' => 'Account', 'url' => ['/swimmer/account', 'id' => Yii::$app->user->id]],
                '<li>'
                    . Html::beginForm(['/site/logout'], 'post')
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->email . ')',
                        ['class' => 'btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
            ];
        }
        else{
            $items = [
                ['label' => 'Swimmers', 'url' => ['/swimmer']],
                ['label' => 'Groups', 'url' => ['/group']],
                ['label' => 'Team Goals', 'url' => ['/goal/teamgoals']],
                ['label' => 'Account', 'url' => ['/coach/account', 'id' => Yii::$app->user->id]],
                '<li>'
                    . Html::beginForm(['/site/logout'], 'post')
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->email . ')',
                        ['class' => 'btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
            ];
        }
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ml-auto nav'],
        'items' => $items
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?php if (Yii::$app->user->identity->role == 'swimmer' ?? "") : ?>
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>

        <?php else: ?>
            <?= Breadcrumbs::widget([
                 'homeLink' => [ 
                    'label' => Yii::t('yii', 'Team Goals'),
                    'url' => ['/goal/teamgoals'],
               ],
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>

        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Swim GoalSheet <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
<script src="/application.js"></script>
</body>
</html>
<?php $this->endPage() ?>
