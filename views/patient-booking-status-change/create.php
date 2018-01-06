<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PatientBookingStatusChange */

$this->title = 'Create Patient Booking Status Change';
$this->params['breadcrumbs'][] = ['label' => 'Patient Booking Status Changes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-booking-status-change-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
