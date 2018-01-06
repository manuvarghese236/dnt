<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\specializationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Specializations';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="specialization-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
        <?=
        Html::button('Create Specialization', [
            'value' => Url::to('index.php?r=specialization/create'),
            'class' => 'btn btn-success modalClass',
            'title' => 'Create New '
                ]
        )
        ?>
    </p>

    <?php
    Modal::begin(
            [
                 'headerOptions' => ['id' => 'modalHeader'],
                 'closeButton' => ['tag' => 'close-button'],
//                'header' => '<h4>'.$this->title.'</h4>',
                'id' => 'modal',
                'size' => 'modal-lg',
//                 'closeButton' => true,
            ]
    );
    echo '<div id="modalContent" ></div>';
    Modal::end();
    ?>

    <?php
    if (Yii::$app->session->hasFlash('success')) {
        $msg = Yii::$app->session->getFlash('success');
        $this->registerJs('$.notify("' . $msg . '", "success");');
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
    ])->textInput(['placeholder' => 'Search Specialization']);
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
            'name',
            ['class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'update' => function ($url, $model, $key) {
                        return Html::button('', [
                                    'value' => Url::to('index.php?r=specialization/update&id=' . $model->id),
                                    'class' => 'trans-btn glyphicon glyphicon-pencil modalClass',
                            'title' =>'Update '. $model->name, 
                                        ]
                        );
                    },
                            'view' => function ($url, $model, $key) {
                        return Html::button('' , [
                                    'value' => Url::to('index.php?r=specialization/view&id=' . $model->id),
                                    'class' => 'modalClass trans-btn glyphicon glyphicon-eye-open',
                            'title' => $model->name, 
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
            ]);
            ?>






</div>
