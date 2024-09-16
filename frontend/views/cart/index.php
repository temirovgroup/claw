<?php
/**
 * Created by PhpStorm.
 */

use frontend\helpers\CartHelper;use yii\helpers\Html;
use yii\helpers\Url;

/** @var array $cartItems */

$this->title = 'Корзина | CLAW';
?>

<!-- Shopping Cart Section Start -->
<div class="section section-padding mt-5 mb-5">
    <div class="container mt-5 pt-5">
        <div class="cart-wrapper">
            <!-- Cart Wrapper Start -->
            <div class="cart-table table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th class="product-thumb"></th>
                        <th class="product-info">Товар</th>
                        <th class="product-quantity">Кол-во</th>
                        <th class="product-total-price">Сумма</th>
                        <th class="product-action"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($cartItems['cartData'] as $item) : ?>
                        <?php
                        /** @var \common\models\Product $cartProduct */
                        $cartProduct = $item['product'];
                        ?>
                        <tr>
                            <td class="product-thumb">
                                <?= Html::img(\common\helpers\ImageHelper::getImageUrl($cartProduct, '110x76', true)) ?>
                            </td>
                            <td class="product-info">
                                <h6 class="name">
                                    <a href="<?= $cartProduct->getUrlTo() ?>">
                                        <?= $cartProduct->getName() ?>
                                    </a>
                                </h6>
                                <div class="product-prices">
                                    <?php if ($cartProduct->price < $cartProduct->old_price) : ?>
                                        <span class="old-price"><?= $cartProduct->getOldPrice() ?> &#8381;</span>
                                    <?php endif; ?>
                                    <span class="sale-price"><?= $cartProduct->getPrice() ?> &#8381;</span>
                                </div>
                            </td>
                            <td class="quantity">
                                <div class="product-quantity d-inline-flex product-quantity-cart-js">
                                    <button type="button" class="sub" data-product-id="<?= $cartProduct->id ?>">-</i></button>
                                    <input type="text" value="<?= $item['quantity'] ?>" disabled/>
                                    <button type="button" class="add" data-product-id="<?= $cartProduct->id ?>">+</button>
                                </div>
                            </td>
                            <td class="product-total-price" style="width: 150px !important;">
                                <span class="price"><?= \common\helpers\CollectorHelper::numFormat($item['sum']) ?> &#8381;</span>
                            </td>
                            <td class="product-action">
                                <a href="#" class="remove" data-product-id="<?= $cartProduct->id ?>"><i class="pe-7s-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Cart Wrapper End -->
            <div class="cart-btn">
                <div class="left-btn">
                </div>
                <div class="right-btn">
                    <a href="<?= Url::to(['cart/order']) ?>" class="btn btn-outline-dark">
                        Перейти к оформлению
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shopping Cart Section End -->
