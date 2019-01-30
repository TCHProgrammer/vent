<?php

use yii\db\Migration;

/**
 * Handles adding full_name to table `user`.
 */
class m190130_141854_add_full_name_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'full_name', $this->string(256));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user', 'full_name');
    }
}
