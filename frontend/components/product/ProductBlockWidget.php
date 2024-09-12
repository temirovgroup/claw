<?php
/**
 * Created by PhpStorm.
 */

namespace frontend\components\product;

use yii\base\Widget;

class ProductBlockWidget extends Widget
{
    public $product;
    public string $imageSize = '800x570';

    public function run()
    {
        return $this->render('product_block', [
            'product' => $this->product,
            'imageSize' => $this->imageSize,
        ]);
    }
}
