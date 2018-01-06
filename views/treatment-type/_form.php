<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TreatmentType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="treatment-type-form">

    <?php $form = ActiveForm::begin(); ?>
 <div class="row">
     <div class="col-lg-1"></div>
        <div class="col-lg-10">

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
      <div class="col-lg-1"></div>
 </div>
             <div class="row">
 <div class="col-lg-1"></div>
        <div class="col-lg-10">
    <?= $form->field($model, 'cost')->textInput(['maxlength' => true]) ?>
        </div>
  <div class="col-lg-1"></div>
             </div>
    <div class="form-group modalDiv">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update',
                ['class' => $model->isNewRecord ? 'btn btn-success btnRightAlign' 
                : 'btnRightAlign btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
