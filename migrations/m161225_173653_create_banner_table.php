<?php

use yii\db\Migration;

/**
 * Handles the creation of table `banner`.
 */
class m161225_173653_create_banner_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('banner', [
            'id' => $this->primaryKey(),
            'title' => 'varchar(255) not null',
            'subTitle' => 'varchar(255) not null',
            'image' => 'varchar(255) null',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('banner');
    }
}
