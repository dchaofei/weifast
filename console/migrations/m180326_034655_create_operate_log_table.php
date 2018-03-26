<?php

use yii\db\Migration;

/**
 * Handles the creation of table `operate_log`.
 */
class m180326_034655_create_operate_log_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('operate_log', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull()->comment('用户id'),
            'type' => $this->integer()->comment('1.管理员,2.用户'),
            'ip' => $this->string(39)->notNull()->comment('操作ip'),
            'country' => $this->string(64)->comment('地址'),
            'module' => $this->smallInteger()->notNull()->comment('操作项'),
            'target_id' => $this->integer()->comment('目标对象id'),
            'log' => $this->text()->comment('日志'),
            'reason' => $this->string()->comment('备注'),
            'created' => $this->dateTime()->notNull()->defaultExpression('CURRENT_TIMESTAMP')->comment('操作时间'),
        ], MYSQL_CREATE_TABLE_OPTION);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('operate_log');
    }
}
