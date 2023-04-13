<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%favorites}}`.
 */
class m230412_071009_create_favorites_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%favorites}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'fruit_id' => $this->integer()->notNull(),
        ]);

        //$this->addForeignKey('fk_favorites_fruit_id', 'favorites', 'fruit_id', 'fruits', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       // $this->dropForeignKey('fk_favorites_fruit_id', 'favorites');

        $this->dropTable('{{%favorites}}');
    }
}
