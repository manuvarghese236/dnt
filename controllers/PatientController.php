<?php

namespace app\controllers;

use Yii;
use app\models\Patient;
use app\models\PatientSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\BackendUser;

/**
 * PatientController implements the CRUD actions for patient model.
 */
class PatientController extends Controller {

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
     * Lists all patient models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new patientSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single patient model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $type_id = 0;
        if (!Yii::$app->user->isGuest) {
            $type_id = Yii::$app->user->identity->UserTypeID;


            if ($type_id == 1 || $type_id == 2 ||$type_id == 3||$type_id == 5||
                    ($type_id == 4 && $id == Yii::$app->user->identity->patient_id)) {
                return $this->render('view', [
                            'model' => $this->findModel($id),
                ]);
            } else {
                return $this->redirect(['/site/accesserror']);
            }
        } else {
            return $this->redirect(['/site/login']);
        }
    }

    /**
     * Creates a new patient model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $type_id = 0;
        if (!Yii::$app->user->isGuest) {
            $type_id = Yii::$app->user->identity->UserTypeID;

            if ($type_id == 1||$type_id == 2||$type_id == 5||$type_id == 3) {
                $buser = new BackendUser();
                $model = new patient();

                if ($model->load(Yii::$app->request->post())) {

                    $model->dob = Yii::$app->formatter->asDate($_POST['patient']['dob'], 'yyyy-MM-dd');

                    if ($model->save()) {
                        $buser->attributes = $_POST['BackendUser'];
                        $buser->patient_id = $model->id;
                        $buser->UserTypeID = 4;
                        $buser->Status = 1;

                        $buser->save();

                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } else {
                    return $this->render('create', [
                                'model' => $model,
                    ]);
                }
            } else {
                return $this->redirect(['/site/accesserror']);
            }
        } else {
            return $this->redirect(['/site/login']);
        }
    }

    /**
     * Updates an existing patient model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $type_id = 0;
        if (!Yii::$app->user->isGuest) {
            $type_id = Yii::$app->user->identity->UserTypeID;

            if ($type_id == 1||$type_id == 2 ||$type_id == 3||
                    ($type_id == 4 &&
                    ($id == Yii::$app->user->identity->patient_id ||
                    Yii::$app->user->identity->patient_id == 0))) {
                $model = $this->findModel($id);

                if ($model->load(Yii::$app->request->post())) {
                    $model->dob = Yii::$app->formatter->asDate($_POST['patient']['dob'], 'yyyy-MM-dd');
                    if ($model->save()) {
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } else {
                    return $this->render('update', [
                                'model' => $model,
                    ]);
                }
            } else {
                return $this->redirect(['/site/accesserror']);
            }
        } else {
            return $this->redirect(['/site/login']);
        }
    }

    /**
     * Deletes an existing patient model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $type_id = 0;
        if (!Yii::$app->user->isGuest) {
            $type_id = Yii::$app->user->identity->UserTypeID;

            if ($type_id == 1||$type_id == 2||$type_id == 3||$type_id == 5) {
                $modelB = BackendUser::find()->where(['patient_id' => $id])->one();
                $this->findModel($id)->delete();
                $modelB->delete();

                return $this->redirect(['index']);
            } else {
                return $this->redirect(['/site/operationerror']);
            }
        } else {
            return $this->redirect(['/site/login']);
        }
    }

    /**
     * Finds the patient model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return patient the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = patient::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
