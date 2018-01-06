<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Bookings */

$this->title = $model->patient->name;
$this->params['breadcrumbs'][] = ['label' => 'Bookings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bookings-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], 
                ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], 
                ['class' => 'btn btn-danger',
                'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
<?php
    if (Yii::$app->session->hasFlash('error')) {
        $msg = Yii::$app->session->getFlash('error');
        $this->registerJs('$.notify("' . $msg . '", "error");');
    }
    ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
             ['label'=>'Doctor',
               'value'=> $model->doctor->name],
            'date',
            ['label'=>'Patient',
               'value'=> $model->patient->name],
           'bookingStatus.name',            
            [                     
            'label' => 'Time',
            'value' => ($model->time_hour).':'. $model->time_minute.'0',
            ],
            [                     
            'label' => 'Time Session',
            'value' => $model->daysession->name,
            ],
        ],
    ]) ?>

</div>
