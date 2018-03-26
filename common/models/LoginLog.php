<?php

namespace common\models;

use Yii;
use yii\web\UserEvent;

/**
 * This is the model class for table "login_log".
 *
 * @property int $id
 * @property int $user_id 用户或管理员id
 * @property int $role_id 用户组
 * @property int $type 1.管理员,2.用户
 * @property string $ip 登录ip
 * @property string $address 地址
 * @property string $created 登录时间
 * @property int $duration 保持时间
 */
class LoginLog extends \yii\db\ActiveRecord
{
    const UESR_TYPE_ADMIN = 1;
    const UESR_TYPE_CUSTOMER = 2;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'login_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'ip', 'type'], 'required'],
            [['user_id', 'role_id', 'type', 'duration'], 'integer'],
            [['created'], 'safe'],
            [['ip'], 'string', 'max' => 39],
            [['address'], 'string', 'max' => 64],
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
            'role_id' => 'Role ID',
            'type' => 'Type',
            'ip' => 'Ip',
            'address' => 'Address',
            'created' => 'Created',
            'duration' => 'Duration',
        ];
    }

    /**
     * @inheritdoc
     * @return LoginLogQuery the active query used by this AR class.
     */
    public static function find()
    {
        return (new LoginLogQuery(get_called_class()))->andWhere(['type' => USER_TYPE]);
    }

    /**
     * 添加登录日志
     *
     * @param UserEvent $event
     * @return bool
     */
    public static function addLoginEventLog(UserEvent $event)
    {
        $model = new self();
        $model->setAttributes([
            'user_id' => $event->identity->getId(),
            'type' => USER_TYPE,
            'ip' => Yii::$app->request->getUserIP(),
            'address' => '', //todo 获取登录地址
            'created' => date('Y-m-d H:i:s'),
            'duration' => $event->duration,
        ]);

        return $model->save();
    }
}
