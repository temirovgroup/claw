<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m240909_194438_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci';
        }

        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(11)->notNull()->comment('ID категории'),
            'title' => $this->string(255)->comment('Заголовок в окне браузера'),
            'name' => $this->string(255)->notNull()->unique()->comment('Название товара'),
            'slide_text' => $this->string(255)->comment('Краткое описание для слайдера'),
            'is_slide' => $this->tinyInteger(1)->defaultValue(0)->comment('Отображать на слайдере (главная)'),
            'description_excerpt' => $this->string(255)->notNull()->comment('Краткое описание'),
            'description' => $this->text()->comment('Полное описание'),
            'info' => $this->text()->comment('Информация'),
            'price' => $this->integer(11)->notNull()->comment('Цена'),
            'old_price' => $this->integer(11)->defaultValue(0)->comment('Цена'),
            'is_hidden' => $this->tinyInteger(1)->defaultValue(1)->comment('Скрыть/Показать'),
            'meta_description' => $this->string(255)->comment('Мета-описание'),
            'meta_keywords' => $this->string(255)->comment('Ключевые слова'),
            'url' => $this->string(255)->comment('URL'),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product}}');
    }
}
