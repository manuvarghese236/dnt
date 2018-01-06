<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BookingStatus */

$this->title = 'Create Booking Status';
$this->params['breadcrumbs'][] = ['label' => 'Booking Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="booking-status-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
