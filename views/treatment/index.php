<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TreatmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Treatments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="treatment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Treatment', ['create'], ['class' => 'btn btn-success']) ?>
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
    ])->textInput(['placeholder' => 'Search by Treatment, Doctor or Patient']);
    ?>
    <?php ActiveForm::end(); ?>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => [
            'class' => 'tableHead',
        ],
                'filterRowOptions' => ['class' => 'filters', 'style'=>['display'=>'none']],

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'id',
            ['label' => 'Treatment Type',
                'attribute'=>'type_id',
                'value' => 'treatmentType.name'],
            ['label'=>'Doctor',
                'attribute' => 'doc_id',
                'value' => 'doctor.name'],
            ['label'=>'Patient',
                'attribute' => 'patient_id',
                'value' => 'patient.name'],
            ['attribute' => 'Status',
                'value' => 'treatmentStatus.name'],
          'date:date',
            ['attribute' => 'Cost',
                'value' => function ($data) {
                    return '₹ ' . ( $data->cost - $data->dicsount);
                },],
//            'notes',
            // 'cost',
            // 'dicsount',
            ['class' => 'yii\grid\ActionColumn',
//                'visibleButtons' => [
//        'generatebill' => function ($model, $key, $index) {
//           
//            return $model->bill_id === 0 ? true : false;
//         }],
                'buttons' => [
                    'generatebill' => function ($url, $model, $key) {
//                        echo 'mm: '.$model->Status;
                        return Html::a($model->bill_id === 0 ? 'Generate Bill' 
                                : 'View Bill',$model->bill_id == 0 ? ['generatebill', 'id' => $model->id]
                                : ['bill/view', 'id' => $model->bill_id], 
                                $model->bill_id === 0 ? ['class' => 'btn statusActiveBg']:
                            ['class' => 'btn statusFullActiveBg']);
                    },
                        ],
                        'template' => '{view}{update}{delete}{generatebill}'],
                ],
            ]);
            ?>
</div>
