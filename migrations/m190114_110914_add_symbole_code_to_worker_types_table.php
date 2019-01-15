<?php

use yii\db\Migration;

/**
 * Class m190114_110914_add_symbole_code_to_worker_types_table
 */
class m190114_110914_add_symbole_code_to_worker_types_table extends Migration
{
    /**
     * @return bool|void
     */
    public function safeUp()
    {
        $this->addColumn('worker_types', 'symbole_code', $this->String(64));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //$this->dropColumn('worker_types', 'symbole_code');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190114_110914_add_symbole_code_to_worker_types_table cannot be reverted.\n";

        return false;
    }
    */
}
