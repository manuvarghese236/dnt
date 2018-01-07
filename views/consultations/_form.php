<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Consultations */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="consultations-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php
    if ($model->isNewRecord) {
        $model->patient_id = $b->patients_id;
        $model->doctor_Id = $b->doctors_id;
        $model->booking_id = $b->id;
        $model->Amount='0';
        $model->session_id=1;
        $model->Date=date('Y-m-d H:i:s');
    }
    ?>
    <?= $form->field($model, 'patient_id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'doctor_Id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'Date')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'session_id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'booking_id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'findings')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'notes')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Amount')->hiddenInput()->label(false) ?>
    
    
    
    <?php   echo $this->render('_formProc',['ProcedureLists'=> $ProcedureLists]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
