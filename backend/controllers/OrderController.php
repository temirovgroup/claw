<?php
/**
 * Created by PhpStorm.
 */

namespace backend\controllers;

use common\models\Order;
use common\models\OrderItem;

class OrderController extends AppController
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        $orders = Order::find()
            ->orderBy('created_at DESC')
            ->all();

        return $this->render('index', [
            'orders' => $orders,
        ]);
    }

    /**
     * @param $id
     * @return string
     */
    public function actionView($id)
    {
        $order = Order::findOne($id);
        $orderItems = OrderItem::find()
            ->where(['order_id' => $id])
            ->with(['product'])
            ->all();

        return $this->render('view', [
            'order' => $order,
            'orderItems' => $orderItems,
        ]);
    }
}
