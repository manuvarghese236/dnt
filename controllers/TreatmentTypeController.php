<?php

namespace app\controllers;

use Yii;
use app\models\TreatmentType;
use app\models\TreatmentTypeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TreatmentTypeController implements the CRUD actions for TreatmentType model.
 */
class TreatmentTypeController extends Controller {

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
     * Lists all TreatmentType models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new TreatmentTypeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TreatmentType model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $type_id = 0;
        if (!Yii::$app->user->isGuest) {
            $type_id = Yii::$app->user->identity->UserTypeID;
            if ($type_id == 1||$type_id == 2) {
                return $this->renderAjax('view', [
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
     * Creates a new TreatmentType model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $type_id = 0;
        if (!Yii::$app->user->isGuest) {
            $type_id = Yii::$app->user->identity->UserTypeID;
            if ($type_id == 1 || $type_id == 2) {
                $model = new TreatmentType();

                if ($model->load(Yii::$app->request->post()) && $model->save()) {

                    return $this->redirect(['view', 'id' => $model->id]);
                } else {
                    return $this->renderAjax('create', [
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
     * Updates an existing TreatmentType model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $type_id = 0;
        if (!Yii::$app->user->isGuest) {
            $type_id = Yii::$app->user->identity->UserTypeID;
            if ($type_id == 1 || $type_id === 2) {
                $model = $this->findModel($id);

                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                } else {
                    return $this->renderAjax('update', [
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
     * Deletes an existing TreatmentType model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $type_id = 0;
        if (!Yii::$app->user->isGuest) {
            $type_id = Yii::$app->user->identity->UserTypeID;
            if ($type_id == 1 || $type_id == 2) {
                $this->findModel($id)->delete();

                return $this->redirect(['index']);
            } else {
                return $this->redirect(['/site/accesserror']);
            }
        } else {
            return $this->redirect(['/site/login']);
        }
    }

    /**
     * Finds the TreatmentType model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TreatmentType the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = TreatmentType::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
