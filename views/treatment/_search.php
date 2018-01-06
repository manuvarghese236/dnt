<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TreatmentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="treatment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'type_id') ?>

    <?= $form->field($model, 'doc_id') ?>

    <?= $form->field($model, 'patient_id') ?>

    <?= $form->field($model, 'notes') ?>

    <?php // echo $form->field($model, 'cost') ?>

    <?php // echo $form->field($model, 'dicsount') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
