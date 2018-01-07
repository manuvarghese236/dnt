<?php

use yii\jui\AutoComplete;
use yii\web\JsExpression;
use yii\helpers\Html;
use kartik\widgets\Select2
?>
<table border="1" style="width :100%" id = "proc_table">


    <thead>
        <tr>
            <th>sl</th>
            <th>Treatment</th>
            <th>Qty</th>
            <th>Notes</th>
            <th>
                <a class="btn btn-sm btn-theme " href="javascript:void(0);" onclick="addTableRow('proc_table');"><i class="fa fa-plus"></i></a></th>
            </th>
        </tr>

    </thead>
    <tbody>

    </tbody>
</table>

<div>

    <?php
    $data = \app\models\TreatmentType::find()
            ->select(['name as value', 'name as  label', 'id as id'])
            ->asArray()
            ->all();

    echo AutoComplete::widget([
        'name' => 'Company',
        'id' => 'ddd',
        'clientOptions' => [
            'source' => $data,
            'autoFill' => true,
            'minLength' => '1',
            'select' => new JsExpression("function( event, ui ) {
    $('#company').val(ui.item.id);
 }")
        ],
    ]);
   
    ?>
 <
 
 <?php
 echo Select2::widget([
  
    'attribute' => 'state_2',
    'data' => $data,
    'options' => ['placeholder' => 'Select a state ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);
 ?>
</div>
<input value="" name="w" id ="company">
<script>
    function addTableRow(obj) {

        $('#' + obj).append('<tr> <td>sl</td> <td>Treatment</td> <td>Qty</td> <td>Notes</td> <td> </td> </td> </tr>');
    }
    ;
</script>
