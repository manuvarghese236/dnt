<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Dosage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dosage-form">

    <?php $form = ActiveForm::begin(); ?>
      <div class="row">
          <div class="col-lg-1"></div>

<div class="col-lg-4">
   <?= $form->field($model, 'medicine_id')->widget(Select2::classname(), [
        'data' => yii\helpers\ArrayHelper::
            map(\app\models\Medicines::find()->asArray()->all(), 'id', 'name'),
        'options' => ['placeholder' => 'Select Medicine ...'],
        'pluginOptions' => [
            
            'allowClear' => true,
            
        ],
    ]);
    ?>
    
</div>
                    <div class="col-lg-1"></div>

 <div class="col-lg-3">
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
 </div>
          
<div class="col-lg-2">
            <?= $form->field($model, 'unit')->dropDownList(array('mg' => 'mg', 'g' => 'g')); ?>
        </div>
                    <div class="col-lg-1"></div>

      </div>
     <div class="row">
         <div class="col-lg-1"><h1></h1></div>
     </div>
    <div class="form-group modalDiv">
        <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success btnRightAlign' : 'btnRightAlign btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
