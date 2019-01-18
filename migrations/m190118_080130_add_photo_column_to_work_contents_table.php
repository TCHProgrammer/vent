<?php

use yii\db\Migration;

/**
 * Handles adding photo to table `work_contents`.
 */
class m190118_080130_add_photo_column_to_work_contents_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('work_contents', 'photo', $this->string(64));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('work_contents', 'photo');
    }
}
