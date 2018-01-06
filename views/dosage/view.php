<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Dosage */

//$this->title = $model->medicines->name;
$this->params['breadcrumbs'][] = ['label' => 'Dosages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dosage-view">

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
           
           ['attribute'=>'Medicine',
              'value'=>$model->medicines->name],
             ['attribute'=>'Dose',
                'value'=>$model->name.' '.$model->unit],
        ],
    ]) ?>

</div>
