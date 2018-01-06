<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Treatment */

$this->title = $model->patient->name;
$this->params['breadcrumbs'][] = ['label' => 'Treatments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="treatment-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            ['attribute' => 'Treatment',
                'value' => $model->treatmentType->name],
            ['attribute' => 'Doctor',
                'value' => $model->doctor->name],
            ['attribute' => 'Patient',
                'value' => $model->patient->name],
            'date',
            'cost',
            'dicsount',
            ['attribute' => 'Total cost',
                'value' => '₹ ' .($model->cost - $model->dicsount)],
            'notes',
        ],
    ])
    ?>

</div>
