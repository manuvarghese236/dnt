<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PatientBookingStatusChangeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bookings Today';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-booking-status-change-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
        <!--      <?= Html::a('Create Patient Booking Status Change', ['create'], ['class' => 'btn btn-success']) ?> -->
    </p>

    <?php
    Modal::begin(
            [

                'headerOptions' => ['id' => 'modalHeader'],
                'id' => 'modal',
                'size' => 'modal-lg',
            ]
    );
    echo '<div id="modalContent" ></div>';
    Modal::end();
    ?> 

    <?php
    $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
    ]);
    ?>
    <?php
    /* @var $searchModel app\models\BackendUserSearch */
    echo $form->field($searchModel, 'searchstring', [
        'template' => '<div class="col-lg-9"></div>'
        . '<div class="input-group col-lg-3">{input}<span class="input-group-btn">' .
        Html::submitButton('<i class="glyphicon glyphicon-search"></i>', ['class' => 'btn btn-default']) .
        '</span></div>',
    ])->textInput(['placeholder' => 'Search by Patient, Doctor...']);
    ?>
    <?php ActiveForm::end(); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => [
            'class' => 'tableHead',
        ],
        'filterRowOptions' => ['class' => 'filters', 'style' => ['display' => 'none']],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'id',
            [
                'attribute' => 'patients_id',
                'label' => 'Patient',
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::a($data->patient->name, yii\helpers\Url::to(['patient/view', 'id' => $data->patient->id]));
                },
                    ],
                    [
                        'attribute' => 'doctors_id',
                        'label' => 'Doctor',
                        'format' => 'raw',
                        'value' => function ($data) {
                            return Html::a($data->doctor->name, yii\helpers\Url::to(['doctor/view', 'id' => $data->doctor->id]));
                        },
                            ],
//            'date',
                            'bookingStatus.name',
                            [
                                'attribute' => 'Token',
                                'contentOptions' => function($model) {
                                    return $model->token_num == 0 ? ['class' => 'btn statusBlockBg'] : 
                                        ['class' => ''];
                                },
                                        'value' => function($model, $key, $index) {
                                    return $model->token_num == 0 ?
                                            'Not Present' : $model->token_num;
                                },
                                    ],
                                    ['class' => 'yii\grid\ActionColumn',
                                        'buttons' => [
                                            'update' => function ($model) {
                                                return Html::button('', [
                                                            'value' => Url::to('index.php?r=patient-booking-status-change/update&id=' . $model),
                                                            'class' => 'btn trans-btn glyphicon glyphicon-pencil modalClass',
                                                            'title' => 'Update Patient Status',
                                                                ]
                                                );
                                            },
                                                    'view' => function ($url, $model, $key) {
                                                return Html::button('', [
                                                            'value' => Url::to('index.php?r=patient-booking-status-change/view&id=' . $model->id),
                                                            'class' => 'btn trans-btn glyphicon glyphicon-eye-open modalClass',
                                                            'title' => $model->token_num == 0 ? $model->patient->name . ' - Not Present' :
                                                                    $model->patient->name . ' - Token No. ' . $model->token_num,
                                                                ]
                                                );
                                            },
                                                ],
                                                'template' => '{view}  {update}',
                                            ],
                                        ],
                                    ]);
                                    ?>
</div>
