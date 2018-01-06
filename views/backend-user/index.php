<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BackendUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Backend Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="backend-user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
        <?= Html::a('Create Backend User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
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
    ])->textInput(['placeholder' => 'Search Username, Usertype..']);
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
//            'ID',
            ['attribute' => 'Username',
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::a($data->Username, yii\helpers\Url::to(['backend-user/view', 'id' => $data->id]));
                },
                    ],
//            'Password',
                   ['label'=>'Usertype',
                       'attribute'=>'UserTypeID',
                      'value'=> 'userType.Name'],
                    [
                        'attribute' => 'Status',
                        'value' => function($model, $key, $index) {
                            if ($model->Status == 1) {
                                return 'Active';
                            } else {
                                return 'Blocked';
                            }
                        },
                        'contentOptions' => function($model) {
                            return $model->Status == 0 ? ['class' => 'btn statusBlockBg'] :
                                    ['class' => 'btn statusFullActiveBg'];
                        },
                            ],
                            // 'MasterID',
                            // 'authKey',
                            ['class' => 'yii\grid\ActionColumn',
                                'buttons' => [
                                    'status' => function ($url, $model, $key) {
//                        echo 'mm: '.$model->Status;
                                        return Html::a($model->Status == 1 ? 
                                                '<i class="glyphicon glyphicon-ban-circle" style="color:red"></i>' 
                                        : '<i class="glyphicon glyphicon-ok" style="color:#198c05"></i>',
                                                ['change', 'id' => $model->id], 
                                                '');
                                    },
                                        ],
                                        'template' => '{status} {view} {update} {delete}'],
                                ],
                            ]);
                            ?>
</div>
