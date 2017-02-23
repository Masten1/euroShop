<?php

use yii\db\Migration;

/**
 * Handles the creation of table `articles`.
 */
class m170215_095541_create_articles_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('articles', [
            'id' => $this->primaryKey(),
            'url' => 'varchar(255) not null',
            'title' => 'varchar(255) not null',
            'image' => 'varchar(255) not null',
            'shortText' => 'varchar(255) not null',
            'text' => 'text not null',
            'isActive' => 'boolean',
            'metaTitle' => 'text',
            'metaDescription' => 'text',
            'metaKeywords' => 'text'
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('articles');
    }
}
