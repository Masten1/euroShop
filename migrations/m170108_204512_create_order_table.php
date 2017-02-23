<?php

use yii\db\Migration;

/**
 * Handles the creation of table `order`.
 */
class m170108_204512_create_order_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('order', [
            'id' => $this->primaryKey(),
            'name' => 'varchar(255) not null',
            'phone' => 'int not null',
            'mail' => 'varchar(255) not null',
            'text' => 'text',
            'countProduct' => 'int not null',
            'totalPrice' => 'int',
            'productId' => 'int not null',
            'productName' => 'varchar(255) not null'
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('order');
    }
}
