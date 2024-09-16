<?php
/**
 * Created by PhpStorm.
 */

namespace frontend\helpers;

use common\models\Product;
use yii\helpers\Json;

class CartHelper
{
    /**
     * @param int $productId
     * @param int $quantity
     * @return bool
     */
    public static function add(int $productId, int $quantity): bool
    {
        if (empty($product = Product::findOne(['id' => $productId]))) {
            return false;
        }

        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId]['quantity'] += $quantity;
        } else {
            $_SESSION['cart'][$productId] = [
                'productId' => $productId,
                'product' => serialize($product),
                'quantity' => $quantity,
            ];
        }

        return true;
    }

    /**
     * @param $productId
     * @return bool
     */
    public static function reduce($productId): bool
    {
        if (!Product::find()->where(['id' => $productId])->exists()) {
            return false;
        }

        if (isset($_SESSION['cart'][$productId])) {
            if ($_SESSION['cart'][$productId]['quantity'] > 1) {
                $_SESSION['cart'][$productId]['quantity'] -= 1;
            }
        }

        return true;
    }

    /**
     * @return array
     */
    public static function getCartData(): array
    {
        $cartData = [];
        $cartCount = 0;
        $cartSum = 0;

        foreach ($_SESSION['cart'] ?? [] as $key => $cartItem) {
            /** @var Product $product */
            $product = unserialize($cartItem['product']);

            $cartCount += $cartItem['quantity'];
            $cartSum += $product->price * $cartItem['quantity'];

            $cartData[$key] = [
                'productId' => $cartItem['productId'],
                'product' => $product,
                'quantity' => $cartItem['quantity'],
                'sum' => $cartItem['quantity'] * $product->price,
            ];
        }

        return [
            'cartData' => $cartData,
            'cartCount' => $cartCount,
            'cartSum' => $cartSum,
        ];
    }

    public static function getCartCount()
    {
        $cartData = self::getCartData();

        return count($cartData['cartData']);
    }

    /**
     * @param $productId
     * @return bool
     */
    public static function delete($productId): bool
    {
        if (isset($_SESSION['cart'][$productId])) {
            unset($_SESSION['cart'][$productId]);

            return true;
        }

        return false;
    }
}
