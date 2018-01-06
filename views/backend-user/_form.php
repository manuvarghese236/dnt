<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BackendUser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="backend-user-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="row">
        <div class="col-lg-3">
            <?= $form->field($model, 'Username')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-3">
            <?= $form->field($model, 'Password')->passwordInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-3">
            <?php
            if(Yii::$app->user->identity->UserTypeID==1){
            echo $form->field($model, 'UserTypeID')->dropDownList(yii\helpers\ArrayHelper::
                    map(\app\models\Usertype::find()->asArray()->all(), 'ID', 'Name'), 
                    ['onchange' => 'get_user()']
            );
            }  else {
            echo $form->field($model, 'UserTypeID')->dropDownList(yii\helpers\ArrayHelper::
                    map(\app\models\Usertype::find()->where(['view'=>1])->
                            asArray()->all(), 'ID', 'Name'), ['onchange' => 'get_user()']
            );    
            }
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3"><h1> </h1></div>
    </div>
    <div class="row">

        <script>
            function get_user()
            {
                var useType = $("#backenduser-usertypeid").val();
                if (useType == 5) {
                    console.log("type: " + useType);

                    $("#doctor_drop_div").show();
                }
            }
        </script>

        <div class="col-lg-3">
            <?= $form->field($model, 'Status')->dropDownList(array('1' => 'Active', '2' => 'Blocked')); ?>
        </div>
        <div class="col-lg-1"></div>
    </div>
    <!--    <?= $form->field($model, 'Status')->textInput() ?>
   
    <?= $form->field($model, 'MasterID')->textInput() ?>
   
    <?= $form->field($model, 'authKey')->textInput(['maxlength' => true]) ?> -->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
