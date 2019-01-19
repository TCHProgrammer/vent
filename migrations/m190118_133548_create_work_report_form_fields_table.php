<?php

use yii\db\Migration;

/**
 * Handles the creation of table `work_report_form_fields`.
 * Has foreign keys to the tables:
 *
 * - `work_report_forms`
 */
class m190118_133548_create_work_report_form_fields_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('work_report_form_fields', [
            'id' => $this->primaryKey(),
            'work_report_forms_id' => $this->integer(),
            'name' => $this->string(512),
        ]);

        // creates index for column `work_report_forms_id`
        $this->createIndex(
            'idx-work_report_form_fields-work_report_forms_id',
            'work_report_form_fields',
            'work_report_forms_id'
        );

        // add foreign key for table `work_report_forms`
        $this->addForeignKey(
            'fk-work_report_form_fields-work_report_forms_id',
            'work_report_form_fields',
            'work_report_forms_id',
            'work_report_forms',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `work_report_forms`
        $this->dropForeignKey(
            'fk-work_report_form_fields-work_report_forms_id',
            'work_report_form_fields'
        );

        // drops index for column `work_report_forms_id`
        $this->dropIndex(
            'idx-work_report_form_fields-work_report_forms_id',
            'work_report_form_fields'
        );

        $this->dropTable('work_report_form_fields');
    }
}
