<?php

use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var \common\models\Category[]|\yii\db\ActiveRecord $categories */
/** @var \common\models\Product[]|\yii\db\ActiveRecord $slideProducts */
?>


<!-- Slider Section Start -->
<div class="section slider-section">

    <div class="slider-shape"></div>

    <div class="container">
        <div class="slider-active">
            <div class="swiper-container">
                <div class="swiper-wrapper">

                    <?php foreach ($slideProducts as $slideProduct) : ?>
                        <!-- Single Slider Start  -->
                        <div class="single-slider swiper-slide animation-style-01">

                            <!-- Slider Content Start -->
                            <div class="slider-content">
                                <h2 class="title">
                                    <?= $slideProduct->getName() ?>
                                </h2>
                                <p>
                                    <?= $slideProduct->getSlideText() ?>
                                </p>
                                <a href="<?= $slideProduct->getUrlTo() ?>" class="btn btn-primary btn-hover-dark">
                                    Хочу!
                                </a>
                            </div>
                            <!-- Slider Content End -->

                            <!-- Slider images Start -->
                            <div class="slider-images">
                                <?= \yii\helpers\Html::img(\common\helpers\ImageHelper::getSlideImageUrl($slideProduct), ['alt' => $slideProduct->getName()]) ?>
                            </div>
                            <!-- Slider images End -->

                        </div>
                        <!-- Single Slider End  -->
                    <?php endforeach; ?>

                </div>

                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</div>
<!-- Slider Section End -->


<?php if (!empty($categories)) : ?>
    <div class="section section-padding-02 mt-n2">
        <div class="container">

            <!-- Section Title Start -->
            <div class="section-title-02 text-center">
                <h1 class="title">Наша продукция</h1>
            </div>
            <!-- Section Title End -->

            <!-- Product Wrapper 02 Start -->
            <div class="product-wrapper-02">

                <!-- Product Menu Start -->
                <div class="product-menu">
                    <ul class="nav justify-content-center">
                        <?php foreach ($categories as $key => $category) : ?>
                            <li>
                                <button data-bs-toggle="tab" data-bs-target="#tab<?= $key ?>"
                                        class="<?= $key === 0 ? 'active' : '' ?>">
                                    # <?= $category->getName() ?>
                                </button>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <!-- Product Menu End -->

                <!-- Product Tabs Content Start -->
                <div class="product-tabs-content">
                    <div class="tab-content">
                        <?php foreach ($categories as $key => $category) : ?>
                            <div class="tab-pane fade <?= $key === 0 ? 'active show' : '' ?>" id="tab<?= $key ?>">
                                <div class="row">
                                    <?php foreach ($category->products as $product) : ?>
                                        <div class="col-lg-6 col-sm-6">
                                            <?= \frontend\components\product\ProductBlockWidget::widget(['product' => $product]) ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <!-- Product Tabs Content End -->

            </div>
            <!-- Product Wrapper 02 End -->


        </div>
    </div>
<?php endif; ?>

<div class="section section-padding-02 mt-n2">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <!-- Section Title Start -->
                <div class="section-title-02 text-center">
                    <h2 class="title">Почему CLAW ELEMENT?</h2>
                </div>
                <!-- Section Title End -->

                <div class="blog-details-wrapper">
                    <h3 class="title">
                        Заточка ножа на устройстве с постоянным углом предлагает несколько преимуществ:
                    </h3>

                    <br>
                    <br>
                    <ol class="list-group list-group-flush">
                        <li class="list-group-item">
                            1. Постоянный угол заточки: Обеспечивает равномерную и точную заточку, что приводит к более
                            острому и эффективному лезвию.
                        </li>
                        <li class="list-group-item">
                            2. Простота использования: Даже неопытные пользователи могут легко затачивать ножи, следуя
                            инструкции.
                        </li>
                        <li class="list-group-item">
                            3. Контроль над процессом: Возможность точно регулировать угол заточки и количество
                            проходов.
                        </li>
                        <li class="list-group-item">
                            4. Безопасность: Устройство обеспечивает безопасную и удобную работу с ножами.
                        </li>
                    </ol>

                    <blockquote class="blockquote">
                        <p>В итоге, использование заточника с постоянным углом обеспечивает более предсказуемый
                            результат и позволяет добиться максимальной остроты лезвия.</p>
                    </blockquote>

                    <hr>

                    <div class="d-flex flex-wrap justify-content-center">
                        <div class="col-md-6 col-sm-8 col-xs-12">
                            <div class="embed-responsive embed-responsive-16by9 video-index">
                                <iframe class="embed-responsive-item"
                                        src="https://www.youtube.com/embed/YwVwnwBCwh4?si=vHugyhggYAWGOGIy"
                                        allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <h3 class="title">
                        Заточка ножа на устройстве с постоянным углом предлагает несколько преимуществ:
                    </h3>

                    <br>
                    <br>

                    <div>
                        Точилка для ножей Элемент, с постоянным углом заточки. Постоянный угол заточки это, если вы
                        поставили 15 градусов на сторону, то у вас и на кончике и в начале будет 15 градусов. Если есть
                        рекурва, то и в любом месте рекурвы будет 15 градусов. Любой градус от 10 до 30 на сторону
                        ставите и имеете ровный подвод, независимо как зажат нож и какую он форму имеет.
                        <br>
                        <br>
                        <strong>Но и это еще не всё!</strong>
                        Камни (даже одного сета) имеют разную толщину. В стандартных точилках необходимо при смене
                        камня корректировать угол, а так же точить с повышением угла, чтоб точно выйти на РК. У Элемента
                        таких проблем нет! Любой толщины камень ставьте и скользящий узел сам скорректирует всё за вас.
                        <br>
                        <br>
                        Заточное устройство сделано из: Корпус пластик PETG, зажимы и рама Д16Т, стальные калиброванные
                        высокоточные валы 8 мм. Фирменные подшипники (фабричный Китай, который прошел отбраковку.
                        Точность высокая)
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<!-- Benefit Section Start -->
<div class="section section-padding mt-n6">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">

                <!-- Single Benefit Start -->
                <div class="single-benefit">
                    <img src="/front/images/icon/icon-1.png" alt="Icon">
                    <h3 class="title">Доставка по <br> всей России</h3>
                    <p>Отправка в любой регион России и другие страны.</p>
                </div>
                <!-- Single Benefit End -->

            </div>
            <div class="col-lg-4 col-md-6">

                <!-- Single Benefit Start -->
                <div class="single-benefit">
                    <img src="/front/images/icon/icon-2.png" alt="Icon">
                    <h3 class="title">Оплата <br> заказа</h3>
                    <p>Вы оплачиваете ваш заказ в день изготовления Вашего заказа.</p>
                </div>
                <!-- Single Benefit End -->

            </div>
            <div class="col-lg-4 col-md-6">

                <!-- Single Benefit Start -->
                <div class="single-benefit">
                    <img src="/front/images/icon/icon-3.png" alt="Icon">
                    <h3 class="title">Вопросы <br> и ответы</h3>
                    <p>У нас есть канал на <a
                                href="https://www.youtube.com/channel/UCbbbubsLUf3mjiEWTlui8Dg" target="_blank"><u>YouTube</u></a>
                        и сообщество
                        в <a href="https://vk.com/claw_grinder" target="_blank"><u>VK</u></a>.</p>
                </div>
                <!-- Single Benefit End -->

            </div>
        </div>
    </div>
</div>
<!-- Benefit Section End -->
