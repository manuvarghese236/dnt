<?php

namespace app\controllers;

use Yii;
use app\models\BackendUser;
use app\models\BackendUserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Doctor;
use app\models\Availability;
use app\models\Patient;

/**
 * BackendUserController implements the CRUD actions for BackendUser model.
 */
class BackendUserController extends Controller {

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
     * Lists all BackendUser models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new BackendUserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BackendUser model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $type_id = 0;
        if (!Yii::$app->user->isGuest) {
            $type_id = Yii::$app->user->identity->UserTypeID;


            if ($type_id == 1||$type_id == 2) {
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
     * Creates a new BackendUser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $type_id = 0;
        if (!Yii::$app->user->isGuest) {
            $type_id = Yii::$app->user->identity->UserTypeID;

            if ($type_id == 1||$type_id == 2) {
                $model = new BackendUser();

                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                    return $this->redirect(['view', 'id' => $model->ID]);
//                    addUserProfile($model->UserTypeID, $model->Username);
//                    switch ($model->UserTypeID) {
//                        case 5:
//                            $modelDoc = new Doctor();
//
//                            $modelDoc->id=0;
//                            $modelDoc->name = $model->Username;
//                            $modelDoc->mobile = "0000099999";
//                            $modelDoc->email = "example@email.com";
//                            $modelDoc->clinic_id = 1;
//                            $modelDoc->specialization_id = 2;
//                            $modelDoc->qualification = "My q";
//
////                            echo 'ss: '.$modelDoc->id;
////                               die();
//                           $modelDoc->save();
//                            $model->doctor_id = $modelDoc->id;
//                            $model->save();
//
//                            return $this->redirect(['doctor/update', 'id' => $modelDoc->id]);
//                            break;
//                        case 1:return $this->redirect(['view', 'id' => $model->ID]);
//                            break;
//                    }
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

    public function addUserProfile($typeId, $name) {
        
    }

    /**
     * Updates an existing BackendUser model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $type_id = 0;
        if (!Yii::$app->user->isGuest) {
            $type_id = Yii::$app->user->identity->UserTypeID;


            if ($type_id == 1||$type_id == 2) {
                $model = $this->findModel($id);

                if ($model->load(Yii::$app->request->post()) && $model->save()) {

                    return $this->redirect(['view', 'id' => $model->ID]);
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

    public function actionChange($id) {
        $type_id = 0;
        if (!Yii::$app->user->isGuest) {
            $type_id = Yii::$app->user->identity->UserTypeID;


            if ($type_id == 1||$type_id == 2) {
//                echo 'i: '.$id;
//            die();
                $model = $this->findModel($id);

                $model->Status == 1 ? $model->Status = 0 : $model->Status = 1;
                $model->save();

                return $this->redirect(['index']);
            } else {
                return $this->redirect(['/site/accesserror']);
            }
        } else {
            return $this->redirect(['/site/login']);
        }
    }

    /**
     * Deletes an existing BackendUser model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $type_id = 0;

        if (!Yii::$app->user->isGuest) {
            $type_id = Yii::$app->user->identity->UserTypeID;

            if ($type_id == 1||$type_id == 2) {
                $modelBa = $this->findModel($id);
                if ($modelBa->UserTypeID == 5) {
                    $modelAva = Availability::find()->where(['Doc_id' => $modelBa->doctor_id])->one();
                    $modelDoc = Doctor::find()->where(['id' => $modelBa->doctor_id])->one();

                    $modelBa->delete();
                    $modelAva->delete();
                    $modelDoc->delete();
                } elseif ($modelBa->UserTypeID == 4) {
                    $modelPat = Patient::find()->where(['id' => $modelBa->patient_id])->one();

                    $modelBa->delete();
                 $modelPat->delete();   
                }

                return $this->redirect(['index']);
            } else {
                return $this->redirect(['/site/operationerror']);
            }
        } else {
            return $this->redirect(['/site/login']);
        }
    }

    /**
     * Finds the BackendUser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BackendUser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        $type_id = 0;

        if (!Yii::$app->user->isGuest) {
            $type_id = Yii::$app->user->identity->UserTypeID;

            if ($type_id == 1||$type_id == 2) {
                if (($model = BackendUser::findOne($id)) !== null) {
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

    public function findModelByDoctorId($id) {
        $type_id = 0;

        if (!Yii::$app->user->isGuest) {
            $type_id = Yii::$app->user->identity->UserTypeID;

            if ($type_id == 1||$type_id == 2) {
                if (($model = BackendUser::find()->where(['doctor_id' => $id])) !== null) {
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
