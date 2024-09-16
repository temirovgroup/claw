<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception $exception */

use yii\helpers\Html;

$this->title = $name;
?>

<div class="section section-padding-02 mb-10 pb-10">
    <div class="container">

        <!-- History content End -->
        <div class="history-content text-center mt-10 mb-10 pb-10">

            <div class="section-title-03">
                <h2 class="title"><?= Html::encode($this->title) ?></h2>
            </div>

            <div class="checkout-info mt-30">
                <div class="info-header error">
                    <?= nl2br(Html::encode($message)) ?>
                </div>
            </div>

        </div>
        <!-- History content End -->

    </div>
</div>
