<?php

use yii\db\Migration;

/**
 * Handles adding work_types_id to table `works`.
 * Has foreign keys to the tables:
 *
 * - `work_types`
 */
class m190115_150604_add_work_types_id_column_to_works_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('works', 'work_types_id', $this->integer());

        // creates index for column `work_types_id`
        $this->createIndex(
            'idx-works-work_types_id',
            'works',
            'work_types_id'
        );

        // add foreign key for table `work_types`
        $this->addForeignKey(
            'fk-works-work_types_id',
            'works',
            'work_types_id',
            'work_types',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `work_types`
        $this->dropForeignKey(
            'fk-works-work_types_id',
            'works'
        );

        // drops index for column `work_types_id`
        $this->dropIndex(
            'idx-works-work_types_id',
            'works'
        );

        $this->dropColumn('works', 'work_types_id');
    }
}
