<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "operate_log".
 *
 * @property int $id
 * @property int $user_id 用户id
 * @property int $type 1.管理员,2.用户
 * @property string $ip 操作ip
 * @property string $country 地址
 * @property int $module 操作项
 * @property int $target_id 目标对象id
 * @property string $log 日志
 * @property string $reason 备注
 * @property string $created 操作时间
 */
class OperateLog extends \yii\db\ActiveRecord
{
    // 用户自身操作
    const LOG_MODULE_RESET_PASSWORD = 100;

    // 登录账号管理
    const LOG_MODULE_ADD_USER = 200;
    const LOG_MODULE_DELETE_USER = 201;

    public static $module_name = [
        self::LOG_MODULE_RESET_PASSWORD => '修改密码',
        self::LOG_MODULE_ADD_USER => '添加账号',
        self::LOG_MODULE_DELETE_USER => '删除账号',
    ];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'operate_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'ip', 'module', 'type'], 'required'],
            [['user_id', 'type', 'module', 'target_id'], 'integer'],
            [['log'], 'string'],
            [['created'], 'safe'],
            [['ip'], 'string', 'max' => 39],
            [['country'], 'string', 'max' => 64],
            [['reason'], 'string', 'max' => 255],
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
            'type' => 'Type',
            'ip' => 'Ip',
            'country' => 'Country',
            'module' => 'Module',
            'target_id' => 'Target ID',
            'log' => 'Log',
            'reason' => 'Reason',
            'created' => 'Created',
        ];
    }

    /**
     * @inheritdoc
     * @return OperateLogQuery the active query used by this AR class.
     */
    public static function find()
    {
        return (new OperateLogQuery(get_called_class()))->andWhere(['type' => USER_TYPE]);
    }


    public static function addLog($module, $log, $target_id = null, $reason = null, $user_id = null, $ip = null)
    {
        $model = new self();
        $model->user_id = $user_id ?? Yii::$app->user->identity->getId();
        $model->ip = $ip ?? Yii::$app->request->getUserIP();
        $model->module = $module;
        $model->type = USER_TYPE;
        $model->target_id = $target_id;
        $model->log = $log;
        $model->reason = $reason;
        return $model->save();
    }

    public static function getModuleName()
    {
        return array_filter(self::$module_name, function ($value, $key) {
            return $key >= 200;
        }, ARRAY_FILTER_USE_BOTH);
    }

    public static function getAllModuleName()
    {
        return self::$module_name;
    }
}
