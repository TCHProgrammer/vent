<?php

use yii\db\Migration;

/**
 * Handles dropping photo from table `work_contents`.
 */
class m190121_083153_drop_photo_column_from_work_contents_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('work_contents', 'photo');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('work_contents', 'photo', $this->string());
    }
}
