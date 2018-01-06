<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Consultation;

/* @var $this yii\web\View */
/* @var $model app\models\PatientWaitingList */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patient-waiting-list-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'doctors_id')->textInput() ?>
 
    <?= $form->field($model, 'date')->textInput() ?>
 
    <?= $form->field($model, 'patients_id')->textInput() ?>
 
    <?= $form->field($model, 'datetime_start')->textInput() ?>
 
    <?= $form->field($model, 'datetime_end')->textInput() ?>
    <?= $form->field($model, 'time')->textInput() ?> -->
    <div class="row">

        <div class="col-lg-6">
            <?=
            $form->field($model, 'status_id')->dropDownList(yii\helpers\ArrayHelper::
                    map(\app\models\BookingStatus::find()->asArray()->all(), 'id', 'name')
            )->label('Status')
            ?>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-5">
            <?= $form->field($model, 'diseases_description')->textarea(array('readonly' => true, ['rows' => 4]))->label('Reason') ?>

        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <?= $form->field($model, 'time_hour')->textInput(array('readonly' => true))->label('Hour') ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'time_minute')->textInput(array('readonly' => true))->label('Minute') ?>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-5">
            <?=
                    $form->field($model, 'time')->
                    textInput(array('readonly' => true, 'value' => $model->daysession->name))->label('Time Session')
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3"><h3>Consultation Details</h3></div>
    </div>
    <div class="row">
        <div class="col-lg-3"> <h1> </h1> </div>

    </div>
    <div class="row">
        <?php
        if (($modelCon = Consultation::find()->where(['booking_id' => $model->id])->one()) === null) {
            $modelCon = new app\models\Consultation;
        }
        ?>
        <div class="col-lg-4">
        <?=
                $form->field($modelCon, 'sign_n_symptoms')->
                textarea(['rows' => 5])
        ?>
        </div>
        <div class="col-lg-4">
            <?=
                    $form->field($modelCon, 'findings')->
                    textarea(['rows' => 5])
            ?>
        </div>
        <div class="col-lg-4">
            <?=
                    $form->field($modelCon, 'treatment')->
                    textarea(['rows' => 5])
            ?>
        </div>
    </div>
    <div class="form-group">
<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

        <?php ActiveForm::end(); ?>

</div>
