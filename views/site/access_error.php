<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <div class="alert alert-danger">
    <h1><?= Html::encode("Access Limitted") ?></h1>
    </div>
    <p>
      Please suggest a heading and description for this error message. eg: Youre not allowed to access this page
    </p>

    <code><?= __FILE__ ?></code>
</div>
