<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BookingsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bookings';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'token_num',
        [
            //patient name
            'format' => 'raw',
            'value' => function ($data) {
                return Html::a($data->patient->name, ['patient/view', 'id' => $data->patients_id]);
            },
                    'label' => 'Name',
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{myButton}',
                    'buttons' => [
                        'myButton' => function($url, $model, $key) {     // render your custom button
                            return Html::a('<span class= "glyphicon glyphicon-heart" style="color:red"></span>', ['consult/index', "bookingid" => $key],['class' => 'profile-link']);
                        }
                            ]
                        ]
                    ]
                ]);
                ?>