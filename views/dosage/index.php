<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DosageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dosages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dosage-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

     <p>
        <?=
        Html::button('Add New Dosage', [
            'value' => Url::to('index.php?r=dosage/create'),
            'class' => 'btn btn-success modalClass',
            'title' => 'Add New Dosage'
                ]
        )
        ?>
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
    ])->textInput(['placeholder' => 'Search by Patient, Doctor']);
    ?>
    <?php ActiveForm::end(); ?>
    
     <?php
    Modal::begin(
            [
                 'headerOptions' => ['id' => 'modalHeader'],
//                'header' => '<h4>'.$this->title.'</h4>',
                'id' => 'modal',
                'size' => 'modal-lg'
            ]
    );
    echo '<div id="modalContent" ></div>';
    Modal::end();
    ?>
    
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
            
           [ 'attribute'=>'medicine_id',
               'label'=>'Medicine',
              'value'=> 'medicines.name'],
 [ 'attribute'=>'Dose',
              'value'=> function($model){
                  return $model->name.' '.$model->unit;
              }],
            ['class' => 'yii\grid\ActionColumn',
                 'buttons' => [
                    'update' => function ($url, $model, $key) {
                        return Html::button('', [
                                    'value' => Url::to('index.php?r=dosage/update&id=' . $model->id),
                                    'class' => 'trans-btn glyphicon glyphicon-pencil modalClass',
                            'title' =>'Update '. $model->medicines->name, 
                                        ]
                        );
                    },
                            'view' => function ($url, $model, $key) {
                        return Html::button('' , [
                                    'value' => Url::to('index.php?r=dosage/view&id=' . $model->id),
                                    'class' => 'modalClass trans-btn glyphicon glyphicon-eye-open',
                            'title' => $model->medicines->name, 
                                        ]
                        );
                    },
                           'delete' => function ($url, $model, $key) {
//                        echo 'mm: '.$model->Status;
                        return Html::a('<i class="glyphicon glyphicon-trash" style="color:red"></i>' ,
                                ['delete', 'id' => $model->id], 
                                [
                                    'data-confirm'=>'Are you sure you want to delete this item?',
                                    'data-method'=>'post']);
                    },
                        ],
                        'template' => '{view}  {update} {delete}',],
        ],
    ]); ?>
</div>
