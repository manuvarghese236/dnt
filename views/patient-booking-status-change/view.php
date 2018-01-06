<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PatientBookingStatusChange */

//$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Patient Booking Status Changes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-booking-status-change-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <!-- <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?> -->
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
//            
//            'date',
            'patient.name',
            ['label'=>'Doctor',
          'value'=>$model->doctor->name],
//            'datetime_start',
//            'datetime_end',
            'bookingStatus.name',
             ['label'=>'Time Session',
                 'value'=>$model->daysession->name],
            'date',
//            'diseases_description:ntext',
//            'time',
//            'time_hour:datetime',
//            'time_minute:datetime',
//            'time_session:datetime',
        ],
    ]) ?>

</div>
