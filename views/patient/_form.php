<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\jui\DatePicker;
use \app\models\BackendUser;

/* @var $this yii\web\View */
/* @var $model app\models\patient */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patient-form">

    <?php
    $form = ActiveForm::begin([
                'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                    'horizontalCssClasses' => [
                        'label' => '',
                        'offset' => '',
                        'wrapper' => '',
                        'error' => '',
                        'hint' => '',
                    ],
                ],
    ]);
    ?>

    <div class="row">
        <div class="col-lg-3">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-1">

        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'phone')->textInput(['maxlength' => 10]) ?>
            <script type="text/javascript">
                document.getElementById('patient-phone').onkeypress = function (evt) {
                    return isNumberKey(evt);
                }

                function isNumberKey(evt) {
                    var charCode = (evt.which) ? evt.which : event.keyCode
                    if (charCode > 31 && (charCode < 48 || charCode > 57))
                        return false;
                    return true;
                }
            </script>
        </div>
        <div class="col-lg-1">

        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-2">

        </div>

    </div>
    <div class="row">
        <div class="col-lg-3">
            <?php
            echo $form->field($model, 'dob')->widget(\yii\jui\DatePicker::classname(), [
                //'language' => 'ru',
                'dateFormat' => 'yyyy-MM-dd',
                'options' => [ 'class' => 'form-control']
            ]);
            ?>
        </div>

        <div class="col-lg-1">

        </div>
        <div class="col-lg-3">
            <?=
                    $form->field($model, 'blood_group')->
                    dropDownList(yii\helpers\ArrayHelper::map(\app\models\BloodGroup::find()->
                                    asArray()->all(), 'id', 'name'), ['prompt' => 'Selecet Blood Group'])
            ?>
        </div>
        <div class="col-lg-1">

        </div>

        <div class="col-lg-3">
            <?=
                    $form->field($model, 'Sex')->
                    dropDownList(yii\helpers\ArrayHelper::map(\app\models\Sex::find()->asArray()->all(), 'id', 'name'), ['prompt' => 'Selecet Gender'])
            ?>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-3">
            <?php
//            $buser =new \app\models\BackendUser() ;
//        echo 'kk: '.$model->email;
//        die();
            $buser = $model->isNewRecord ? new \app\models\BackendUser() :
                    BackendUser::find()->where(['patient_id' => $model->id])->one();
//            if ($model->isNewRecord) {
//                echo $form->field($buser, 'Username')->textInput();
//            } else {
            echo $form->field($buser, 'Username')->textInput(array('readonly' => $model->isNewRecord ? false : true));
//            }
            ?>

        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-3">
            <?= $form->field($buser, 'Password')->passwordInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-3">
<?= $form->field($model, 'address')->textarea(['rows' => 5]) ?>    
        </div>
    </div>


    <div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
