<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PatientWaitingListSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patient-waiting-list-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'doctors_id') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'patients_id') ?>

    <?= $form->field($model, 'datetime_start') ?>

    <?php // echo $form->field($model, 'datetime_end') ?>

    <?php // echo $form->field($model, 'status_id') ?>

    <?php // echo $form->field($model, 'diseases_description') ?>

    <?php // echo $form->field($model, 'time') ?>

    <?php // echo $form->field($model, 'time_hour') ?>

    <?php // echo $form->field($model, 'time_minute') ?>

    <?php // echo $form->field($model, 'time_session') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
