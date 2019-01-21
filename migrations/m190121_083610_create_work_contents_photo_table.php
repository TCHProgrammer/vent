<?php

use yii\db\Migration;

/**
 * Handles the creation of table `work_contents_photo`.
 * Has foreign keys to the tables:
 *
 * - `work_contents`
 */
class m190121_083610_create_work_contents_photo_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('work_contents_photo', [
            'id' => $this->primaryKey(),
            'work_contents_id' => $this->integer(),
            'file_name' => $this->string(256),
        ]);

        // creates index for column `work_contents_id`
        $this->createIndex(
            'idx-work_contents_photo-work_contents_id',
            'work_contents_photo',
            'work_contents_id'
        );

        // add foreign key for table `work_contents`
        $this->addForeignKey(
            'fk-work_contents_photo-work_contents_id',
            'work_contents_photo',
            'work_contents_id',
            'work_contents',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `work_contents`
        $this->dropForeignKey(
            'fk-work_contents_photo-work_contents_id',
            'work_contents_photo'
        );

        // drops index for column `work_contents_id`
        $this->dropIndex(
            'idx-work_contents_photo-work_contents_id',
            'work_contents_photo'
        );

        $this->dropTable('work_contents_photo');
    }
}
