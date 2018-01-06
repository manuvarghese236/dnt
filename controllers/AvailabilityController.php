<?php

namespace app\controllers;

use Yii;
use app\models\Availability;
use app\models\AvailabilitySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AvailabilityController implements the CRUD actions for Availability model.
 */
class AvailabilityController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Availability models.
     * @return mixed
     */
    public function actionCheckdr() {
        return 'Avalibale';
    }

    public function actionIndex() {
        $searchModel = new AvailabilitySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Availability model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Availability model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Availability();

      
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Availability model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Availability model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Availability model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Availability the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Availability::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionCheck() {
        if (Yii::$app->request->isAjax) {

            $data = Yii::$app->request->post();
//    echo 'kkk '. $data['doc_id'];
//    die();
            $searchname = explode(":", $data['doc_id']);

            $searchname = $searchname[0];

            $search = // your logic;
                    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            $query = Availability::find()->where(['Doc_id' => $searchname])->one();
//      $query = Availability::findOne(['Doc_id = $searchname']);  
//    $query = Availability::findOne(2);
//echo $query->ID;
//die();
            return [
                'd1' => $query->d1,
                'd2' => $query->d2,
                'd3' => $query->d3,
                'd4' => $query->d4,
                'd5' => $query->d5,
                'd6' => $query->d6,
                'd7' => $query->d7,
                'dall' => $query->dall,
                's1' => $query->s1,
                's2' => $query->s2,
                's3' => $query->s3,
                's4' => $query->s4,
                's5' => $query->s5,
                's6' => $query->s6,
                's7' => $query->s7,
                'sall' => $query->sall,
            ];
        }
    }

    public function actionGetavail() {
        if (Yii::$app->request->isAjax) {

            $data = Yii::$app->request->post();
//    echo 'kkk '. $data['doc_id'];
//    die();
            $datee = explode(":", $data['datee']);
            $doc_id = explode(":", $data['doc_id']);

            $datee = $datee[0];
            $doc_id = $doc_id[0];
            $search = // your logic;
                    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $query = Availability::find()->where(['Doc_id' => $doc_id])->one();

//            if(date('l', strtotime($datee))=='Wednesday')
//            
//                    $test="ok";
//                else 
            echo 'did: ' . $doc_id;
            echo 'q: ' . $datee;
            die();
            $test = 0;
            $session = 0;
//            switch (date('l', strtotime($datee))) {
//                case "Sunday": if ($query->d1 == 1) {
//                        $test = 1;
//                        $session = $query->s1;
//                    }
//                    break;
//                case "Monday": if ($query->d2 == 1) {
//                        $test = 1;
//                        $session = $query->s2;
//                    }
//                    break;
//                case "Wednesday": if ($query->d4 == 1) {
//                        $test = 1;
//                        $session = $query->s4;
//                    }
//                    break;
//                case "Tuesday": if ($query->d3 == 1) {
//                        $test = 1;
//                        $session = $query->s3;
//                    }
//                    break;
//                case "Thursday": if ($query->d5 == 1) {
//                        $test = 1;
//                        $session = $query->s5;
//                    }
//                    break;
//                case "Friday": if ($query->d6 == 1) {
//                        $test = 1;
//                        $session = $query->s6;
//                    }
//                    break;
//                case "Saturday": if ($query->d7 == 1) {
//                        $test = 1;
//                        $session = $query->s7;
//                    }
//                    break;
//            }
//            echo 'sess: ' . $session;
//            echo 'day: ' . $test;
//            die();
//            if (date('l', strtotime($datee)) == "Wednesday") {
//                if ($query->d4 == 1) {
//                    $test = 1;
//                }
//            } elseif (date('l', strtotime($datee)) == "Tuesday") {
//                if ($query->d2 == 1) {
//                    $test = 1;
//                }
//            }

            return [
                'd1' => $query->d1,
                'd2' => $query->d2,
                'd3' => $query->d3,
                'd4' => $query->d4,
                'd5' => $query->d5,
                'd6' => $query->d6,
                'd7' => $query->d7,
                'dall' => $query->dall,
                's1' => $query->s1,
                's2' => $query->s2,
                's3' => $query->s3,
                's4' => $query->s4,
                's5' => $query->s5,
                's6' => $query->s6,
                's7' => $query->s7,
                'sall' => $query->sall,
            ];
        }
    }

    public function actionDaycheck() {
        if (Yii::$app->request->isAjax) {

            $data = Yii::$app->request->post();


            $doc_id = explode(":", $data['doc_id']);
            $book_date = explode(":", $data['book_date']);

            $doc_id = $doc_id[0];
            $book_date = $book_date[0];

            $search = // your logic;
                    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
//            echo 'id: '.$doc_id;
//            echo 'idd: '.$doc_idd;
//            die();

            $query = Availability::find()->where(['Doc_id' => $doc_id])->one();

            $test = 0;
            $session = 0;
            
            switch (date('l', strtotime($book_date))) {
                case "Sunday": if ($query->d1 == 1) {
                        $test = 1;
                        $session = $query->s1;
                    }
                    break;
                case "Monday": if ($query->d2 == 1) {
                        $test = 1;
                        $session = $query->s2;
                    }
                    break;
                case "Wednesday": if ($query->d4 == 1) {
                        $test = 1;
                        $session = $query->s4;
                    }
                    break;
                case "Tuesday": if ($query->d3 == 1) {
                        $test = 1;
                        $session = $query->s3;
                    }
                    break;
                case "Thursday": if ($query->d5 == 1) {
                        $test = 1;
                        $session = $query->s5;
                    }
                    break;
                case "Friday": if ($query->d6 == 1) {
                        $test = 1;
                        $session = $query->s6;
                    }
                    break;
                case "Saturday": if ($query->d7 == 1) {
                        $test = 1;
                        $session = $query->s7;
                    }
                    break;
            }
            
            if ($query->dall == 1){
                $test = 1;
            }
//            echo 'sess: ' . $session;
//            echo 'day: ' . $test;
//            die();

            return [
                'day' => $test,
                'session' => $session
            ];
//      
        }
    }

    public function actionSessioncheck() {
        if (Yii::$app->request->isAjax) {

            $data = Yii::$app->request->post();


            $doc_id = explode(":", $data['doc_id']);
            $book_date = explode(":", $data['book_date']);

            $doc_id = $doc_id[0];
            $book_date = $book_date[0];

            $search = // your logic;
                    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
//            echo 'id: '.$doc_id;
//            echo 'idd: '.$doc_idd;
//            die();

            $query = Availability::find()->where(['Doc_id' => $doc_id])->one();

            $test = 0;
            $session = 0;
            switch (date('l', strtotime($book_date))) {
                case "Sunday": if ($query->d1 == 1) {
                        $test = 1;
                        $session = $query->s1;
                    }
                    break;
                case "Monday": if ($query->d2 == 1) {
                        $test = 1;
                        $session = $query->s2;
                    }
                    break;
                case "Wednesday": if ($query->d4 == 1) {
                        $test = 1;
                        $session = $query->s4;
                    }
                    break;
                case "Tuesday": if ($query->d3 == 1) {
                        $test = 1;
                        $session = $query->s3;
                    }
                    break;
                case "Thursday": if ($query->d5 == 1) {
                        $test = 1;
                        $session = $query->s5;
                    }
                    break;
                case "Friday": if ($query->d6 == 1) {
                        $test = 1;
                        $session = $query->s6;
                    }
                    break;
                case "Saturday": if ($query->d7 == 1) {
                        $test = 1;
                        $session = $query->s7;
                    }
                    break;
            }
//            echo 'sess: ' . $session;
//            echo 'day: ' . $test;
//            die();

            return [
                'day' => $test,
                'session' => $session
            ];
//      
        }
    }

}
