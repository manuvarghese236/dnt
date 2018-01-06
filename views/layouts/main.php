<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\bootstrap\Dropdown;
use kartik\sidenav;
use yii\helpers\Url;
use yii\web\View;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">SB Admin v2.0</a>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">

                    <li>
                        <div class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="fa fa-user fa-fw"></i><b class="caret"></b></a>
                            <?php
                            echo Dropdown::widget([
                                'items' => [

                                    '<li><a><i class="fa fa-gear fa-fw" href="#"></i>Settings</a></li>',
                                    '<li class="divider"></li>',
                                    Yii::$app->user->isGuest ? ('<li><a href="' . Url::to(['/site/login']) . '"><i class="fa fa-user fa-fw" href="#"></i>Log In</a></li>') : Html::beginForm(['/site/logout'], 'post')
                                            . Html::submitButton(
                                                    'Logout (' . Yii::$app->user->identity->Username . ')', ['class' => 'btn btn-link logout']
                                            )
                                            . Html::endForm(),
                                ],
                            ]);
                            ?>
                        </div>

                    </li>
                </ul>
                <!-- /.navbar-top-links -->


                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <?php
                        $menu = [
                            ['label' => 'Home', 'icon' => 'home', 'url' => Url::to(['/site/index'])],
                            ['label' => 'Specialization', 'icon' => 'home', 'url' => Url::to(['specialization/index'])],
                            ['label' => 'Treatment Type', 'icon' => 'home', 'url' => Url::to(['treatment-type/index'])],
                            ['label' => 'Treatment', 'icon' => 'home', 'url' => Url::to(['treatment/index'])],
                            ['label' => 'Bills', 'icon' => 'home', 'url' => Url::to(['bill/index'])],
                            ['label' => 'Payments', 'icon' => 'home', 'url' => Url::to(['payment/index'])],
                            ['label' => 'Patient', 'icon' => 'user', 'url' => Url::to(['patient/index'])],
                            ['label' => 'Medicine Dosage', 'icon' => 'user', 'url' => Url::to(['dosage/index'])],
                            ['label' => 'Medicine', 'icon' => 'user', 'url' => Url::to(['medicines/index'])],
                            ['label' => 'Prescription', 'icon' => 'user', 'url' => Url::to(['prescription/index'])],
                            ['label' => 'Doctor', 'icon' => 'user', 'url' => Url::to(['doctor/index'])],
                            ['label' => 'Appointments', 'icon' => 'bookmark', 'url' => Url::to(['bookings/index'])],
                            ['label' => 'Patient WL', 'icon' => 'bookmark', 'url' => Url::to(['patient-waiting-list/index'])],
                            ['label' => 'Users', 'icon' => 'user', 'url' => Url::to(['backend-user/index'])],
                            ['label' => 'Bookings Today', 'icon' => 'bookmark', 'url' => Url::to(['patient-booking-status-change/index'])],
                        ];
//                        $menu = [
//                            ['label' => 'Home', 'icon' => 'home', 'url' => Url::to(['/site/index', 'type' => sidenav\SideNav::TYPE_DEFAULT])],
//                        ];
                        $userType = 0;
                        $userId = 0;
                        if (!Yii::$app->user->isGuest){
                            $userType = Yii::$app->user->identity->UserTypeID;
                        }
//                        if ($userType == 3) {
//                            array_push($menu, ['label' => 'Patient Status', 'icon' => 'bookmark', 'url' => Url::to(['patient-booking-status-change/index', 'type' => sidenav\SideNav::TYPE_DEFAULT])], ['label' => 'Patient', 'icon' => 'user', 'url' => Url::to(['patient/index', 'type' => sidenav\SideNav::TYPE_DEFAULT])], ['label' => 'Appointments', 'icon' => 'bookmark', 'url' => Url::to(['bookings/index', 'type' => sidenav\SideNav::TYPE_DEFAULT])]
//                            );
//                        }
//
//                        if ($userType == 2) {
//                            array_push($menu, ['label' => 'Specialization', 'icon' => 'home', 'url' => Url::to(['specialization/index', 'type' => sidenav\SideNav::TYPE_DEFAULT])], ['label' => 'Patient', 'icon' => 'user', 'url' => Url::to(['patient/index', 'type' => sidenav\SideNav::TYPE_DEFAULT])], ['label' => 'Doctor', 'icon' => 'user', 'url' => Url::to(['doctor/index', 'type' => sidenav\SideNav::TYPE_DEFAULT])], ['label' => 'Appointments', 'icon' => 'bookmark', 'url' => Url::to(['bookings/index', 'type' => sidenav\SideNav::TYPE_DEFAULT])], ['label' => 'Patient WL', 'icon' => 'bookmark', 'url' => Url::to(['patient-waiting-list/index', 'type' => sidenav\SideNav::TYPE_DEFAULT])]);
//                        }
//
//                        if ($userType == 1) {
//                            array_push($menu, ['label' => 'Specialization', 'icon' => 'home', 'url' => Url::to(['specialization/index', 'type' => sidenav\SideNav::TYPE_DEFAULT])], ['label' => 'Patient', 'icon' => 'user', 'url' => Url::to(['patient/index', 'type' => sidenav\SideNav::TYPE_DEFAULT])], ['label' => 'Doctor', 'icon' => 'user', 'url' => Url::to(['doctor/index', 'type' => sidenav\SideNav::TYPE_DEFAULT])], ['label' => 'Appointments', 'icon' => 'bookmark', 'url' => Url::to(['bookings/index', 'type' => sidenav\SideNav::TYPE_DEFAULT])], ['label' => 'Patient WL', 'icon' => 'bookmark', 'url' => Url::to(['patient-waiting-list/index', 'type' => sidenav\SideNav::TYPE_DEFAULT])], ['label' => 'Users', 'icon' => 'user', 'url' => Url::to(['backend-user/index', 'type' => sidenav\SideNav::TYPE_DEFAULT])],['label' => 'Patient Status', 'icon' => 'bookmark', 'url' => Url::to(['patient-booking-status-change/index', 'type' => sidenav\SideNav::TYPE_DEFAULT])]);
//                        }
                         if ($userType == 5) {
                             $userId=Yii::$app->user->identity->doctor_id;
                            array_push($menu, ['label' => 'Doctor Profile', 'icon' => 'user', 'url' => Url::to(['doctor/view', 'id' => $userId])]);
                        }
                          if ($userType == 4) {
                             $userId=Yii::$app->user->identity->patient_id;
                            array_push($menu, ['label' => 'Patient Profile', 'icon' => 'user', 'url' => Url::to(['patient/view', 'id' => $userId])]);
                        }                          

                        $type = sidenav\SideNav::TYPE_DEFAULT;
                        echo sidenav\SideNav::widget([ 'type' => $type,
                            'encodeLabels' => false,
                            'heading' => "Clinic",
                            'items' => $menu,
                        ]);
                        ?>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

            <div id="page-wrapper">

                <!-- /.row -->

                <!-- /.row -->

                <!-- /.row -->

                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">


                        <!-- /.panel-heading -->
                        <div class="panel-body">

                            <?= $content ?>
                        </div>
                        <!-- /.panel-body -->

                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-6 -->

                    <!-- /.col-lg-6 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /#page-wrapper -->

        </div>


        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

                <p class="pull-right"><?= Yii::powered() ?></p>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
