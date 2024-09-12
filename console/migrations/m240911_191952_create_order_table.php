<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order}}`.
 */
class m240911_191952_create_order_table extends Migration
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

        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer(11)->notNull()->comment('Дата создания'),
            'uin' => $this->integer()->notNull()->comment('Номер заказа'),
            'name' => $this->string(255)->notNull()->comment('Имя'),
            'last_name' => $this->string(255)->notNull()->comment('Фамилия'),
            'phone' => $this->bigInteger(11)->notNull()->comment('Телефон'),
            'email' => $this->string(255)->notNull()->comment('Email'),
            'note' => $this->text()->comment('Примечание к заказу'),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%order}}');
    }
}
