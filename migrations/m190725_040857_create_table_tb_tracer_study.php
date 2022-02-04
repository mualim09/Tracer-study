<?php

use yii\db\Migration;

class m190725_040857_create_table_tb_tracer_study extends Migration
{
    public function up()
    {
        $this->createTable('tb_pertanyaan', [
            'id' => $this->primaryKey(),
            'pertanyaan' => $this->string(100)->notNull(),
            'jenis' => $this->text()->notNull(),


        ]);
        $this->createTable('tb_jawaban', [
            'id' => $this->primaryKey(),
            'id_pertanyaan' => $this->integer()->notNull(),
            'jawaban' => $this->string(100)->notNull(),


        ]);

        $this->createTable('tb_tracer_study', [
            'id' => $this->primaryKey(),
            'nama' => $this->string(100)->notNull(),
            'alamat' => $this->text()->notNull(),
            'no_telepon' => $this->string(20)->notNull(),
            'email' => $this->string(100)->notNull(),
            'fakultas' => $this->string(100)->notNull(),
            'jurusan' => $this->string(100)->notNull(),



        ]);
        $this->createTable('tb_d_tracer_study', [
            'id' => $this->primaryKey(),
            'id_tracer' => $this->integer()->notNull(),
            'id_pertanyaan' => $this->integer(),
            'jawaban' => $this->string(),


        ]);
    }

    public function down()
    {
        $this->dropTable('tb_tracer_study');
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
