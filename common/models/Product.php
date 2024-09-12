<?php

namespace common\models;

use common\helpers\CollectorHelper;
use Yii;
use yii\helpers\Html;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $category_id ID категории
 * @property string|null $title Заголовок в окне браузера
 * @property string $name Название товара
 * @property string $slide_text Краткое описание для слайдера
 * @property int|null $is_slide Отображать на слайдере (главная)
 * @property string $description_excerpt Краткое описание
 * @property string|null $description Полное описание
 * @property string|null $info Информация
 * @property int $price Цена
 * @property int|null $old_price Цена
 * @property int|null $is_hidden Скрыть/Показать
 * @property string|null $meta_description Мета-описание
 * @property string|null $meta_keywords Ключевые слова
 * @property string|null $url URL
 */
class Product extends \yii\db\ActiveRecord
{
    const SLIDE_ACTIVE = 1;
    const SLIDE_INACTIVE = 0;

    const IS_ACTIVE = 1;
    const IS_NOT_ACTIVE = 0;

    public $images;
    public $slide_image;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @return array[]
     */
    public function behaviors()
    {
        return [
            'slug' => [
                'class' => 'skeeks\yii2\yaslug\YaSlugBehavior',
                'slugAttribute' => 'url',                      //The attribute to be generated
                'attribute' => 'name',                          //The attribute from which will be generated
                // optional params
                'maxLength' => 64,                              //Maximum length of attribute slug
                'minLength' => 3,                               //Min length of attribute slug
                'ensureUnique' => true,
            ],
            'image' => [
                'class' => 'alex290\yii2images\behaviors\ImageBehave',
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description_excerpt', 'price'], 'required'],
            [['category_id', 'is_slide', 'price', 'old_price', 'is_hidden'], 'integer'],
            [['description', 'info'], 'string'],
            [['title', 'name', 'slide_text', 'description_excerpt', 'url', 'meta_description', 'meta_keywords'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['name'], 'string', 'min' => 3],
            [['images'], 'file', 'extensions' => 'jpg, jpeg, png, jfif', 'mimeTypes' => 'image/jpeg, image/png, image/gif', 'maxFiles' => 20],
            [['slide_image'], 'file', 'extensions' => 'jpg, jpeg, png, jfif', 'mimeTypes' => 'image/jpeg, image/png, image/gif'],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory(): \yii\db\ActiveQuery
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'ID категории',
            'title' => 'Заголовок в окне',
            'name' => 'Название',
            'slide_text' => 'Текст на слайде (главная)',
            'is_slide' => 'Отображать на слайде (главная)',
            'description_excerpt' => 'Краткое описание',
            'description' => 'Описание',
            'info' => 'Информация',
            'price' => 'Цена',
            'old_price' => 'Прежняя цена',
            'is_hidden' => 'Скрыть/показать',
            'meta_description' => 'Мета-описание',
            'meta_keywords' => 'Ключевые слова',
            'url' => 'Url',
            'images' => 'Изображения',
            'slide_image' => 'Изображения для слайда (главная)',
        ];
    }

    /**
     * @return true
     */
    public function uploadSlideImage(): bool
    {
        $images = $this->getImages();

        foreach ($images as $image) {
            if ($image->isMain) {
                $this->removeImage($image);
            }
        }

        // Название загружаемого файла
        $imageFile = $this->slide_image->baseName . '.' . $this->slide_image->extension;

        // Путь файла и сохранение
        $path = "images/uploads/{$imageFile}";
        $this->slide_image->saveAs($path);

        // Сохраняем изображение полученное после обработки
        $this->attachImage($path, true);

        // Удаляем TMP
        @unlink($path);

        return true;
    }

    /**
     * @param bool $isMain
     * @return bool
     */
    public function upload(bool $isMain = false): bool
    {
        // Название загружаемого файла
        $imageFile = $this->image->baseName . '.' . $this->image->extension;

        // Путь файла и сохранение
        $path = "images/uploads/{$imageFile}";
        $this->image->saveAs($path);

        // Сохраняем изображение полученное после обработки
        $this->attachImage($path, $isMain);

        // Удаляем TMP
        @unlink($path);

        return true;
    }

    /**
     * @return true
     * @throws \yii\base\Exception
     */
    public function uploads(): bool
    {
        foreach ($this->images as $file) {
            // Путь и название загружаемого файла
            $path = Yii::getAlias("@webroot") . "/images/uploads/" . Yii::$app->security->generateRandomString(10) . '.' . $file->extension;

            // Загружаем картинку
            $file->saveAs($path);

            // Сохраняем изображение полученное после обработки
            $this->attachImage($path, false);

            // Удаляем TMP
            @unlink($path);
        }

        return true;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return Html::encode($this->title);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getSlideText(): string
    {
        return Html::encode($this->slide_text);
    }

    /**
     * @return string|null
     */
    public function getInfo(): ?string
    {
        return $this->info;
    }

    /**
     * @return string
     */
    public function getDescriptionExcerpt(): string
    {
        return Html::encode($this->description_excerpt);
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getPrice(): string
    {
        return CollectorHelper::numFormat($this->price);
    }

    /**
     * @return string
     */
    public function getOldPrice(): string
    {
        return CollectorHelper::numFormat($this->old_price);
    }

    /**
     * @return string
     */
    public function getUrlTo(): string
    {
        return \yii\helpers\Url::to(['site/product', 'category_url' => $this->category->url, 'product_url' => $this->url]);
    }

    /**
     * @return string
     */
    public function getMetaDescription(): string
    {
        return Html::encode($this->meta_description);
    }

    /**
     * @return string
     */
    public function getMetaKeywords(): string
    {
        return Html::encode($this->meta_keywords);
    }
}
