<?php

use yii\db\Migration;

/**
 * Handles adding category_id to table `brands`.
 * Has foreign keys to the tables:
 *
 * - `categories`
 */
class m190103_125725_add_category_id_column_to_brands_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('brands', 'category_id', $this->integer()->notNull());

        // creates index for column `category_id`
        $this->createIndex(
            'idx-brands-category_id',
            'brands',
            'category_id'
        );

        // add foreign key for table `categories`
        $this->addForeignKey(
            'fk-brands-category_id',
            'brands',
            'category_id',
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
            'fk-brands-category_id',
            'brands'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            'idx-brands-category_id',
            'brands'
        );

        $this->dropColumn('brands', 'category_id');
    }
}
