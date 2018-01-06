<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <div class="alert alert-danger">
    <h1><?= Html::encode("Operation Limitted") ?></h1>
    </div>
    <p>
      Please suggest a heading and description for this error message. eg: Youre not allowed to do this operation
    </p>

    <code><?= __FILE__ ?></code>
</div>
