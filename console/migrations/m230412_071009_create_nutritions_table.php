<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%nutritions}}`.
 */
class m230412_071009_create_nutritions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%nutritions}}', [
            'id' => $this->primaryKey(),
            'calories' => $this->float(),
            'fat' => $this->float(),
            'sugar' => $this->float(),
            'carbohydrates' => $this->float(),
            'protein' => $this->float(),
            'fruit_id' => $this->integer()->notNull(),
        ]);

        //$this->addForeignKey('fk_nutritions_fruit_id', 'nutritions', 'fruit_id', 'fruits', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       // $this->dropForeignKey('fk_nutritions_fruit_id', 'nutritions');

        $this->dropTable('{{%nutritions}}');
    }
}
