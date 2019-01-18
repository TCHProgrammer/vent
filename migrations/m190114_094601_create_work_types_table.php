<?php

use yii\db\Migration;

/**
 * Handles the creation of table `work_types`.
 */
class m190114_094601_create_work_types_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('work_types', [
            'id' => $this->primaryKey(),
            'name' => $this->string(256),
            'symbole_code' => $this->string(256),
            'priority' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('work_types');
    }
}
