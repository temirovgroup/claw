<?php
/**
 * Created by PhpStorm.
 */

/** @var \common\models\Product|\yii\db\ActiveRecord $product */
/** @var string $imageSize */
?>

<!-- Single Product Start -->
<div class="single-product-02">
    <div class="product-images">
        <a href="<?= $product->getUrlTo() ?>">
            <?= \yii\helpers\Html::img(\common\helpers\ImageHelper::getImageUrl($product, $imageSize, true), [
                'alt' => \yii\helpers\Html::encode($product->name),
            ]) ?>
        </a>

        <ul class="product-meta">
            <li>
                <a class="action" href="<?= $product->getUrlTo() ?>"><i class="pe-7s-shopbag"></i></a>
            </li>
        </ul>
    </div>
    <div class="product-content">
        <h4 class="title">
            <a href="<?= $product->getUrlTo() ?>">
                <?= $product->name ?>
            </a>
        </h4>
        <div class="price">
            <span class="sale-price"><?= $product->getPrice() ?> &#8381;</span>
            <?php if ($product->price < $product->old_price) : ?>
                <span class="old-price"><?= $product->getOldPrice() ?> &#8381;</span>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- Single Product End -->
