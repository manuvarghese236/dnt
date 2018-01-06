<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PatientBookingStatusChange */

//$this->title = 'Update Patient Booking Status Change: ' . $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Patient Booking Status Changes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="patient-booking-status-change-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
