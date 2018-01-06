<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BookingsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bookings';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="bookings-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Bookings', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
     <?php
    if (Yii::$app->session->hasFlash('error')) {
        $msg = Yii::$app->session->getFlash('error');
        $this->registerJs('$.notify("' . $msg . '", "error");');
    }
    
    ?>
    
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
    ])->textInput(['placeholder' => 'Search by Patient, Doctor']);
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

//            ['label'=>'Patient',
//                'attribute'=>'patients_id',
//              'format' => 'raw',
//                'value' => function ($data) {
//                    return Html::a($data->patient->name, 
//                            yii\helpers\Url::to(['patient/view', 'id' => $data->patient->id]));},],
            ['label'=>'Doctor',
                'attribute'=>'doctors_id',
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::a($data->doctor->name, 
                            yii\helpers\Url::to(['doctor/view', 'id' => $data->doctor->id]));},],
            'date:date',
            
           
            // 'datetime_end',
            // 'status_id',
            // 'diseases_description:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
