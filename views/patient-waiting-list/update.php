<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PatientWaitingList */

$this->title = 'Update Patient Waiting List: ' . $model->patient->name;
$this->params['breadcrumbs'][] = ['label' => 'Patient Waiting Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="patient-waiting-list-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
