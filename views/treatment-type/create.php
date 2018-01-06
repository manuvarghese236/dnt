<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TreatmentType */

//$this->title = 'Create Treatment Type';
$this->params['breadcrumbs'][] = ['label' => 'Treatment Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="treatment-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
