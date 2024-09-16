<?php

use yii\db\Migration;

/**
 * Class m240913_140559_add_patronymic_address_to_order_table
 */
class m240913_140559_add_patronymic_to_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%order}}', 'patronymic', $this->string(255)->notNull()->comment('Отчество'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%order}}', 'patronymic');
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
