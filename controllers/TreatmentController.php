<?php

namespace app\controllers;

use Yii;
use app\models\Treatment;
use app\models\Bill;
use app\models\TreatmentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TreatmentController implements the CRUD actions for Treatment model.
 */
class TreatmentController extends Controller {

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
     * Lists all Treatment models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new TreatmentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Treatment model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Treatment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Treatment();
// && $model->save()
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if (isset($_POST['save'])){
            $model->date = Yii::$app->formatter->asDate($model->date, 'yyyy-MM-dd');
            }  else {
               
                self::generatebill();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    public function generatebill() {
        $model = new Treatment();
        $modelBill = new Bill();

        if ($model->load(Yii::$app->request->post())) {

            $timestamp  = round(microtime(true) * 1000);;
            $modelBill->bill_no = 'BI' . $timestamp;
            $modelBill->date = $model->date;
            $modelBill->amount = $model->cost - $model->dicsount;
            $modelBill->status = 2;
            $modelBill->save();
            $model->bill_id = $modelBill->id;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    public function actionGeneratebill($id){
          $model = Treatment::find()->where(['id'=>$id])->one();
        $modelBill = new Bill();


            $timestamp  = round(microtime(true) * 1000);;
            $modelBill->bill_no = 'BI' . $timestamp;
            $modelBill->date = $model->date;
            $modelBill->amount = $model->cost - $model->dicsount;
            $modelBill->status = 2;
            $modelBill->save();
            $model->bill_id = $modelBill->id;
            $model->save();
            return $this->redirect(['bill/view', 'id' => $modelBill->id]);
      
    }

    /**
     * Updates an existing Treatment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
//            echo 'kk: '.$model->status;
//            die();
//            echo 'ss: '.$model->date;
//            die();
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Treatment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Treatment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Treatment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Treatment::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
