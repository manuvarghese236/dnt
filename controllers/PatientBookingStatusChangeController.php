<?php

namespace app\controllers;

use Yii;
use app\models\PatientBookingStatusChange;
use app\models\PatientBookingStatusChangeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PatientBookingStatusChangeController implements the CRUD actions for PatientBookingStatusChange model.
 */
class PatientBookingStatusChangeController extends Controller {

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
     * Lists all PatientBookingStatusChange models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new PatientBookingStatusChangeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PatientBookingStatusChange model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->renderAjax('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PatientBookingStatusChange model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new PatientBookingStatusChange();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PatientBookingStatusChange model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

//        $last_token = PatientBookingStatusChange::find()
//                ->select(['COUNT(*) AS cnt'])
//                ->where(['date'=>date('Y-m-d')]);
//        echo 'tok: '.$last_token;
//        die();
//        $model->load(Yii::$app->request->post());
//        
//        if($model->token_num==0){
//           $model->token_num=$last_token+1; 
//        }

        if ($model->load(Yii::$app->request->post())) {
            $last_token = PatientBookingStatusChange::find()
                            ->where(['date' => date('Y-m-d'), 'status_id' => 2])->count();
            
            
//        $model->load(Yii::$app->request->post());

            if ($model->token_num == 0) {
                $model->token_num = $last_token+1;
            }
            
            if ($model->save()){
                return $this->redirect(['index']);
            }
//            echo 'tok: ' . $last_token+1;
//            die();
        } else {
            return $this->renderAjax('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PatientBookingStatusChange model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PatientBookingStatusChange model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PatientBookingStatusChange the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = PatientBookingStatusChange::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
