<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Bookings */

$this->title = 'Edit Appointment for ' . $model->patient->name;

$this->params['breadcrumbs'][] = ['label' => 'Bookings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bookings-update">
<p>//TODO ******** SUGGEST GOODHEADING *********** <p>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
