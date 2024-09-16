<?php

use vova07\imperavi\Widget;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Product $model */
/** @var yii\widgets\ActiveForm $form */
/** @var $categories \common\models\Category */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="image-upload">
        <p class="text text-info">Выберите одно или несколько изображений и нажмите "сохранить"</p>
        <label type="button" class="btn btn-primary" for="product-images">
            <?= $form->field($model, 'images[]')->fileInput(['multiple' => true, 'accept' => 'image/*', 'class' => 'hidden'])->label('Выбрать') ?>
        </label>

        <p class="text text-danger">Кликните по изображению чтобы удалить!</p>
        <div class="product-images product-images-js">
            <?php foreach (\common\helpers\ImageHelper::getImages($model, 'x100', true) as $image) : ?>
                <?= Html::img($image['url'], [
                    'class' => 'btn',
                    'data-product-id' => $model->id,
                    'data-image-id' => $image['id'],
                ]) ?>
            <?php endforeach; ?>
        </div>
        <hr>
    </div>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category_id')->dropDownList(\yii\helpers\ArrayHelper::map($categories, 'id', 'name')) ?>

    <div class="alert alert-info">
        <p class="text text-warning">Заполните данные если товар необходимо отображать на слайдере (главная)</p>

        <?= $form->field($model, 'slide_image')->fileInput() ?>

        <?= Html::img(\common\helpers\ImageHelper::getSlideImageUrl($model), ['height' => 150]) ?>

        <?= $form->field($model, 'slide_text')->textarea(['maxlength' => true, 'rows' => 4]) ?>

        <?= $form->field($model, 'is_slide')->dropDownList([0 => 'Нет', 1 => 'Да']) ?>
    </div>

    <?= $form->field($model, 'description_excerpt')->textarea(['maxlength' => true, 'rows' => 4]) ?>

    <?= $form->field($model, 'description')->widget(Widget::class, [
        'settings' => [
            'lang' => 'ru',
            'minHeight' => 200,
            'imageUpload' => Url::to(['product/image-upload']),
            'imageManagerJson' => Url::to(['product/images-get']),
            'imageDelete' => Url::to(['product/file-delete']),
            'plugins' => [
                'imagemanager',
                'video',
            ],
        ],
    ]) ?>

    <?= $form->field($model, 'info')->widget(Widget::class, [
        'settings' => [
            'lang' => 'ru',
            'minHeight' => 200,
            'imageUpload' => Url::to(['product/image-upload']),
            'imageManagerJson' => Url::to(['product/images-get']),
            'imageDelete' => Url::to(['product/file-delete']),
            'plugins' => [
                'imagemanager',
                'video',
            ],
        ],
    ]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'old_price')->textInput() ?>

    <?= $form->field($model, 'meta_description')->textarea(['maxlength' => true, 'rows' => 4]) ?>

    <?= $form->field($model, 'meta_keywords')->textarea(['maxlength' => true, 'rows' => 4]) ?>

    <?= $form->field($model, 'is_hidden')->dropDownList([0 => 'Скрыт', 1 => 'Показать']) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
