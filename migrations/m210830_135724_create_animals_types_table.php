<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%animals_types}}`.
 */
class m210830_135724_create_animals_types_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%animals_types}}', [
            'id' => $this->primaryKey(),
            'title'=>$this->string(),
            'created_dt' => $this->timestamp()->notNull(),
            'updated_dt' => $this->timestamp()->null(),
        ]);

        $this->insert('animals_types', [
            'title' => 'Сat',
            'created_dt' => date('Y-m-d H:i:s')
        ]);

        $this->insert('animals_types', [
            'title' => 'Dog',
            'created_dt' => date('Y-m-d H:i:s')
        ]);

        $this->insert('animals_types', [
            'title' => 'Turtle',
            'created_dt' => date('Y-m-d H:i:s')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%animals_types}}');
    }
}
