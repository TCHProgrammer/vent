<?php

use yii\db\Migration;

/**
 * Handles the creation of table `worker_types`.
 */
class m190114_085355_create_worker_types_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('worker_types', [
            'id' => $this->primaryKey(),
            'name' => $this->string(256),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('worker_types');
    }
}
