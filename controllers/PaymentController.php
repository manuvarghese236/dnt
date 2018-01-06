<?php

namespace app\controllers;

use Yii;
use app\models\Payment;
use app\models\PaymentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Bill;

/**
 * PaymentController implements the CRUD actions for Payment model.
 */
class PaymentController extends Controller {

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
     * Lists all Payment models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new PaymentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Payment model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Payment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Payment();

        if ($model->load(Yii::$app->request->post())) {

            $date = date('Y-m-d');
            $model->date = $date;
            $timestamp = round(microtime(true) * 1000);
            $model->payment_no = 'PA-' . $timestamp;
            $model->status = 1;

            self::checkBill($model);
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    function checkBill($model) {
        $totalAmount = Bill::find()
                ->where(['id' => $model->bill_id])
                ->sum('amount');

        $totalPaid = Payment::find()
                ->where(['bill_id' => $model->bill_id])
                ->sum('amount');
//        echo 'ta: '.$totalAmount.', '.($totalPaid + $model->amount);
//        die();
        if ($totalAmount == ($totalPaid + $model->amount)) {
            $modelBill = Bill::find()
                    ->where(['id' => $model->bill_id])
                    ->one();

            $modelBill->status = 1;
            $modelBill->save();
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function actionGetamount() {
        if (Yii::$app->request->isAjax) {

            $data = Yii::$app->request->post();

            $bill_index = explode(":", $data['bill_id']);

            $bill_index = $bill_index[0];
            $totalPaid = 0;
            $totalAmount = 0;
            $totalPaid = Payment::find()
                    ->where(['bill_id' => $bill_index])
                    ->sum('amount');
            $modelBill = Bill::find()
                    ->where(['status' => 2, 'id' => $bill_index])
                    ->one();
            $totalAmount = $modelBill->amount;
           
            echo $totalAmount - $totalPaid;
        }
    }

    /**
     * Updates an existing Payment model.
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
     * Deletes an existing Payment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Payment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Payment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Payment::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
