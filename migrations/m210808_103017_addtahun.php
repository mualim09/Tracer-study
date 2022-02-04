<?php

use yii\db\Migration;

class m210808_103017_addtahun extends Migration
{
    public function up()
    {
        $this->addColumn('tb_tracer_study', 'tahun_lulus', 'integer');

    }

    public function down()
    {
        echo "m210808_103017_addtahun cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
