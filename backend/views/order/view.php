<?php
/**
 * Created by PhpStorm.
 */

use yii\helpers\Html;
use yii\helpers\Url;

/** @var \common\models\Order|\yii\db\ActiveRecord $order */
/** @var \common\models\OrderItem[]|\yii\db\ActiveRecord $orderItems */

$this->title = "Заказ №{$order->id}";

$orderSum = array_sum(\yii\helpers\ArrayHelper::getColumn($orderItems, 'sum'));
?>

<div class="panel panel-default">
    <div class="panel-heading">
        Заказ №<?= $order->id ?>

        <hr>

        <div class="row">
            <div class="col-sm-6">
                Дата оформления: <?= $order->getCreateDate() ?>
                <br>
                Клиент: <?= $order->getFullName() ?>
                <br>
                E-Mail: <a href="mailto:<?= $order->email ?>"><?= $order->email ?></a>
                <br>
                Телефон: <a href="tel:+<?= $order->phone ?>"><?= \common\helpers\CollectorHelper::formatPhone($order->phone) ?></a>
                <br>
            </div>
            <div class="col-sm-6">
                <h3>Стоимость заказа: <?= \common\helpers\CollectorHelper::numFormat($orderSum) ?> &#8381;</h3>
                <br>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>Название товара</th>
                    <th>Кол-во</th>
                    <th>Цена</th>
                    <th>Сумма</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($orderItems as $data) : ?>
                    <?php
                    /** @var \common\models\Product $product */
                    $product = $data->product;
                    ?>
                    <tr>
                        <td><?= $product->getName() ?></td>
                        <td><?= $data->count ?></td>
                        <td><?= \common\helpers\CollectorHelper::numFormat($data->sum / $data->count) ?> &#8381;</td>
                        <td><?= \common\helpers\CollectorHelper::numFormat($data->sum) ?> &#8381;</td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
