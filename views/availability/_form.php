<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Availability */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="availability-form">

    <?php 
   $array_daySession= yii\helpers\ArrayHelper::map(\app\models\Daysession::find()->asArray()->all(), 'id', 'name');
    ?>
    <?php $form = ActiveForm::begin(); ?>

      <?= $form->field($model, 'Doc_id')->textInput() ?>

    <?= $form->field($model, 'd1')->checkbox() ?>

    <?= $form->field($model, 's1')->dropDownList($array_daySession) ?>

    <?= $form->field($model, 'd2')->checkbox() ?>

    <?= $form->field($model, 's2')->dropDownList($array_daySession) ?>

    <?= $form->field($model, 'd3')->checkbox() ?>

    <?= $form->field($model, 's3')->dropDownList($array_daySession) ?>

    <?= $form->field($model, 'd4')->checkbox() ?>

    <?= $form->field($model, 's4')->dropDownList($array_daySession) ?>

    <?= $form->field($model, 'd5')->checkbox() ?>

    <?= $form->field($model, 's5')->dropDownList($array_daySession) ?>

    <?= $form->field($model, 'd6')->checkbox() ?>

    <?= $form->field($model, 's6')->dropDownList($array_daySession) ?>

    <?= $form->field($model, 'd7')->checkbox() ?>

    <?= $form->field($model, 's7')->dropDownList($array_daySession) ?>

    <?= $form->field($model, 'dall')->checkbox() ?>

    <?= $form->field($model, 'sall')->dropDownList($array_daySession) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
