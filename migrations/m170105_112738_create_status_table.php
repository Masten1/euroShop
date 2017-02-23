<?php

use yii\db\Migration;

/**
 * Handles the creation of table `status`.
 */
class m170105_112738_create_status_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('status', [
            'id' => $this->primaryKey(),
            'name' => 'varchar(255) not null'
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('status');
    }
}
