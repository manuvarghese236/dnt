<?php

namespace app\controllers;

use Yii;
use app\models\Bookings;
use app\models\BookingsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Json;
use app\models\Daysession;

/**
 * BookingsController implements the CRUD actions for Bookings model.
 */
class BookingsController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'create', 'update', 'delete'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'create', 'update', 'delete'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Bookings models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new BookingsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Bookings model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Bookings model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Bookings();

        $model->load(Yii::$app->request->post());
        $query = Bookings::find()
                        ->andWhere(['patients_id' => $model->patients_id])
                        ->andWhere(['date' => $model->date])->one();


        if (!empty($query->doctors_id)) {
            Yii::$app->session->setFlash('error', 'You already have an appointment on this date');
            return $this->redirect(['view', 'id' => $query->id]);
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

//            $model->time = Yii::$app->formatter->
//                    asDate($_POST['hours'].$_POST['minutes'], 'HH:mm');

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Bookings model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Bookings model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionLoadhour() {
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $cat_id = $parents[0];

                if ($cat_id == 2) {
                    $out = [];
                    $out = [
                        ['id' => 7, 'name' => '07'],
                        ['id' => 8, 'name' => '08'],
                        ['id' => 9, 'name' => '09'],
                        ['id' => 10, 'name' => '10'],
                        ['id' => 11, 'name' => '11'],
                        ['id' => 12, 'name' => '12'],
                            // and so on
                    ];
                } elseif ($cat_id == 3) {
                    $out = [
                        ['id' => 1, 'name' => '01'],
                        ['id' => 2, 'name' => '02'],
                        ['id' => 3, 'name' => '03'],
                        ['id' => 4, 'name' => '04'],
                        ['id' => 5, 'name' => '05'],
                        ['id' => 6, 'name' => '06'],
                        ['id' => 7, 'name' => '07'],
                            // and so on
                    ];
                }

                // the getSubCatList function will query the database based on the
                // cat_id and return an array like below:
                // [
                //    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
                //    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
                // ]
                echo Json::encode(['output' => $out, 'selected' => '']);
                return;
            }
        }
//    echo Json::encode(['output'=>'', 'selected'=>'']);
    }

    public function actionHour() {
//    echo 'k: ';
//        die();
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];

            if ($parents != null) {
                $cat_id = $parents[0];
                $out = // the getSubCatList function will query the database based on the
                        // cat_id and return an array like below:
                        [
                            ['id' => '<sub-cat-id-1>', 'name' => '<sub-cat-name1>'],
                            ['id' => '<sub-cat_id_2>', 'name' => '<sub-cat-name2>']
                ];
                echo Json::encode(['output' => $out, 'selected' => '']);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }

    /**
     * Finds the Bookings model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Bookings the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Bookings::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
