<?php

use yii\db\Migration;

/**
 * Handles adding parent_id to table `categories`.
 * Has foreign keys to the tables:
 *
 * - `categories`
 */
class m190213_073944_add_parent_id_column_to_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('categories', 'parent_id', $this->integer());

        // creates index for column `parent_id`
        $this->createIndex(
            'idx-categories-parent_id',
            'categories',
            'parent_id'
        );

        // add foreign key for table `categories`
        $this->addForeignKey(
            'fk-categories-parent_id',
            'categories',
            'parent_id',
            'categories',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `categories`
        $this->dropForeignKey(
            'fk-categories-parent_id',
            'categories'
        );

        // drops index for column `parent_id`
        $this->dropIndex(
            'idx-categories-parent_id',
            'categories'
        );

        $this->dropColumn('categories', 'parent_id');
    }
}
