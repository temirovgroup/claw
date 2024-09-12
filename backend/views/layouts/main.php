<?php

/** @var \yii\web\View $this */

/** @var string $content */

use backend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml" lang="<?= Yii::$app->language ?>">

    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>

        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>

    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= \yii\helpers\Url::to(['/']) ?>">CLAW</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <!--<li>
                            <a href="#"><i class="fa fa-gear fa-fw"></i> Настройки</a>
                        </li>-->
                        <li class="divider"></li>
                        <li>
                            <?= Html::a('<i class="fa fa-sign-out fa-fw"></i> выйти', ['site/logout'], [
                                'data' => [
                                    'method' => 'post',
                                    'confirm' => 'Вы уверены?',
                                ],
                            ]) ?>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a href="<?= \yii\helpers\Url::to(['category/index']) ?>"><i class="fa fa-desktop"></i> Категории</a>
                    </li>
                    <li>
                        <a href="<?= \yii\helpers\Url::to(['product/index']) ?>"><i class="fa fa-bar-chart-o"></i> Товары</a>
                    </li>
                    <li>
                        <a href="<?= \yii\helpers\Url::to(['order/index']) ?>"><i class="fa fa-edit"></i> Заказы</a>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            CLAW <small>Панель администратора</small>
                        </h1>
                    </div>
                </div>
                <!-- /. ROW  -->

                <?= $content ?>

                <!-- /. ROW  -->
                <footer><p>&copy; <?= date('Y') ?> Все права защищены</p></footer>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage();
