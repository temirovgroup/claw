<?php
/**
 * Created by PhpStorm.
 */

use yii\helpers\Html;

/** @var array $cartItems */
/** @var \common\models\Order $model */

$this->title = 'Оформление заказа | CLAW';
?>

<!-- Shopping Cart Section Start -->
<div class="section section-padding mt-5">
    <div class="container">

        <!--<div class="checkout-info mt-30">
            <p class="info-header error"><i class="fa fa-exclamation-circle"></i> <strong>Error:</strong> Username is
                required.</p>
        </div>

        <div class="checkout-info mt-30">
            <p class="info-header"><i class="fa fa-exclamation-circle"></i> Returning customer? <a
                    data-bs-toggle="collapse" href="#login">Click here to login</a></p>
        </div>-->

        <?php $form = \yii\widgets\ActiveForm::begin() ?>
        <div class="row">
            <div class="col-lg-7">
                <!-- Checkout Form Start -->
                <div class="checkout-form">
                    <div class="checkout-title">
                        <h4 class="title">Оформить заказ</h4>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="single-form">
                                <?= $form->field($model, 'name')
                                    ->textInput(['placeholder' => 'Имя'])
                                    ->label(false)
                                    ->error(false)
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="single-form">
                                <?= $form->field($model, 'last_name')
                                    ->textInput(['placeholder' => 'Фамилия'])
                                    ->label(false)
                                    ->error(false)
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="single-form">
                                <?= $form->field($model, 'patronymic')
                                    ->textInput(['placeholder' => 'Отчество'])
                                    ->label(false)
                                    ->error(false)
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="single-form">
                                <?= $form->field($model, 'address')
                                    ->textInput(['placeholder' => 'Адрес с индексом'])
                                    ->label(false)
                                    ->error(false)
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="single-form">
                                <?= $form->field($model, 'phone')
                                    ->widget(\yii\widgets\MaskedInput::class, [
                                        'mask' => '+7 (999) 999-99-99',
                                        'options' => [
                                            'class' => 'form-control',
                                            'placeholder' => 'Телефон',
                                        ],
                                        'clientOptions' => [
                                            'clearIncomplete' => true,
                                        ],
                                    ])
                                    ->label(false)
                                    ->error(false)
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="single-form">
                                <?= $form->field($model, 'email')
                                    ->textInput(['placeholder' => 'Email'])
                                    ->label(false)
                                    ->error(false)
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="single-form checkout-note">
                        <?= $form->field($model, 'note')->textarea(['placeholder' => 'Укажите Ваши пожелания и примечания к заказу'])->error(false) ?>
                    </div>
                </div>
                <!-- Checkout Form End -->
            </div>
            <div class="col-lg-5">
                <div class="checkout-order">
                    <div class="checkout-title">
                        <h4 class="title">Ваш заказ</h4>
                    </div>

                    <div class="checkout-order-table table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="Product-name">Товар</th>
                                <th class="Product-price">Цена</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($cartItems['cartData'] as $item) : ?>
                                <?php
                                /** @var \common\models\Product $cartProduct */
                                $cartProduct = $item['product'];
                                ?>
                                <tr>
                                    <td class="Product-name">
                                        <p><?= $cartProduct->getName() ?> × <?= $item['quantity'] ?></p>
                                    </td>
                                    <td class="Product-price">
                                        <p><?= \common\helpers\CollectorHelper::numFormat($item['sum']) ?>
                                            &#8381;</p>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td class="Product-name">
                                    <p>Сумма заказа</p>
                                </td>
                                <td class="total-price">
                                    <p><?= \common\helpers\CollectorHelper::numFormat($cartItems['cartSum']) ?>
                                        &#8381;</p>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="checkout-payment">
                        <div class="single-form">
                            <?= Html::submitButton('Оформить заказ', ['class' => 'btn btn-primary btn-hover-dark d-block w-100']) ?>

                            <div class="checkout-info mt-30">
                                <div class="info-header error">
                                    <strong>Внимание!</strong>
                                    <br>
                                    Заточные устройства выполняются в порядке "живой" очереди, мы свяжемся с Вами и
                                    уточним сроки изготовления.
                                    <br>
                                    Оплата производится при достижении Вашей очереди.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php \yii\widgets\ActiveForm::end() ?>

    </div>
</div>
<!-- Shopping Cart Section End -->
