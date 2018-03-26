<?php

use yii\db\Migration;

/**
 * Handles the creation of table `Login_log`.
 */
class m180326_033015_create_login_log_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('login_log', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull()->comment('用户或管理员id'),
            'role_id' => $this->integer()->defaultValue(0)->comment('用户组'),
            'type' => $this->integer()->comment('1.管理员,2.用户'),
            'ip' => $this->string(39)->notNull()->comment('登录ip'),
            'address' => $this->string(64)->comment('地址'),
            'created' => $this->dateTime()->notNull()->defaultExpression('CURRENT_TIMESTAMP')->comment('登录时间'),
            'duration' => $this->integer()->comment('保持时间'),
        ], MYSQL_CREATE_TABLE_OPTION);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('login_log');
    }
}
