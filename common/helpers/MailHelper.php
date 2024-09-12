<?php
/**
 * Created by PhpStorm.
 */

namespace common\helpers;

use frontend\helpers\CartHelper;
use Yii;

class MailHelper
{
    /**
     * @param $order
     * @param $sendTo
     * @param $splitSubject
     * @param $is_admin
     * @return bool
     */
    public static function sendMail($order, $sendTo, $splitSubject = '', $is_admin = 0): bool
    {
        $subject = "[CLAW] Новый заказ №{$order->uin}{$splitSubject}";

        return Yii::$app
            ->mailer
            ->compose('order', [
                'order' => $order,
                'is_admin' => $is_admin,
                'cartItems' => CartHelper::getCartData(),
            ])
            ->setFrom([Yii::$app->params['mailer']['email'] => 'Интернет-магазин CLAW'])
            ->setTo([$sendTo])
            ->setSubject($subject)
            ->send();
    }
}
