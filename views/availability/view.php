<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Availability */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Availabilities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="availability-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'Doc_id',
            'd1',
            's1',
            'd2',
            's2',
            'd3',
            's3',
            'd4',
            's4',
            'd5',
            's5',
            'd6',
            's6',
            'd7',
            's7',
            'dall',
            'sall',
        ],
    ]) ?>

</div>
