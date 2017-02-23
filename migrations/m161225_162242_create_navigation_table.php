<?php

use yii\db\Migration;

/**
 * Handles the creation of table `navigation`.
 */
class m161225_162242_create_navigation_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('navigation', [
            'id' => $this->primaryKey(),
            'url' => 'varchar(255) not null',
            'title' => 'varchar(255) not null',
            'icon' => 'varchar(255) not null',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('navigation');
    }
}
