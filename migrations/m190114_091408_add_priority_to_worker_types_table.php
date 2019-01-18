<?php

use yii\db\Migration;

/**
 * Class m190114_091408_add_priority_to_worker_types_table
 */
class m190114_091408_add_priority_to_worker_types_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190114_091408_add_priority_to_worker_types_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190114_091408_add_priority_to_worker_types_table cannot be reverted.\n";

        return false;
    }
    */
}
