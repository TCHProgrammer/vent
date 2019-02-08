<?php

use yii\db\Migration;

/**
 * Handles the creation of table `works`.
 * Has foreign keys to the tables:
 *
 * - `brands`
 * - `worker_types`
 * - `period`
 * - `report_forms`
 */
class m190114_102952_create_works_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('works', [
            'id' => $this->primaryKey(),
            'name' => $this->string(512),
            'brands_id' => $this->integer()->notNull(),
            'worker_types_id' => $this->integer()->notNull(),
            //'work_types_id' => $this->integer()->notNull(),
            'period_id' => $this->integer()->notNull(),
            'execution_time' => $this->integer(),
            'report_forms_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `brands_id`
        $this->createIndex(
            'idx-works-brands_id',
            'works',
            'brands_id'
        );

        // add foreign key for table `brands`
        $this->addForeignKey(
            'fk-works-brands_id',
            'works',
            'brands_id',
            'brands',
            'id',
            'CASCADE'
        );

        // creates index for column `worker_types_id`
        $this->createIndex(
            'idx-works-worker_types_id',
            'works',
            'worker_types_id'
        );

        // add foreign key for table `worker_types`
        $this->addForeignKey(
            'fk-works-worker_types_id',
            'works',
            'worker_types_id',
            'worker_types',
            'id',
            'CASCADE'
        );

        // creates index for column `period_id`
        $this->createIndex(
            'idx-works-period_id',
            'works',
            'period_id'
        );

        // add foreign key for table `period`
        $this->addForeignKey(
            'fk-works-period_id',
            'works',
            'period_id',
            'period',
            'id',
            'CASCADE'
        );

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

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `brands`
        $this->dropForeignKey(
            'fk-works-brands_id',
            'works'
        );

        // drops index for column `brands_id`
        $this->dropIndex(
            'idx-works-brands_id',
            'works'
        );

        // drops foreign key for table `worker_types`
        $this->dropForeignKey(
            'fk-works-worker_types_id',
            'works'
        );

        // drops index for column `worker_types_id`
        $this->dropIndex(
            'idx-works-worker_types_id',
            'works'
        );

        // drops foreign key for table `period`
        $this->dropForeignKey(
            'fk-works-period_id',
            'works'
        );

        // drops index for column `period_id`
        $this->dropIndex(
            'idx-works-period_id',
            'works'
        );

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

        $this->dropTable('works');
    }
}
