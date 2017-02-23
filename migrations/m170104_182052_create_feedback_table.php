<?php

use yii\db\Migration;

/**
 * Handles the creation of table `feedback`.
 */
class m170104_182052_create_feedback_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('feedback', [
            'id' => $this->primaryKey(),
            'name' => 'varchar(255) not null',
            'mail' => 'varchar(255) not null',
            'text' => 'text not null'
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('feedback');
    }
}
