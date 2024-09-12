<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string|null $title Заголовок в окне браузера
 * @property string $name Заголовок в окне браузера
 * @property string|null $url URL
 * @property int|null $is_hidden Скрыть/Показать
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
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
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['is_hidden'], 'integer'],
            [['title', 'name', 'url'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['name'], 'string', 'min' => 3],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts(): \yii\db\ActiveQuery
    {
        return $this->hasMany(Product::class, ['category_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок окна',
            'name' => 'Название',
            'url' => 'Url',
            'is_hidden' => 'Скрыть/показать',
        ];
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
