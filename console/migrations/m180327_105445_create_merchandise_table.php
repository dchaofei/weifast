<?php

use yii\db\Migration;

/**
 * Handles the creation of table `merchandise`.
 */
class m180327_105445_create_merchandise_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('merchandise', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->defaultValue( )
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('merchandise');
    }
}
