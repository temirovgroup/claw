<?php
/**
 * Created by PhpStorm.
 */

use yii\helpers\Html;
use yii\helpers\Url;

/** @var int $uin */

$this->title = "Ваш заказ №{$uin} принят!";
?>

<div class="section section-padding-02 mb-10 pb-10">
    <div class="container">

        <!-- History content End -->
        <div class="history-content text-center mt-10 mb-10 pb-10">

            <div class="section-title-03">
                <h6 class="sub-title">Ваша заявка №<?= $uin ?> принята!</h6>
                <h2 class="title">Мы свяжемся с Вами в ближайшее время!</h2>
            </div>

            <div class="checkout-info mt-30">
                <div class="info-header error">
                    <i class="fa fa-exclamation-circle"></i>
                    <strong>Внимание!</strong>
                    <br>
                    Заточные устройства выполняются в порядке "живой" очереди, мы свяжемся с Вами и
                    уточним сроки изготовления.
                    <br>
                    Оплата производится при достижении Вашей очереди.
                </div>
            </div>

        </div>
        <!-- History content End -->

    </div>
</div>
