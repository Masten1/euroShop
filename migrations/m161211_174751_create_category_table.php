<?php

use yii\db\Migration;

/**
 * Handles the creation of table `category`.
 */
class m161211_174751_create_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'url' => 'varchar(255) not null',
            'name' => 'varchar(255) not null',
            'photo' => 'varchar(255) not null'
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('category');
    }
}
