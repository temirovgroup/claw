<?php

/** @var \yii\web\View $this */

/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">

    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="/front/images/favicon.jpg">

        <?php $this->head() ?>
    </head>
    <body>

    <!-- Header Start  -->
    <div class="header-area header-sticky d-none d-lg-block">
        <div class="container position-relative">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <!-- Header Logo Start -->
                    <div class="header-logo">
                        <a href="<?= \yii\helpers\Url::to(['/']) ?>"><img src="/front/images/logo.png" alt="Logo"></a>
                    </div>
                    <!-- Header Logo End -->
                </div>
                <div class="col-lg-6">
                </div>
                <div class="col-lg-3">
                    <!-- Header Meta Start -->
                    <div class="header-meta">
                        <?= \frontend\components\social\SocialIconWidget::widget() ?>

                        <div class="cart-modal-btn-wrap">
                            <?= \frontend\components\cart\CartModalWidget::widget() ?>
                        </div>
                    </div>
                    <!-- Header Meta End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Header Mobile Start -->
    <div class="header-mobile section d-lg-none">

        <!-- Header Mobile top Start -->
        <div class="header-mobile-top header-sticky">
            <div class="container">
                <div class="row row-cols-3 gx-2 align-items-center">
                    <div class="col">

                        <!-- Header Logo Start -->
                        <div class="header-logo text-center">
                            <a href="<?= \yii\helpers\Url::to(['/']) ?>">
                                <img src="/front/images/logo.png" alt="CLAW">
                            </a>
                        </div>
                        <!-- Header Logo End -->

                    </div>
                    <div class="col"></div>
                    <div class="col">

                        <!-- Header Action Start -->
                        <div class="header-meta">
                            <a class="action" href="<?= \yii\helpers\Url::to(['cart/index']) ?>">
                                <i class="pe-7s-shopbag"></i>
                                <span class="number"><?= \frontend\helpers\CartHelper::getCartCount() ?></span>
                            </a>
                        </div>
                        <!-- Header Action End -->

                    </div>
                </div>
            </div>
        </div>
        <!-- Header Mobile top End -->

    </div>
    <!-- Header Mobile End -->


    <div class="menu-overlay"></div>


    <?= $content ?>


    <!-- Footer Section Start -->
    <div class="section footer-section">

        <!-- Footer Top Start -->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-2 col-md-4">

                        <!-- Footer Logo Start -->
                        <div class="footer-logo">
                            <a href="<?= \yii\helpers\Url::to(['/']) ?>"><img src="/front/images/logo.png"
                                                                              alt="Logo"></a>
                        </div>
                        <!-- Footer Logo End -->

                    </div>
                    <div class="col-xl-10 col-md-8">

                        <!-- Footer Contact & Payment End -->
                        <div class="d-flex flex-wrap align-items-end footer-contact-payment">
                            <div class="footer-contact">
                                <div class="contact-icon">
                                    <img src="/front/images/icon/icon-4.png" alt="Icon">
                                </div>

                                <div class="contact-content">
                                    <h6 class="title">Позвоните нам:</h6>
                                    <p>+7 (987) 605-72-74</p>
                                </div>
                            </div>

                            <div class="mb-2">
                                <?= \frontend\components\social\SocialIconWidget::widget() ?>
                            </div>
                        </div>
                        <!-- Footer Contact & Payment End -->

                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Top End -->

        <!-- Footer Copyright End -->
        <div class="copyright">
            <div class="container">
                <div class="copyright-text">
                    <p>&copy; 2024 <span> CLAW </span> разработка <a
                                href="mailto:temirovgroup@gmail.com" target="_blank">temirovgroup</a></p>
                </div>
            </div>
        </div>
        <!-- Footer Copyright End -->

    </div>
    <!-- Footer Section End -->

    <!--Back To Start-->
    <a href="#" class="back-to-top">
        <i class="pe-7s-angle-up"></i>
    </a>
    <!--Back To End-->

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage();
