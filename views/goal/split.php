<?php

use yii\helpers\Html;

$this->title = 'Splits';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1>Splits and Percents</h1>

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


