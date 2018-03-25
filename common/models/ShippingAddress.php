<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "shipping_address".
 *
 * @property int $id
 * @property int $user_id 微商 id
 * @property string $name 姓名
 * @property int $phone 手机号
 * @property string $address 详细地址
 * @property string $comment 备注
 * @property int $status 状态：0未发货,1已发货,2已完成
 * @property int $express_number 快递单号
 * @property string $express_company 快递公司名
 * @property string $created 创建时间
 * @property string $updated 更新时间
 */
class ShippingAddress extends \yii\db\ActiveRecord
{
    const STATUS_UNSHIPPED = 0;
    const STATUS_SHIPMENTS = 1;
    const STATUS_FINISH = 2;

    public static $status_list = [
        self::STATUS_UNSHIPPED => '未发货',
        self::STATUS_SHIPMENTS => '已发货',
        self::STATUS_FINISH => '已完成',
    ];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shipping_address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'name', 'phone', 'address'], 'required'],
            [['user_id', 'phone', 'status', 'express_number'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['name', 'address', 'comment', 'express_company'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'name' => 'Name',
            'phone' => 'Phone',
            'address' => 'Address',
            'comment' => 'Comment',
            'status' => 'Status',
            'express_number' => 'Express Number',
            'express_company' => 'Express Company',
            'created' => 'Created',
            'updated' => 'Updated',
        ];
    }

    /**
     * @inheritdoc
     * @return ShippingAddressQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ShippingAddressQuery(get_called_class());
    }
}
