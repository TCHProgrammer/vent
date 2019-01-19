<?php

use yii\db\Migration;

/**
 * Class m190114_111010_add_priority_to_worker_types_table
 */
class m190114_111010_add_priority_to_worker_types_table extends Migration
{
    /**
     * @return bool|void
     */
    public function safeUp()
    {
        $this->addColumn('worker_types', 'priority', $this->Integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //$this->dropColumn('worker_types', 'priority');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190114_111010_add_priority_to_worker_types_table cannot be reverted.\n";

        return false;
    }
    */
}
