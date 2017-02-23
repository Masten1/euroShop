<?php

use yii\db\Migration;

/**
 * Handles the creation of table `offers`.
 */
class m170219_104131_create_offers_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('offers', [
            'id' => $this->primaryKey(),
            'url' => 'varchar(255) not null',
            'image' => 'varchar(255) not null',
            'dateToEnd' => 'varchar(255) not null'
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('offers');
    }
}
