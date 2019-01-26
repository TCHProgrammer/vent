<?php

use yii\db\Migration;

/**
 * Handles adding total_composition_description to table `works`.
 */
class m190125_131010_add_total_composition_description_column_to_works_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('works', 'total_composition_description', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('works', 'total_composition_description');
    }
}
