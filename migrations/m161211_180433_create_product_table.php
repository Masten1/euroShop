<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product`.
 */
class m161211_180433_create_product_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('product', [
            'id' => $this->primaryKey(),
            'title' => 'varchar(255) not null',
            'url' => 'varchar(255) not null',
            'img' => 'varchar(255) not null',
            'description' => 'text not null',
            'price' => 'money not null',
            'isRecommend' => 'boolean',
            'isInfo' => 'boolean',
            'metaTitle' => 'text',
            'metaDescription' => 'text',
            'metaKeywords' => 'text',
            'category_id' => 'int'
        ]);

        $this->addForeignKey('product_category_id', 'product', 'category_id', 'product', 'id');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('products');
    }
}
