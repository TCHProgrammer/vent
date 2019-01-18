<?php

use yii\db\Migration;

/**
 * Handles the creation of table `work_report_forms`.
 * Has foreign keys to the tables:
 *
 * - `works`
 * - `report_forms`
 */
class m190118_123050_create_work_report_forms_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('work_report_forms', [
            'id' => $this->primaryKey(),
            'works_id' => $this->integer(),
            'report_forms_id' => $this->integer(),
        ]);

        // creates index for column `works_id`
        $this->createIndex(
            'idx-work_report_forms-works_id',
            'work_report_forms',
            'works_id'
        );

        // add foreign key for table `works`
        $this->addForeignKey(
            'fk-work_report_forms-works_id',
            'work_report_forms',
            'works_id',
            'works',
            'id',
            'CASCADE'
        );

        // creates index for column `report_forms_id`
        $this->createIndex(
            'idx-work_report_forms-report_forms_id',
            'work_report_forms',
            'report_forms_id'
        );

        // add foreign key for table `report_forms`
        $this->addForeignKey(
            'fk-work_report_forms-report_forms_id',
            'work_report_forms',
            'report_forms_id',
            'report_forms',
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
            'fk-work_report_forms-works_id',
            'work_report_forms'
        );

        // drops index for column `works_id`
        $this->dropIndex(
            'idx-work_report_forms-works_id',
            'work_report_forms'
        );

        // drops foreign key for table `report_forms`
        $this->dropForeignKey(
            'fk-work_report_forms-report_forms_id',
            'work_report_forms'
        );

        // drops index for column `report_forms_id`
        $this->dropIndex(
            'idx-work_report_forms-report_forms_id',
            'work_report_forms'
        );

        $this->dropTable('work_report_forms');
    }
}
