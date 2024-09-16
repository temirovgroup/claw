<?php
/**
 * Created by PhpStorm.
 */

use yii\helpers\Html;
use yii\helpers\Url;

/** @var \common\models\Order[]|\yii\db\ActiveRecord $orders */

$this->title = 'Заказы';
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h1><?= $this->title ?></h1>
    </div>
    <div class="panel-body">
        <?php if (empty($orders)) : ?>
            <h3 class="text text-warning">Список пуст :(</h3>
            <br>
        <?php else : ?>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover dynamic-table">
                    <thead>
                    <tr>
                        <th>Номер заказа</th>
                        <th>Дата оформления</th>
                        <th>Клиент</th>
                        <th>Контакты</th>
                        <th>Действие</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($orders as $data) : ?>
                        <tr>
                            <td><?= $data->id ?></td>
                            <td><?= $data->getCreateDate() ?></td>
                            <td><?= $data->getFullName() ?></td>
                            <td>
                                <a href="mailto:<?= $data->getEmail() ?>"><?= $data->getEmail() ?></a>
                            </td>
                            <td>
                                <a href="<?= Url::to(['order/view', 'id' => $data->id]) ?>" class="btn btn-success">
                                    Подробнее
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>
