<?php

use yii\db\Migration;

/**
 * Handles the creation of table `period`.
 */
class m190114_095652_create_period_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('period', [
            'id' => $this->primaryKey(),
            'name' => $this->string(256),
            'symbole_code' => $this->string(32),
            'priority' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('period');
    }
}
