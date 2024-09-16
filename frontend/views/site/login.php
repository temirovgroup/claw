<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="section section-padding-02 mb-10 pb-10">
    <div class="container">

        <!-- History content End -->
        <div class="history-content text-center mt-10 mb-10 pb-10">

            <div class="section-title-03">
                <h6 class="sub-title">Авторизация</h6>
                <h2 class="title">Введите логин и пароль</h2>
            </div>

            <div class="checkout-info mt-30">
                <div class="info-header d-flex flex-wrap justify-content-center">

                    <div class="col-lg-5 cart-form single-form">
                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>

                    <!--<div class="my-1 mx-0" style="color:#999;">
                        If you forgot your password you can <?php /*= Html::a('reset it', ['site/request-password-reset']) */?>.
                        <br>
                        Need new verification email? <?php /*= Html::a('Resend', ['site/resend-verification-email']) */?>
                    </div>-->

                    <div class="form-group">
                        <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
                </div>
            </div>

        </div>
        <!-- History content End -->

    </div>
</div>
