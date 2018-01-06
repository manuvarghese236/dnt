<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \app\models\Availability;
use \app\models\BackendUser;

/* @var $this yii\web\View */
/* @var $model app\models\Doctor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="doctor-form">

    <?php
    $form = ActiveForm::begin();
    ?>
    <div class="row">
        <div class="col-lg-3">&nbsp;<h1></h1></div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-1">

        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-1">

        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'email')->textInput() ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <?= $form->field($model, 'clinic_id')->textInput() ?>
        </div>
        <div class="col-lg-1">

        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'specialization_id')->dropDownList(yii\helpers\ArrayHelper::map(\app\models\Specialization::find()->asArray()->all(), 'id', 'name')) ?>
        </div>
        <div class="col-lg-1">

        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'qualification')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <?php
            $buser = $model->isNewRecord ? new \app\models\BackendUser() :
                    BackendUser::find()->where(['doctor_id' => $model->id])->one();
            if ($model->isNewRecord) {
                echo $form->field($buser, 'Username')->textInput();
            } else {
                echo $form->field($buser, 'Username')->textInput(array('readonly' => true));
            }
            ?>

        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-3">
            <?= $form->field($buser, 'Password')->passwordInput(['maxlength' => true]) ?>
        </div>
    </div>
    <?php
    $array_daySession = yii\helpers\ArrayHelper::map(\app\models\Daysession::find()->asArray()->all(), 'id', 'name');

    $avalable = $model->isNewRecord ? new \app\models\Availability() : Availability::find()->where(['Doc_id' => $model->id])->one();
    ?>

    <?= $form->field($avalable, 'd1')->checkbox() ?>

    <?= $form->field($avalable, 's1')->dropDownList($array_daySession) ?>

    <?= $form->field($avalable, 'd2')->checkbox() ?>

    <?= $form->field($avalable, 's2')->dropDownList($array_daySession) ?>

    <?= $form->field($avalable, 'd3')->checkbox() ?>

    <?= $form->field($avalable, 's3')->dropDownList($array_daySession) ?>

    <?= $form->field($avalable, 'd4')->checkbox() ?>

    <?= $form->field($avalable, 's4')->dropDownList($array_daySession) ?>

    <?= $form->field($avalable, 'd5')->checkbox() ?>

    <?= $form->field($avalable, 's5')->dropDownList($array_daySession) ?>

    <?= $form->field($avalable, 'd6')->checkbox() ?>

    <?= $form->field($avalable, 's6')->dropDownList($array_daySession) ?>

    <?= $form->field($avalable, 'd7')->checkbox() ?>

    <?= $form->field($avalable, 's7')->dropDownList($array_daySession) ?>

    <?= $form->field($avalable, 'dall')->checkbox() ?>

    <?= $form->field($avalable, 'sall')->dropDownList($array_daySession) ?>




    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
