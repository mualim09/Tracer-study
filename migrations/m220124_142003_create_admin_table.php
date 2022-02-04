<?php

use yii\db\Migration;

/**
 * Handles the creation of table `admin`.
 */
class m220124_142003_create_admin_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('admin', [
            'id' => $this->primaryKey(),
            'nip' => $this->string(20)->notNull(),
            'unit'   => $this->string(20)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('admin');
    }
}
