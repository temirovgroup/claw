<?php
/**
 * Created by PhpStorm.
 */

/** @var \yii\web\View $this */
/** @var \common\models\Category|\yii\db\ActiveRecord $category */
/** @var \common\models\Product|\yii\db\ActiveRecord $product */
/** @var \common\models\Product[]|\yii\db\ActiveRecord $recommendProducts */
?>

<!-- Product Details Section Start -->
<div class="section section-padding-02">
    <div class="container">

        <div class="row">
            <div class="col">
                <div class="d-flex flex-wrap justify-content-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="<?= \yii\helpers\Url::to(['/']) ?>">Главная</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <?= $product->getName() ?>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-7">
                <!-- Product Details Images Start -->
                <div class="product-details-images">

                    <!-- Details Gallery Images Start -->
                    <div class="row gy-3 gy-sm-5 row-cols-1">
                        <?php foreach (\common\helpers\ImageHelper::getImagesUrl($product, '1500x', true) as $key => $imageUrl) : ?>
                            <div class="single-img zoom">
                                <?= \yii\helpers\Html::img($imageUrl, [
                                    'alt' => \yii\helpers\Html::encode($product->getName()),
                                ]) ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- Details Gallery Images End -->

                </div>
                <!-- Product Details Images End -->

            </div>
            <div class="col-lg-5">

                <!-- Product Details Description Start -->
                <div class="product-details-description product-details-sticky">
                    <h4 class="product-name"><?= $product->getName() ?></h4>
                    <div class="price">
                        <span class="sale-price"><?= $product->getPrice() ?> &#8381;</span>
                    </div>

                    <p>
                        <?= $product->getDescriptionExcerpt() ?>
                    </p>

                    <div class="product-meta">
                        <div class="product-quantity d-inline-flex">
                            <button type="button" class="sub">-</i></button>
                            <input type="text" value="1" class="quantity-product-js" disabled/>
                            <button type="button" class="add">+</button>
                        </div>
                        <div class="meta-action">
                            <button class="btn btn-dark btn-hover-primary add-to-cart-js"
                                    data-product-id="<?= $product->id ?>">
                                Добавить в корзину
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Product Details Description End -->

            </div>
        </div>

    </div>
</div>
<!-- Product Details Section End -->

<!-- Product Details tab Section Start -->
<div class="section section-padding-02 mb-10 pb-10">
    <div class="container">

        <!-- Product Details Tabs Start -->
        <div class="product-details-tabs">
            <ul class="nav justify-content-center">
                <li>
                    <button data-bs-toggle="tab" data-bs-target="#information">Информация</button>
                </li>
                <li>
                    <button class="active" data-bs-toggle="tab" data-bs-target="#description">Описание</button>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade" id="information">
                    <!-- Information Content Start -->
                    <div class="information-content">
                        <?= $product->getInfo() ?>
                    </div>
                    <!-- Information Content End -->
                </div>
                <div class="tab-pane fade show active" id="description">
                    <!-- Description Content Start -->
                    <div class="description-content">
                        <?= $product->getDescription() ?>
                    </div>
                    <!-- Description Content End -->
                </div>
            </div>
        </div>
        <!-- Product Details Tabs End -->

    </div>
</div>
<!-- Product Details tab Section End -->

<!-- Sale Product Section Start -->
<?php if (!empty($recommendProducts)) : ?>
    <div class="section section-padding mt-n1">
        <div class="container">
            <div class="">
                <!-- Product Wrapper Start -->
                <div class="product-wrapper product-active-02">

                    <!-- Product Top Wrapper Start -->
                    <div class="product-top-wrapper mt-n1">

                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h2 class="title"># Похожие товары</h2>
                        </div>
                        <!-- Section Title End -->

                        <!-- Swiper Arrows End -->
                        <div class="swiper-arrows">
                            <!-- Add Arrows -->
                            <div class="swiper-button-prev"><i class="pe-7s-angle-left"></i></div>
                            <div class="swiper-button-next"><i class="pe-7s-angle-right"></i></div>
                        </div>
                        <!-- Swiper Arrows End -->

                    </div>
                    <!-- Product Top Wrapper End -->

                    <!-- Product Tabs Content Start -->
                    <div class="product-tabs-content">
                        <div class="tab-content">
                            <div class="tab-pane fade show active">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        <?php foreach ($recommendProducts as $recommendProduct) : ?>
                                            <div class="swiper-slide">
                                                <?= \frontend\components\product\ProductBlockWidget::widget(['product' => $recommendProduct, 'imageSize' => '364x277']) ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Product Tabs Content End -->

                </div>
                <!-- Product Wrapper End -->
            </div>
        </div>
    </div>
<?php endif; ?>
<!-- Sale Product Section End -->
