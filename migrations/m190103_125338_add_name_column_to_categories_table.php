<?php

use yii\db\Migration;

/**
 * Handles adding name to table `categories`.
 */
class m190103_125338_add_name_column_to_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('categories', 'name', $this->String(256));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('categories', 'name');
    }
}
