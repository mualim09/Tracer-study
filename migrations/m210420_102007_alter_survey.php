<?php

use yii\db\Migration;

class m210420_102007_alter_survey extends Migration
{
    public function up()
    {
          $this->addColumn('tb_tracer_study','jenis',$this->string(20)->notNull()->defaultValue('Tracer Study'));
          $this->addColumn('tb_tracer_study','nama_perusahaan',$this->text());
          $this->addColumn('tb_tracer_study','jenis_perusahaan',$this->string(20));
  

    }

    public function down()
    {
        echo "m210420_102007_alter_survey cannot be reverted.\n";

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
