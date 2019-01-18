<?php

use yii\db\Migration;

/**
 * Handles the creation of table `report_forms`.
 */
class m190114_101543_create_report_forms_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('report_forms', [
            'id' => $this->primaryKey(),
            'name' => $this->string(512),
            'symbole_code' => $this->string(256),
            'priority' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('report_forms');
    }
}
