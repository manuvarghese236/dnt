<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PatientWaitingListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Patient Waiting Lists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-waiting-list-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
   <!--     <?= Html::a('Create Patient Waiting List', ['create'], ['class' => 'btn btn-success']) ?> -->
    </p>
    
       <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <?php
    /* @var $searchModel app\models\BackendUserSearch */
    echo $form->field($searchModel, 'searchstring', [
        'template' => '<div class="col-lg-9"></div>'
        . '<div class="input-group col-lg-3">{input}<span class="input-group-btn">' .
        Html::submitButton('<i class="glyphicon glyphicon-search"></i>', ['class' => 'btn btn-default']) .
        '</span></div>',
    ])->textInput(['placeholder' => 'Search by Patient']);
    ?>
    <?php ActiveForm::end(); ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
         'options' => [
            'class' => 'tableHead',
        ],
        'filterRowOptions' => ['class' => 'filters', 'style'=>['display'=>'none']],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            [
//                'label'=>'Doctor',
//               'value'=> 'doctor.name',
//                ],
//            'date',
            [
                'label' => 'Patient Name',
                'attribute'=>'patients_id',
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::a($data->patient->name, yii\helpers\Url::to(['patient/view', 'id' => $data->patient->id]));
                },
                    ],
            
            'bookingStatus.name',
            'token_num',
//            'datetime_start',
            // 'datetime_end',
            // 'status_id',
            // 'diseases_description:ntext',
            // 'time',
            // 'time_hour:datetime',
            // 'time_minute:datetime',
            // 'time_session:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
