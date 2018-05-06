<?php

use yii\db\Migration;

/**
 * Handles the creation of table `products`.
 */
class m180506_093211_create_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('products', [
            'id' => $this->primaryKey(),
            'asin' => $this->string()->notNull()->unique(),
            'title' => $this->string(),
            'price' => $this->double(),
            'picture' => $this->string(),
            'ean' => $this->string(),
            'brand' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('products');
    }
}
