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
 * @property string $created 创建时间
 * @property string $updated 更新时间
 */
class ShippingAddress extends \yii\db\ActiveRecord
{
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
            [['user_id', 'phone'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['name', 'address', 'comment'], 'string', 'max' => 255],
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
