<?php

use yii\db\Migration;

/**
 * Handles dropping report_forms_id from table `works`.
 * Has foreign keys to the tables:
 *
 * - `report_forms`
 */
class m190118_125726_drop_report_forms_id_column_from_works_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // drops foreign key for table `report_forms`
        $this->dropForeignKey(
            'fk-works-report_forms_id',
            'works'
        );

        // drops index for column `report_forms_id`
        $this->dropIndex(
            'idx-works-report_forms_id',
            'works'
        );

        $this->dropColumn('works', 'report_forms_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('works', 'report_forms_id', $this->integer());

        // creates index for column `report_forms_id`
        $this->createIndex(
            'idx-works-report_forms_id',
            'works',
            'report_forms_id'
        );

        // add foreign key for table `report_forms`
        $this->addForeignKey(
            'fk-works-report_forms_id',
            'works',
            'report_forms_id',
            'report_forms',
            'id',
            'CASCADE'
        );
    }
}
