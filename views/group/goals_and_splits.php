<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Swimmer */

$this->title = 'group stats';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Group Stats'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="group-stats-view">

    <h1><?= Html::encode($this->title) ?></h1>
   

<h1>Goals</h1>
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'label'=>'First Name',
                'attribute' => 'first_name',
                'value'=>function($data){
                    return $data->user->first_name;
                }
            ],
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
            <?= $row->split->split_3 * $row->goal?>
            <?php echo "<br>"?>
            <?= $row->split->split_4 * $row->goal?>
            <?php echo "<br>"?>
            <?= $row->split->split_5 * $row->goal?>
            <?php echo "<br>"?>
        </div>
        <div class="col">
            <?= $row->split->split_1 * $row->goal * 1.15?>
            <?php echo "<br>"?>
            <?= $row->split->split_2 * $row->goal * 1.15?>
            <?php echo "<br>"?>
            <?= $row->split->split_3 * $row->goal * 1.15?>
            <?php echo "<br>"?>
            <?= $row->split->split_4 * $row->goal * 1.15?>
            <?php echo "<br>"?>
            <?= $row->split->split_5 * $row->goal * 1.15?>
            <?php echo "<br>"?>
        </div>
        <div class="col">
            <?= $row->split->split_1 * $row->goal * 1.1?>
            <?php echo "<br>"?>
            <?= $row->split->split_2 * $row->goal * 1.1?>
            <?php echo "<br>"?>
            <?= $row->split->split_3 * $row->goal * 1.1?>
            <?php echo "<br>"?>
            <?= $row->split->split_4 * $row->goal * 1.1?>
            <?php echo "<br>"?>
            <?= $row->split->split_5 * $row->goal* 1.1?>
            <?php echo "<br>"?>
        </div>
        <div class="col">
            <?= $row->split->split_1 * $row->goal * 1.05?>
            <?php echo "<br>"?>
            <?= $row->split->split_2 * $row->goal * 1.05?>
            <?php echo "<br>"?>
            <?= $row->split->split_3 * $row->goal * 1.05?>
            <?php echo "<br>"?>
            <?= $row->split->split_4 * $row->goal * 1.05?>
            <?php echo "<br>"?>
            <?= $row->split->split_5 * $row->goal * 1.05?>
            <?php echo "<br>"?>
        </div>
    </div>



<?php endforeach;?>





