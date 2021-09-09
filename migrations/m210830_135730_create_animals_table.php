<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%animals}}`.
 */
class m210830_135730_create_animals_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%animals}}', [
            'id' => $this->primaryKey(),
            'title'=> $this->string()->notNull(),
            'age'=> $this->integer()->notNull(),
            'type'=> $this->integer()->notNull(),
            'status'=> $this->boolean()->defaultValue(1),
            'created_dt' => $this->timestamp()->notNull(),
            'updated_dt' => $this->timestamp()->null(),
        ]);

        // creates index for column `type`
        $this->createIndex(
            'idx-animals-type',
            'animals',
            'type'
        );

        // add foreign key for table `animals_types`
        $this->addForeignKey(
            'fk-animals-type',
            'animals',
            'type',
            'animals_types',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `animals_types`
        $this->dropForeignKey(
            'fk-animals-type',
            'animals'
        );

        // drops index for column `type`
        $this->dropIndex(
            'idx-animals-type',
            'animals'
        );

        $this->dropTable('{{%animals}}');
    }
}
