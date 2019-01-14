<?php

use yii\db\Migration;

/**
 * Handles adding name to table `brands`.
 */
class m190103_125542_add_name_column_to_brands_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('brands', 'name', $this->String(256));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('brands', 'name');
    }
}
