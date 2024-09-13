<?php

use yii\db\Migration;

/**
 * Class m240913_140559_add_patronymic_address_to_order_table
 */
class m240913_140559_add_patronymic_address_to_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%order}}', 'patronymic', $this->string(255)->notNull()->comment('Отчество'));
        $this->addColumn('{{%order}}', 'address', $this->string(255)->notNull()->comment('Адрес с индексом'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%order}}', 'patronymic');
        $this->dropColumn('{{%order}}', 'address');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240913_140559_add_patronymic_address_to_order_table cannot be reverted.\n";

        return false;
    }
    */
}
