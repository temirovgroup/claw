<?php
/**
 * Created by PhpStorm.
 */

use yii\helpers\Html;
use yii\helpers\Url;

/** @var array $cartItems */
?>

<div class="dropdown">
    <a class="action d-flex flex-wrap align-items-center" href="<?= Url::to(['cart/index']) ?>" role="button"
       data-bs-toggle="dropdown">
        <i class="pe-7s-shopbag"></i>
        <span class="number"><?= $cartItems['cartCount'] ?></span>
    </a>

    <div class="dropdown-menu dropdown-cart">

        <?php if (empty($cartItems['cartData'])) : ?>
            <p class="text text-primary text-center"><strong>Корзина пуста :(</strong></p>
        <?php else : ?>
            <div class="cart-content" id="cart-content">
                <ul>
                    <?php foreach ($cartItems['cartData'] as $item) : ?>
                        <?php
                        /** @var \common\models\Product $cartProduct */
                        $cartProduct = $item['product'];
                        ?>
                        <li>
                            <!-- Single Cart Item Start -->
                            <div class="single-cart-item">
                                <div class="cart-thumb">
                                    <?= Html::img(\common\helpers\ImageHelper::getImageUrl($cartProduct, '98x98', true)) ?>
                                    <span class="product-quantity"><?= $item['quantity'] ?>x</span>
                                </div>
                                <div class="cart-item-content">
                                    <h6 class="product-name"><?= $cartProduct->getName() ?></h6>
                                    <span class="product-price"><?= $cartProduct->getPrice() ?> &#8381;</span>

                                    <a class="cart-remove" href="#"><i class="las la-times"></i></a>
                                </div>
                            </div>
                            <!-- Single Cart Item End -->
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="cart-price">
                <div class="cart-total">
                    <div class="price-inline">
                        <span class="label">Сумма заказа</span>
                        <span class="value"><?= \common\helpers\CollectorHelper::numFormat($cartItems['cartSum']) ?> &#8381;</span>
                    </div>
                </div>
            </div>
            <div class="checkout-btn">
                <a href="<?= Url::to(['cart/index']) ?>" class="btn btn-dark btn-hover-primary d-block">
                    Оформить заказ
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>
