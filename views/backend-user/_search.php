<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BackendUserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="backend-user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'Username') ?>

    <?= $form->field($model, 'Password') ?>

    <?= $form->field($model, 'UserTypeID') ?>

    <?= $form->field($model, 'Status') ?>

    <?php // echo $form->field($model, 'MasterID') ?>

    <?php // echo $form->field($model, 'authKey') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
