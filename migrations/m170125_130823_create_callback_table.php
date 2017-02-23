<?php

use yii\db\Migration;

/**
 * Handles the creation of table `callback`.
 */
class m170125_130823_create_callback_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('callback', [
            'id' => $this->primaryKey(),
            'phone' => 'int not null',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('callback');
    }
}
