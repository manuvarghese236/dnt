<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AvailabilitySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="availability-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'Doc_id') ?>

    <?= $form->field($model, 'd1') ?>

    <?= $form->field($model, 's1') ?>

    <?= $form->field($model, 'd2') ?>

    <?php // echo $form->field($model, 's2') ?>

    <?php // echo $form->field($model, 'd3') ?>

    <?php // echo $form->field($model, 's3') ?>

    <?php // echo $form->field($model, 'd4') ?>

    <?php // echo $form->field($model, 's4') ?>

    <?php // echo $form->field($model, 'd5') ?>

    <?php // echo $form->field($model, 's5') ?>

    <?php // echo $form->field($model, 'd6') ?>

    <?php // echo $form->field($model, 's6') ?>

    <?php // echo $form->field($model, 'd7') ?>

    <?php // echo $form->field($model, 's7') ?>

    <?php // echo $form->field($model, 'dall') ?>

    <?php // echo $form->field($model, 'sall') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
