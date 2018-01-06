<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Prescription */

$this->title = $model->patient->name;
$this->params['breadcrumbs'][] = ['label' => 'Prescriptions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prescription-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
//            'id',
           [ 'attribute'=>'Medicine'
               ,'value'=> $model->medicines->name.' - '.$model->dosage->name.' '.$model->dosage->unit],
            [ 'attribute'=>'Doctor'
               ,'value'=>$model->doctor->name],
            ['attribute'=>'Patient',
              'value'=>  $model->patient->name],
            'freequency',
            'duration',
            'nos',
            'notes',
        ],
    ]) ?>

</div>
