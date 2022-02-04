<?php

use yii\db\Migration;

class m210420_100012_alter_det_pertanyaan extends Migration
{
    public function up()
    {
        $this->addColumn('tb_jawaban','nilai',$this->text()->notNull());
        $this->execute("update tb_jawaban set nilai=jawaban");

    }

    public function down()
    {
        echo "m210420_100012_alter_det_pertanyaan cannot be reverted.\n";

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
