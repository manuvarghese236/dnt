<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DoctorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Doctors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Doctor', ['create'], ['class' => 'btn btn-success']) ?>
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
    ])->textInput(['placeholder' => 'Search by Name, Specialization, Mobile, email..']);
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
            ['label'=>'Doctor',
                'attribute'=>'name',
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::a($data->name, 
                            yii\helpers\Url::to(['doctor/view', 'id' => $data->id]));},],
            
            'mobile',
            'email:email',
            //'clinic_id',
            'specialization.name',
            // 'qualification',
            // 'rating',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
