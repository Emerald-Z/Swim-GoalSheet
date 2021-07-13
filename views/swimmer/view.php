<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Swimmer */

$this->title = $model->first_name." ".$model->last_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Swimmers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="swimmer-view">

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

   

<h1>Goals</h1>
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
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
    ]); ?>


</div>

<header>
    <div class="row" id="SplitsHeading">    
        <h3 id="split_event" class='col'>Event</h3>
        <h3 id="event_goal" class='col'>Goal</h3>
        <h3 id="splits" class='col'>Splits</h3>
        <h3 id="85%" class='col'>85%</h3>
        <h3 id="90%" class='col'>90%</h3>
        <h3 id="95%" class='col'>95%</h3>
    </div>
</header>

<?php foreach($result as $row): ?>


    <div class="row SplitsTable">
        <div class="col">
            <?= $row->event ?>
        </div>
        <div class="col">
            <?= $row->goal ?>
        </div>
        <div class="col">
            <?= $row->split->split_1 * $row->goal?>
            <?php echo "<br>"?>
            <?= $row->split->split_2 * $row->goal?>
            <?php echo "<br>"?>
            <?= $row->split->split_3 ? ($row->split->split_3 * $row->goal) : ''?>
            <?php echo "<br>"?>
            <?= $row->split->split_4 ? ($row->split->split_4 * $row->goal) : ''?>
            <?php echo "<br>"?>
            <?= $row->split->split_5 ? ($row->split->split_5 * $row->goal) : '' ?>
            <?php echo "<br>"?>
        </div>
        <div class="col">
            <?= $row->split->split_1 * $row->goal * 1.15?>
            <?php echo "<br>"?>
            <?= $row->split->split_2 * $row->goal * 1.15?>
            <?php echo "<br>"?>
            <?= $row->split->split_3 ? ($row->split->split_3 * $row->goal * 1.15) : ''?>
            <?php echo "<br>"?>
            <?= $row->split->split_4 ? ($row->split->split_4 * $row->goal * 1.15) : ''?>
            <?php echo "<br>"?>
            <?= $row->split->split_5 ? ($row->split->split_5 * $row->goal * 1.15) : ''?>
            <?php echo "<br>"?>
        </div>
        <div class="col">
            <?= $row->split->split_1 * $row->goal * 1.1?>
            <?php echo "<br>"?>
            <?= $row->split->split_2 * $row->goal * 1.1?>
            <?php echo "<br>"?>
            <?= $row->split->split_3 ? ($row->split->split_3 * $row->goal * 1.1) : ''?>
            <?php echo "<br>"?>
            <?= $row->split->split_4 ? ($row->split->split_4 * $row->goal * 1.1) : ''?>
            <?php echo "<br>"?>
            <?= $row->split->split_5 ? ($row->split->split_5 * $row->goal * 1.1) : ''?>
            <?php echo "<br>"?>
        </div>
        <div class="col">
            <?= $row->split->split_1 * $row->goal * 1.05?>
            <?php echo "<br>"?>
            <?= $row->split->split_2 * $row->goal * 1.05?>
            <?php echo "<br>"?>
            <?= $row->split->split_3 ? ($row->split->split_3 * $row->goal * 1.05) : ''?>
            <?php echo "<br>"?>
            <?= $row->split->split_4 ? ($row->split->split_4 * $row->goal * 1.05) : ''?>
            <?php echo "<br>"?>
            <?= $row->split->split_5 ? ($row->split->split_5 * $row->goal * 1.05) : ''?>
            <?php echo "<br>"?>
        </div>
    </div>



<?php endforeach;?>





