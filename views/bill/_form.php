<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Bill */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bill-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="row">
        <div class="col-lg-3">
    <?= $form->field($model, 'bill_no')->textInput(['maxlength' => true]) ?>
        </div>
    <div class="col-lg-1">

        </div>
    <div class="col-lg-3">
<?php
            echo $form->field($model, 'date')->widget(\yii\jui\DatePicker::classname(), [
                //'language' => 'ru',
                'dateFormat' => 'yyyy-MM-dd',
                'options' => [ 'class' => 'form-control']
            ]);
            ?>
    </div>
    <div class="col-lg-1">

        </div>
    <div class="col-lg-3">
    <?= $form->field($model, 'amount')->textInput(['maxlength' => true]) ?>
        </div>
</div>
    
    <div class="row">
        
                <div class="col-lg-3">
    <?= $form->field($model, 'status')->dropDownList(yii\helpers\ArrayHelper::
                    map(\app\models\BillStatus::find()->asArray()->all(), 'id', 'name')) ?>
                </div>  </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
