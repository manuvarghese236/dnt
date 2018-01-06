<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Doctor;
use app\models\Availability;
use app\models\BackendUser;
use app\models\Patient;

class SiteController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post())&&$model->login()) {
//           $userB=BackendUser::find()->where(['Username'=>$model->username]);
//            if ($model->login()) {
                if (Yii::$app->user->identity->UserTypeID == 5 &&
                        Yii::$app->user->identity->doctor_id == 0) {
                    $modelDoc = new Doctor();
//
                    $modelDoc->id = 0;
                    $modelDoc->name = Yii::$app->user->identity->Username;
                    $modelDoc->mobile = "0000099999";
                    $modelDoc->email = "example@email.com";
                    $modelDoc->clinic_id = 1;
                    $modelDoc->specialization_id = 2;
                    $modelDoc->qualification = "My q";

                    $modelDoc->save();

                    $modelAv = new Availability();
                    $modelAv->ID = 0;
                    $modelAv->Doc_id = $modelDoc->id;
                    $modelAv->d1 = 0;
                    $modelAv->d2 = 0;
                    $modelAv->d3 = 0;
                    $modelAv->d4 = 0;
                    $modelAv->d5 = 0;
                    $modelAv->d6 = 0;
                    $modelAv->d7 = 0;
                    $modelAv->dall = 0;

                    $modelAv->s1 = 1;
                    $modelAv->s2 = 1;
                    $modelAv->s3 = 1;
                    $modelAv->s4 = 1;
                    $modelAv->s5 = 1;
                    $modelAv->s6 = 1;
                    $modelAv->s7 = 1;
                    $modelAv->sall = 1;

                    $modelAv->save();

                    $modelBa = BackendUser::find()->where(['Username' => Yii::$app->user->identity->Username])->one();

                    $modelBa->doctor_id = $modelDoc->id;
                    $modelBa->save();


                    return $this->redirect(['doctor/update', 'id' => $modelDoc->id]);
                } elseif (Yii::$app->user->identity->UserTypeID == 4 && Yii::$app->user->identity->patient_id == 0) {

                    $modelPat = new Patient();
//
                    $modelPat->id = 0;
                    $modelPat->name = Yii::$app->user->identity->Username;
                    $modelPat->phone = "0000099999";
                    $modelPat->email = "myid@email.com";
                    $modelPat->address = "My Address";
                    $modelPat->dob = "0000-00-00";
                    $modelPat->blood_group = 1;
                    $modelPat->Sex = 1;

                    $modelPat->save();

                    $modelBa = BackendUser::find()->where(['Username' => Yii::$app->user->identity->Username])->one();

                    $modelBa->patient_id = $modelPat->id;
                    $modelBa->save();

                    return $this->redirect(['patient/update', 'id' => $modelPat->id]);
                }

                return $this->goBack();
//            }
        }
        return $this->render('login', [
                    'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
                    'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout() {
        return $this->render('about');
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAccesserror() {
        return $this->render('access_error');
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionOperationerror() {
        return $this->render('operation_error');
    }

}
