<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PatientWaitingList */

$this->title = 'Create Patient Waiting List';
$this->params['breadcrumbs'][] = ['label' => 'Patient Waiting Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-waiting-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
