<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AvailabilitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Availabilities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="availability-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Availability', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'Doc_id',
            'd1',
            's1',
            'd2',
            // 's2',
            // 'd3',
            // 's3',
            // 'd4',
            // 's4',
            // 'd5',
            // 's5',
            // 'd6',
            // 's6',
            // 'd7',
            // 's7',
            // 'dall',
            // 'sall',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
