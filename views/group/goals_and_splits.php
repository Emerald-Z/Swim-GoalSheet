<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Swimmer */

$this->title = 'Group stats';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->group_name, 'url' => ['view', 'id' => $model->id]];
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
            [
                'attribute'=>'goal',
                'value'=>function($data){
                    $index = strpos((string)$data->goal, '.');
                    $fraction = substr((string)$data->goal, $index);
                    return gmdate("i:s", $data->goal).$fraction;
                }
            ],
            'step_name_1',
            [
                'label'=>'Step Time 1',
                'value'=>function($data){
                    if ($data->event == '50 FREE'){
                        return (($data->goal - ($data->goal*1.03535/2)) * 0.65616) - 0.1;
                    } else if($data->event == '100 FREE'){
                        return (((($data->goal+1.6)/4)-1.6) + 1.7) / 4;
                    } else if($data->event == '200 FREE'){
                        return ($data->goal + 1.7) / 4;
                    } else if($data->event == '500 FREE'){
                        return ($data->goal + 1.7) / 10;
                    } else if($data->event == '1000 FREE'){
                        return ($data->goal+1.7)/20;
                    } else if($data->event == '1650 FREE'){
                        return ($data->goal+2)/33;
                    } else if($data->event == '100 FLY'){
                        return ((($data->goal-6)/4) * 0.65616) - 0.3;
                    } else if($data->event == '200 FLY'){
                        return ($data->goal+2)/4;
                    } else if($data->event == '100 BACK'){
                        return ((($data->goal-3)/4) * 0.65616) - 0.2;
                    } else if($data->event == '200 BACK'){
                        return ($data->goal+1)/4;
                    }  else if($data->event == '100 BREAST'){
                        return ((($data->goal-((($data->goal+2.5)/4)*2) - ($data->goal+2.5)/4)) * 0.65616) - 0.5;
                    }  else if($data->event == '200 BREAST'){
                        return ($data->goal+2.8)/4;
                    } 
                
                }
            ],
            'step_name_2',
            [
                'label'=>'Step Time 2',
                'value'=>function($data){
                    if ($data->event == '50 FREE'){
                        return $data->goal - ($data->goal*1.03535/2);
                    } else if($data->event == '100 FREE'){
                        return (($data->goal+1.6)/4)-1.6;
                    } else if($data->event == '200 FREE'){
                        return (($data->goal + 1.7) / 4)*1.5;
                    } else if($data->event == '500 FREE'){
                        return (($data->goal + 1.7) / 10)*1.5;
                    } else if($data->event == '1000 FREE'){
                        return ($data->goal+1.7)/10;
                    } else if($data->event == '1650 FREE'){
                        return (($data->goal+2)/33)*2;
                    } else if($data->event == '100 FLY'){
                        return ($data->goal-6)/4;
                    } else if($data->event == '200 FLY'){
                        return (($data->goal+2)/4)*1.5;
                    } else if($data->event == '100 BACK'){
                        return ($data->goal-3)/4;
                    } else if($data->event == '200 BACK'){
                        return (($data->goal+1)/4)*1.5;
                    } else if($data->event == '100 BREAST'){
                        return (($data->goal-((($data->goal+2.5)/4)*2) - ($data->goal+2.5)/4));
                    } else if($data->event == '200 BREAST'){
                        return (($data->goal+2.8)/4)*1.5;
                    } 
                }
            ],
            'step_name_3',
            [
                'label'=>'Step Time 3',
                'value'=>function($data){
                    if ($data->event == '50 FREE'){
                        return $data->goal*1.03535/2;
                    } else if($data->event == '100 FREE'){
                        return (($data->goal+1.6)/4)-1.6 + ($data->goal+1.6)/4;
                    } else if($data->event == '200 FREE'){
                        return ($data->goal + 1.7) / 2;
                    } else if($data->event == '500 FREE'){
                        return ($data->goal+1.7)/5;
                    } else if($data->event == '1000 FREE'){
                        return (($data->goal+1.7)/10) + ($data->goal+1.7)/20;
                    } else if($data->event == '1650 FREE'){
                        return ($data->goal+2)/11;
                    } else if($data->event == '100 FLY'){
                        return ($data->goal-2)/2;
                    } else if($data->event == '200 FLY'){
                        return ($data->goal+2)/2;
                    } else if($data->event == '100 BACK'){
                        return ($data->goal-1)/2;
                    } else if($data->event == '200 BACK'){
                        return ($data->goal+1)/2;
                    } else if($data->event == '100 BREAST'){
                        return (($data->goal-(($data->goal+2.5)/4)*2));
                    } else if($data->event == '200 BREAST'){
                        return ($data->goal+2.8)/2;
                    } 
                
                }
            ],
            'step_name_4',
            [
                'label'=>'Step Time 4',
                'value'=>function($data){
                    if ($data->event == '50 FREE'){
                        return (($data->goal - ($data->goal*1.03535/2)) + $data->goal*1.03535/2)*0.2;
                    } else if($data->event == '100 FREE'){
                        return (($data->goal+1.6)/4);
                    } else if($data->event == '200 FREE'){
                        return ($data->goal + 1.7) / 4-1.7;
                    } else if($data->event == '500 FREE'){
                        return ($data->goal+1.7)/10-1.7;
                    } else if($data->event == '1000 FREE'){
                        return ($data->goal+1.7)/20-1.7;
                    } else if($data->event == '1650 FREE'){
                        return ($data->goal+2)/33-2;
                    } else if($data->event == '100 FLY'){
                        return ($data->goal+2)/4;
                    } else if($data->event == '200 FLY'){
                        return ($data->goal+2)/4-2;
                    } else if($data->event == '100 BACK'){
                        return ($data->goal+1)/4;
                    } else if($data->event == '200 BACK'){
                        return ($data->goal+1)/4-1;
                    } else if($data->event == '100 BREAST'){
                        return ($data->goal+2.5)/4;
                    } else if($data->event == '200 BREAST'){
                        return ($data->goal+2.8)/4 - 2.8;
                    } 
                }
            ],
            'step_name_5',
            [
                'label'=>'Step Time 5',
                'value'=>function($data){
                    if($data->event == '100 FREE'){
                        return (($data->goal+1.6)/2);
                    } else if($data->event == '200 FREE'){
                        return (($data->goal + 1.7) / 4)-1.7 + ($data->goal + 1.7) / 4;
                    } else if($data->event == '500 FREE'){
                        return ($data->goal+1.7)/5-1.7;
                    } else if($data->event == '100 FLY'){
                        return ($data->goal+2)/2;
                    } else if($data->event == '200 FLY'){
                        return (($data->goal+2)/4)-2 + ($data->goal+2)/4;
                    } else if($data->event == '100 BACK'){
                        return ($data->goal+1)/2;
                    } else if($data->event == '200 BACK'){
                        return (($data->goal+1)/4)-1 + ($data->goal+1)/4;
                    } else if($data->event == '100 BREAST'){
                        return ($data->goal+2.5)/2;
                    } else if($data->event == '200 BREAST'){
                        return ($data->goal+2.8)/4 - (2.8 + ($data->goal+2.8)/4);
                    } 
                }
            ],
        ],
    ]); ?>


</div>

<h1>Splits and Percents</h1>
<header>
    <div class="row" id="SplitsHeading">    
        <h3 id="split_user" class='col'>Swimmer</h3>
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
        <?= $row->user->first_name ?>
    </div>
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





