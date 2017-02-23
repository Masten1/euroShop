<?php

use yii\db\Migration;

/**
 * Handles the creation of table `whywe`.
 */
class m161213_212522_create_whyWe_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('whywe', [
            'id' => $this->primaryKey(),
            'title' => 'string NOT NULL',
            'text' => 'text',
            'icon' => 'string NOT NULL'
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('whywe');
    }
}
