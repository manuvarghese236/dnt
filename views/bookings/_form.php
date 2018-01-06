<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
use yii\helpers\Json;

/* @var $this yii\web\View */
/* @var $model app\models\Bookings */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bookings-form">

<?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-lg-3">
            <?=
            $form->field($model, 'doctors_id')->dropDownList(yii\helpers\ArrayHelper::
                    map(\app\models\Doctor::find()->asArray()->all(), 'id', 'name'), ['onchange' => 'loadDR_aval()', 'prompt' => 'Select Doctor']
            )
            ?>

            <script>
                function loadDR_aval()
                {
                    $.ajax({
                        url: '<?php
            echo Yii::$app->request->baseUrl
            . '/index.php?r=availability%2Fcheck'
            ?>',
                        type: 'post',
                        data: {
                            doc_id: $("#bookings-doctors_id").val(),
                            _csrf: '<?= Yii::$app->request->getCsrfToken() ?>'
                        },
                        success: function (data) {
                            console.log(data);
                            var message = "";
                            var count = 0;

                            if (data.dall == 1) {
                                message += " All week days";
                            } else {
                                if (data.d1 == 1) {
                                    count++;
                                    message += "SU";
                                }
                                if (data.d2 == 1) {
//                                    if (count != 0)
//                                        message += ","
                                    message += " MO";
                                    count++;
                                }
                                if (data.d3 == 1) {
//                                    if (count != 0)
//                                        message += ","
                                    message += " TU";
                                    count++;
                                }
                                if (data.d4 == 1) {
//                                    if (count != 0)
//                                        message += ","
                                    message += " WE";
                                    count++;
                                }
                                if (data.d5 == 1) {
//                                    if (count != 0)
//                                        message += ","
                                    message += " TH";
                                    count++;
                                }
                                if (data.d6 == 1) {
//                                    if (count != 0)
//                                        message += ","
                                    message += " FR";
                                    count++;
                                }
                                if (data.d7 == 1) {
//                                    if (count != 0)
//                                        message += ","
                                    message += " SA";
                                    count++;
                                }
                            }
                            $("#div1").html(message);
                        }
                    });
                }
            </script>

            <div id="div1" style="color:green"></div>
        </div>
        <div class="col-lg-1">
        </div>
        <div class="col-lg-3">
            <?=
            $form->field($model, 'patients_id')->dropDownList(yii\helpers\ArrayHelper::
                    map(\app\models\Patient::find()->asArray()->all(), 'id', 'name'),
                    ['prompt' => 'Select Patient'])
            ?>
        </div>
        <div class="col-lg-1">
        </div>
        <div class="col-lg-3">

            <?php
            echo $form->field($model, 'date')->widget(\yii\jui\DatePicker::classname(), [
                //'language' => 'ru',
                'dateFormat' => 'yyyy-MM-dd',
                'options' => [
                    'class' => 'form-control',
                    'onSelect' => 'js:function( visitedDate ) {
                  alert("ss");
             }', 'onChange' => 'GetAvailability()'
                ]
            ]);
            ?>

            <script>
                function GetAvailability()
                {

                    $.ajax({
                        url: '<?php
            echo Yii::$app->request->baseUrl
            . '/index.php?r=availability%2Fdaycheck'
            ?>',
                        type: 'post',
                        data: {
                            doc_id: $("#bookings-doctors_id").val(),
                            book_date: $("#bookings-date").val(),
                            _csrf: '<?= Yii::$app->request->getCsrfToken() ?>'
                        },
                        success: function (data) {
                            console.log("data: " + data.day);
                            if (data.day == 1)
                                $("#div2").html("Available on this Date");
                            else
                                $("#div2").html("Not Available on this Date");
                        }
                    });
                }
            </script>
            <div id="div2" style="color:green">

            </div>
        </div>

        <?php
        $mins = array();
        for ($i = 0; $i < 60; $i += 10) {
            array_push($mins, $i);
        }
        ?>
        

    </div>

    <div class="row">
        <div class="col-lg-5">
            <h1></h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-5">
            <?=
                    $form->field($model, 'time_session')->
                    dropDownList(yii\helpers\ArrayHelper::map(\app\models\Daysession::find()->
                                    where(['status' => 1])
                                    ->asArray()->all(), 'id', 'name'), 
                            ['id' => 'time_session-id', 'prompt' => 'Select Time Session'], 
                            ['onChange' => 'GetSessionAvailability()'])
            ?>
            <script>
                function GetSessionAvailability()
                {

                    $.ajax({
                        url: '<?php
            echo Yii::$app->request->baseUrl
            . '/index.php?r=availability%2Fdaycheck'
            ?>',
                        type: 'post',
                        data: {
                            doc_id: $("#bookings-doctors_id").val(),
                            book_date: $("#bookings-date").val(),
                            _csrf: '<?= Yii::$app->request->getCsrfToken() ?>'
                        },
                        success: function (data) {
                            var timeSession = $("#bookings-time_session").val();
                            console.log("data-day: " + data.session);
                            console.log("data s: " + timeSession);

                            if (data.session != 1) {
                                if (data.session != timeSession) {
                                    if (data.session == 2)
                                        $("#div3").html("Available only on Morning Session");
                                    else if (data.session == 3)
                                        $("#div3").html("Available only on Evening session");
                                } else {
                                    $("#div3").html("Doctor is Available");
                                }
                            } else {
                                $("#div3").html("Doctor is Available");
                            }

                        }
                    });

                }
            </script>
            <div id="div3" style="color:green">

            </div>
        </div>

        <div class="col-lg-1">
        </div>
        <div class="col-lg-2">
            <?=
            $form->field($model, 'time_hour')->widget(DepDrop::classname(), [
                'options' => ['id' => 'time_hour-id'],
                'data' => [$model->time_hour => $model->time_hour],
                'pluginOptions' => [
                    'depends' => ['time_session-id'],
                    'loading' => 'true',
                    'placeholder' => 'Select...',
                    'url' => Url::to(['/bookings/loadhour'])
                ]
            ])
            ?>

        </div>
<div class="col-lg-1">
        </div>
        <div class="col-lg-2">
            <?=
                    $form->field($model, 'time_minute')->dropDownList($mins, ['prompt' => 'Mins'])
                    ->label('Minutes')
            ?>
        </div>
        <div class="col-lg-6">
<?= $form->field($model, 'diseases_description')->textarea(['rows' => 6]) ?>
        </div>


    </div>
<?php
if (Yii::$app->session->hasFlash('error')) {
    $msg = Yii::$app->session->getFlash('error');
    $this->registerJs('$.notify("' . $msg . '", "error");');
}
?>
    <div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

        <?php ActiveForm::end(); ?>

</div>
