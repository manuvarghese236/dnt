<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Consultations */

$this->title = 'Create Consultations';
$this->params['breadcrumbs'][] = ['label' => 'Consultations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consultations-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'ProcedureLists'=> $ProcedureLists,
         "b" =>$b
    ]) ?>

</div>
