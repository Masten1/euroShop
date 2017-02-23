<?php

use yii\db\Migration;

/**
 * Handles the creation of table `staticpages`.
 */
class m170218_120341_create_staticpages_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('staticpages', [
            'id' => $this->primaryKey(),
            'url' => 'varchar(255) not null',
            'title' => 'varchar(255) not null',
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
        $this->dropTable('staticpages');
    }
}
