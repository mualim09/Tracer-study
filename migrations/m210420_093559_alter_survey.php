<?php

use yii\db\Migration;

class m210420_093559_alter_survey extends Migration
{
    public function up()
    {
      $this->addColumn('tb_pertanyaan','peruntukan',$this->string(20)->notNull()->defaultValue('Tracer Study'));
      $this->addColumn('tb_pertanyaan','status',$this->integer()->notNull()->defaultValue('1'));
      

    }

    public function down()
    {
        echo "m210420_093559_alter_survey cannot be reverted.\n";

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
