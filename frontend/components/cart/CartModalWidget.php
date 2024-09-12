<?php
/**
 * Created by PhpStorm.
 */

namespace frontend\components\cart;

use frontend\helpers\CartHelper;
use yii\base\Widget;

class CartModalWidget extends Widget
{
    public function run()
    {
        return $this->render('cart-modal', [
            'cartItems' => CartHelper::getCartData(),
        ]);
    }
}
