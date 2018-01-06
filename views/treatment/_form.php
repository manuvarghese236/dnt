<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Treatment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="treatment-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-lg-3">
            <?php
            $typeArray = \app\models\TreatmentType::find()->asArray()->all();
            $data = yii\helpers\ArrayHelper::map($typeArray, 'id', 'name');

            $jsonData = json_encode($typeArray);

            echo $form->field($model, 'type_id')->widget(Select2::classname(), [
                'data' => $data,
                'options' => ['placeholder' => 'Select a Type ...'],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
                'pluginEvents' => ["change" => "function() {"
                    . " var ar=$jsonData;"
                    . " console.log(ar[0]);"
                    . " var type_id=document.getElementById('treatment-type_id').value;"
                    . " var cost=0;"
                    . " for(var i = 0; i < ar.length; i++)
{
  if(ar[i]['id'] == type_id)
  {
    cost= ar[i]['cost'];
    
  }
}"
//                    . " var type_id= $('#select2-treatment-type_id-container').val();"
                    . " document.getElementById('treatment-cost').value =cost; }"]
            ]);
            ?>
            <script>
                function getType() {
                    console.log('aaa');
                }
            </script>

        </div>
        <div class="col-lg-1">
        </div>
        <div class="col-lg-3">
            <?=
            $form->field($model, 'doc_id')->dropDownList(yii\helpers\ArrayHelper::
                    map(\app\models\Doctor::find()->asArray()->all(), 'id', 'name'), ['prompt' => 'Select Doctor']
            )
            ?>
        </div>
        <div class="col-lg-1">
        </div>
        <div class="col-lg-3">
            <?=
            $form->field($model, 'patient_id')->dropDownList(yii\helpers\ArrayHelper::
                    map(\app\models\Patient::find()->asArray()->all(), 'id', 'name'), ['prompt' => 'Select Patient'])
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3"><h1></h1></div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <?= $form->field($model, 'cost')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-1">
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'dicsount')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-1">
        </div>
        <div class="col-lg-3">
            <?=
            $form->field($model, 'status')->dropDownList(yii\helpers\ArrayHelper::
                    map(\app\models\TreatmentStatus::find()->asArray()->all(), 'id', 'name')
            )
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
        <?=    $form->field($model, 'date')->widget(\yii\jui\DatePicker::classname(), [
                //'language' => 'ru',
                'dateFormat' => 'yyyy-MM-dd',
                'options' => [ 'class' => 'form-control']
            ])
            ?> 
        </div>
        <div class="col-lg-1">
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'notes')->textArea(['maxlength' => true, 'rows' => 5]) ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary','name'=>'save']) ?>
        &nbsp;
            <?php
        if ($model->isNewRecord) {
            echo Html::submitButton('Save and Generate Bill', ['class' => 'btn btn-primary','name'=>'savengb']);
        }
        ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
