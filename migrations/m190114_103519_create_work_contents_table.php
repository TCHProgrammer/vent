<?php

use yii\db\Migration;

/**
 * Handles the creation of table `work_contents`.
 * Has foreign keys to the tables:
 *
 * - `works`
 */
class m190114_103519_create_work_contents_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('work_contents', [
            'id' => $this->primaryKey(),
            'name' => $this->string(512),
            'description' => $this->text(),
            'works_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `works_id`
        $this->createIndex(
            'idx-work_contents-works_id',
            'work_contents',
            'works_id'
        );

        // add foreign key for table `works`
        $this->addForeignKey(
            'fk-work_contents-works_id',
            'work_contents',
            'works_id',
            'works',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `works`
        $this->dropForeignKey(
            'fk-work_contents-works_id',
            'work_contents'
        );

        // drops index for column `works_id`
        $this->dropIndex(
            'idx-work_contents-works_id',
            'work_contents'
        );

        $this->dropTable('work_contents');
    }
}
