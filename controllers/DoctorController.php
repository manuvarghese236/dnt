<?php

namespace app\controllers;

use Yii;
use app\models\Doctor;
use app\models\BackendUser;
use app\controllers\BackendUserController;
use app\models\Availability;
use app\models\AvailabilitySearch;
use app\models\DoctorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DoctorController implements the CRUD actions for Doctor model.
 */
class DoctorController extends Controller {

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
     * Lists all Doctor models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new DoctorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Doctor model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $type_id = 0;
        if (!Yii::$app->user->isGuest) {
            $type_id = Yii::$app->user->identity->UserTypeID;


            if ($type_id == 1 || ($type_id == 5 && $id == Yii::$app->user->identity->doctor_id)) {

                return $this->render('view', [
                            'model' => $this->findModel($id),
                ]);
                echo 'aa: ' . Yii::$app->user->identity->doctor_id . ', id: ' . $id;
                die();
            } else {
                return $this->redirect(['/site/accesserror']);
            }
        } else {
            return $this->redirect(['/site/login']);
        }
    }

    /**
     * Creates a new Doctor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $type_id = 0;
        if (!Yii::$app->user->isGuest) {
            $type_id = Yii::$app->user->identity->UserTypeID;

            if ($type_id == 1) {
                $model = new Doctor();
                $avalable = new Availability();
                $buser = new BackendUser();
                /*
                  return $this->render('create', [
                  'avalable' => $avalable,
                  'model' => $model,

                  ]);
                 */
                if ($model->load(Yii::$app->request->post()) && $model->save()) {

                    $avalable->attributes = $_POST['Availability'];
                    $avalable->Doc_id = $model->id;

                    $avalable->save();

                    $buser->attributes = $_POST['BackendUser'];
                    $buser->doctor_id = $model->id;
                    $buser->UserTypeID = 5;
                    $buser->Status = 1;

                    $buser->save();

                    return $this->redirect(['view', 'id' => $model->id]);
                } else {
                    return $this->render('create', array(
                                'model' => $model,
                                'avalable' => $avalable
                                    )
                    );
                }
            } else {
                return $this->redirect(['/site/accesserror']);
            }
        } else {
            return $this->redirect(['/site/login']);
        }
    }

    /**
     * Updates an existing Doctor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $type_id = 0;
        if (!Yii::$app->user->isGuest) {
            $type_id = Yii::$app->user->identity->UserTypeID;

            if ($type_id == 1 ||
                    ($type_id == 5 && 
                    ($id == Yii::$app->user->identity->doctor_id||
                            Yii::$app->user->identity->doctor_id==0))) {
                $model = $this->findModel($id);
                $model2 = new Availability();
                $modelB = new BackendUser();
                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                    $model3 = Availability::find()->where(['Doc_id' => $model->id])->one();
                    $model3->attributes = $_POST['Availability'];
                    $model3->Doc_id = $model->id;
                    $model3->save();

                    $modelB = BackendUser::find()->where(['doctor_id' => $model->id])->one();

                    $modelB->attributes = $_POST['BackendUser'];
                    $modelB->doctor_id = $model->id;
                    $modelB->UserTypeID = 5;
                    $modelB->Status = 1;

                    return $this->redirect(['view', 'id' => $model->id]);
                } else {
                    return $this->render('update', [
                                'model' => $model,
                                'model2' => $model2,
                                'modelB' => $modelB,
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
     * Deletes an existing Doctor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $type_id = 0;
        if (!Yii::$app->user->isGuest) {
            $type_id = Yii::$app->user->identity->UserTypeID;

            if ($type_id == 1) {
                $modelB = BackendUser::find()->where(['doctor_id' => $id])->one();
                $modelA = Availability::find()->where(['Doc_id' => $id])->one();

                $modelA->delete();
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
     * Finds the Doctor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Doctor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        $type_id = 0;
        if (!Yii::$app->user->isGuest) {
            $type_id = Yii::$app->user->identity->UserTypeID;

            if ($type_id == 1 || ($type_id == 5 && $id == Yii::$app->user->identity->doctor_id)) {
                if (($model = Doctor::findOne($id)) !== null) {
                    return $model;
                } else {
                    throw new NotFoundHttpException('The requested page does not exist.');
                }
            } else {
                return $this->redirect(['/site/operationerror']);
            }
        } else {
            return $this->redirect(['/site/login']);
        }
    }

}
