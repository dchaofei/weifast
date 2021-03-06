<?php

use yii\db\Migration;

/**
 * Handles the creation of table `shipping_address`.
 */
class m180325_092151_create_shipping_address_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('shipping_address', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull()->comment('微商 id'),
            'name' => $this->string()->notNull()->comment('姓名'),
            'phone' => $this->integer()->notNull()->comment('手机号'),
            'address' => $this->string()->notNull()->comment('详细地址'),
            'comment' => $this->string()->comment('备注'),
            'status' => $this->integer()->defaultValue(0)->comment('状态：0未发货,1已发货,2已完成'),
            'express_number' => $this->bigInteger()->comment('快递单号'),
            'express_company' => $this->string()->defaultValue('0')->comment('快递公司名'),
            'created' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP')->comment('创建时间'),
            'updated' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')->comment('更新时间'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('shipping_address');
    }
}
