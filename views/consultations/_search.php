<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ConsultationsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="consultations-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'patient_id') ?>

    <?= $form->field($model, 'doctor_Id') ?>

    <?= $form->field($model, 'Date') ?>

    <?= $form->field($model, 'session_id') ?>

    <?php // echo $form->field($model, 'booking_id') ?>

    <?php // echo $form->field($model, 'findings') ?>

    <?php // echo $form->field($model, 'notes') ?>

    <?php // echo $form->field($model, 'Amount') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
