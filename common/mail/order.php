<?php
/**
 * Created by PhpStorm.
 */

use yii\helpers\Html;
use yii\helpers\Url;

/** @var \common\models\Order $order */
/** @var bool $is_admin */
/** @var array $cartItems */
?>

<h2>Данные клиента</h2>
<table cellpadding="0" cellspacing="0" style="border: 1px solid #9e9e9e; font-size: 18px; width:100%; text-align: left;">
    <thead>
    <tr>
        <th style="border: 1px solid #9e9e9e; padding: 10px;">Дата заказа</th>
        <th style="border: 1px solid #9e9e9e; padding: 10px;">Номер заказа</th>
        <th style="border: 1px solid #9e9e9e; padding: 10px;">Заказчик</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td style="border: 1px solid #9e9e9e; padding: 10px;"><?= $order->getCreateDate() ?></td>
        <td style="border: 1px solid #9e9e9e; padding: 10px;"><?= $order->uin ?></td>
        <td style="border: 1px solid #9e9e9e; padding: 10px;">
            <?= $order->getFullName() ?>
            <br>
            <?= $order->getEmail() ?>
        </td>
    </tr>
    </tbody>
    <tfoot>
    <tr>
        <th style="border: 1px solid #9e9e9e; padding: 10px;">Примечание</th>
        <th colspan="2" style="border: 1px solid #9e9e9e; padding: 10px;"><?= $order->getNote() ?></th>
    </tr>
    </tfoot>
</table>

<br>

<h2>Состав заказа</h2>

<table cellpadding="0" cellspacing="0" style="border: 1px solid #9e9e9e; font-size: 18px; width:100%; background-color: #F3F3F3; text-align: left;">
    <thead>
    <tr>
        <th style="border: 1px solid #9e9e9e; padding: 10px;">Товар</th>
        <th style="border: 1px solid #9e9e9e; padding: 10px;">Кол-во</th>
        <th style="border: 1px solid #9e9e9e; padding: 10px;">Сумма</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($cartItems['cartData'] as $cartItem): ?>
        <?php
        /** @var \common\models\Product $product */
        $product = $cartItem['product'];
        ?>
        <tr>
            <td style="border: 1px solid #9e9e9e; padding: 10px;"><?= $product->getName() ?></td>
            <td style="border: 1px solid #9e9e9e; padding: 10px;"><?= $cartItem['quantity'] ?></td>
            <td style="border: 1px solid #9e9e9e; padding: 10px;"><?= $cartItem['sum'] ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    <tfoot>
    <tr>
        <th colspan="2" style="border: 1px solid #9e9e9e; padding: 10px;">Общая стоимость</th>
        <th style="border: 1px solid #9e9e9e; padding: 10px;"><?= $cartItems['cartSum'] ?></th>
    </tr>
    </tfoot>
</table>
