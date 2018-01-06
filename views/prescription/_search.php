<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PrescriptionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prescription-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'medicine_id') ?>

    <?= $form->field($model, 'doc_id') ?>

    <?= $form->field($model, 'dosage_id') ?>

    <?= $form->field($model, 'freequency') ?>

    <?php // echo $form->field($model, 'duration') ?>

    <?php // echo $form->field($model, 'nos') ?>

    <?php // echo $form->field($model, 'notes') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
