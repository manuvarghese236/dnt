<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Prescription */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prescription-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">

        <div class="col-lg-3">
            <?=
            $form->field($model, 'medicine_id')->widget(Select2::classname(), [
                'data' => yii\helpers\ArrayHelper::
                map(\app\models\Medicines::find()->asArray()->all(), 'id', 'name'),
                'options' => ['id' => 'medicine-id', 'placeholder' => 'Select Medicine ...'],
                'pluginOptions' => [

                    'allowClear' => true,
                ],
            ]);
            ?>

        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-3">

            <?=
            $form->field($model, 'dosage_id')->widget(DepDrop::classname(), [
                'options' => ['id' => 'dosage_id-id'],
                'data' => [$model->dosage_id => $model->dosage_id],
                'pluginOptions' => [
                    'depends' => ['medicine-id'],
                    'loading' => 'true',
                    'placeholder' => 'Select Dosage...',
                    'url' => Url::to(['/prescription/loadamount'])
                ]
            ])
            ?>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-3">
            <?=
            $form->field($model, 'doc_id')->dropDownList(yii\helpers\ArrayHelper::
                    map(\app\models\Doctor::find()->asArray()->all(), 'id', 'name'), [ 'prompt' => 'Select Doctor']
            )
            ?>
        </div>
    </div>
    <div class="row">

        <div class="col-lg-3">

            <?= $form->field($model, 'freequency')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-3">
            <?= $form->field($model, 'duration')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-3">
            <?= $form->field($model, 'nos')->textInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <?=
            $form->field($model, 'patient_id')->dropDownList(yii\helpers\ArrayHelper::
                    map(\app\models\Patient::find()->asArray()->all(), 'id', 'name'), ['prompt' => 'Select Patient'])
            ?>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-3">

            <?php
            echo $form->field($model, 'date')->widget(\yii\jui\DatePicker::classname(), [
                //'language' => 'ru',
                'dateFormat' => 'yyyy-MM-dd',
                'options' => [
                    'class' => 'form-control',
                    'onSelect' => 'js:function( visitedDate ) {
                  alert("ss");
             }'
                ]
            ]);
            ?>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-3">
            <?= $form->field($model, 'notes')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
