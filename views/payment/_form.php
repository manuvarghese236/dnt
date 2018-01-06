<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Payment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $billArray = \app\models\Bill::find()->where(['status' => 2])->asArray()->all();
    $data = yii\helpers\ArrayHelper::map($billArray, 'id', 'bill_no');

    $jsonData = json_encode($billArray);
$payAm=0;
$bill_id=0;
    echo $form->field($model, 'bill_id')->widget(Select2::classname(), [
        'data' => $data,
        'options' => ['placeholder' => 'Select a Bill ...','onchange'=>'getAmount()'],
        'pluginOptions' => [
            
            'allowClear' => true,
            
        ],
    ]);
    ?>
 <script type="text/javascript">
                function getAmount()
                {
                    $.ajax({
                        url: '<?php
            echo Yii::$app->request->baseUrl
            . '/index.php?r=payment%2Fgetamount'
            ?>',
                        type: 'post',
                        data: {
                            bill_id: 
                            $("#payment-bill_id").val()
                    
                        },
                        success: function (data) {
//                         da   console.log(data);
                           $("#payment-amount").val(data);
                        }
                    });
                }
            </script>
    <?= $form->field($model, 'amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'remarks')->textArea(['maxlength' => true, 'rows' => 5]) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
