<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order_item}}`.
 */
class m240912_122055_create_order_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order_item}}', [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer(11)->notNull()->comment('ID заказа'),
            'product_id' => $this->integer(11)->notNull()->comment('ID товара'),
            'count' => $this->integer(11)->notNull()->comment('Кол-во'),
            'sum' => $this->integer(11)->notNull()->comment('Сумма'),
        ]);

        $this->addForeignKey('fk_order_item_order_id', '{{%order_item}}', 'order_id', '{{%order}}', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%order_item}}');
    }
}
