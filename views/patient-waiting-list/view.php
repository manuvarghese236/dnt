<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Consultation;

/* @var $this yii\web\View */
/* @var $model app\models\PatientWaitingList */

$this->title = $model->patient->name;
$this->params['breadcrumbs'][] = ['label' => 'Patient Waiting Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-waiting-list-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [

            'date',
            ['attribute' => 'Patient',
                'value' => $model->patient->name],
            ['attribute' => 'Status',
                'value' => $model->bookingStatus->name],
            ['attribute' => 'Reason',
                'value' => $model->diseases_description],
            ['attribute' => 'Time',
                'value' => $model->time_hour . ':' . $model->time_minute . '0'],
            ['attribute' => 'Time Session',
                'value' => $model->daysession->name]
        ,
        ],
    ])
    ?>
    <div class="row">
        <div class="col-lg-3"><h3>Consultation History</h3></div>
        
    </div>
    <div class="row">
                <hr>

    </div>
    <?php
    if (($array = Consultation::find()->where(['patient_id' => $model->patient->id])->
                    orderBy(['(date)' => SORT_DESC])->all()) !== null) {
//        echo 'dd: '.  count($array);
        foreach ($array as $modelCon) {
            echo '<div class="row">
        <div class="col-lg-3"><h4><b>'.$modelCon->date.'<b></h4></div>
    </div>';
            echo DetailView::widget([
                'model' => $modelCon,
                'attributes' => [

                    ['attribute' => 'Sign and Symptoms',
                        'value' => $modelCon->sign_n_symptoms],
                    ['attribute' => 'Findings',
                        'value' => $modelCon->findings],
                    ['attribute' => 'Treatment',
                        'value' => $modelCon->treatment],
                    'date',
                ],
            ]);
        }
    }
    ?>



</div>
