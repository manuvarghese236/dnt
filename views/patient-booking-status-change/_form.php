<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PatientBookingStatusChange */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patient-booking-status-change-form">

    <?php $form = ActiveForm::begin(); ?>
    <!-- 
    <?= $form->field($model, 'doctors_id')->textInput() ?>
   
    <?= $form->field($model, 'date')->textInput() ?>
   
    <?= $form->field($model, 'patients_id')->textInput() ?>
   
    <?= $form->field($model, 'datetime_start')->textInput() ?>
   
    <?= $form->field($model, 'datetime_end')->textInput() ?>
   
    <?= $form->field($model, 'diseases_description')->textarea(['rows' => 6]) ?>
   
    <?= $form->field($model, 'time')->textInput() ?>
   
    <?= $form->field($model, 'time_hour')->textInput() ?>
   
    <?= $form->field($model, 'time_minute')->textInput() ?> -->


    <div class="row">

        <div class="col-lg-3">
            <?=
                    $form->field($model, 'patients_id')->
                    hiddenInput(array('value' => $model->patient->id))->label(false)
            ?>
            <?=
                    $form->field($model, 'patient')->
                    textInput(array('readonly' => true, 'value' => $model->patient->name))
            ?>

        </div>
        <div class="col-sm-1">

        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'time_session')->hiddenInput()->label(false) ?>
            <?=
                    $form->field($model, 'time')->
                    textInput(array('readonly' => true, 'value' => $model->daysession->name))
            ?>           
        </div>
        <div class="col-sm-1">

        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'doctors_id')->hiddenInput()->label(false) ?>
            <?=
                    $form->field($model, 'doctor')->
                    textInput(array('readonly' => true, 'value' => $model->doctor->name))
            ?>
        </div>
    </div>
    <div class="row">
        <h1></h1>
    </div>
    <div class="row">

        <div class="col-lg-3">
            <?= $form->field($model, 'date')->textInput(array('readonly' => true)) ?>

        </div>

        <div class="col-sm-1">

        </div>
        <div class="col-lg-3">
            <?=
            $form->field($model, 'status_id')->dropDownList(yii\helpers\ArrayHelper::
                    map(\app\models\BookingStatus::find()->asArray()->all(), 'id', 'name')
            )
            ?>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <h1></h1>
        </div>
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
