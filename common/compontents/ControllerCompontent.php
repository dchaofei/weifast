<?php
/**
 * Date: 18-3-26
 * Time: 下午3:00
 */
namespace common\compontents;

use common\models\OperateLog;
use Yii;
use yii\web\Response;

trait ControllerCompontent
{
    /**
     * json 返回
     *
     * @param $data
     * @param $message
     * @param $code
     * @return array
     */
    public function replyAjax($data, $message, $code)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return [
            'data' => $data,
            'message' => $message,
            'code' => $code,
        ];
    }

    /**
     * 成功返回
     *
     * @param array $data
     * @param string $message
     * @param int $code
     * @return array
     */
    public function successAjax($data = [], $message = 'success', $code = 0)
    {
        return $this->replyAjax($data, $message, $code);
    }

    /**
     * 失败返回
     *
     * @param array $data
     * @param string $message
     * @param int $code
     * @return mixed
     */
    public function failedAjax($data = [], $message = 'failed', $code = 1)
    {
        return $this->failedAjax($data, $message, $code);
    }

    /**
     * 显示通知
     *
     * @param $type
     * @param $message
     * @param string $widget
     */
    public function replyFlash($type, $message, $widget = 'growl')
    {
        Yii::$app->getSession()->setFlash($widget . '-' . $type, $message);
    }

    /**
     * 显示成功通知
     *
     * @param $message
     * @param string $widget growl|alert
     */
    public function successFlash($message, $widget = 'growl')
    {
        return $this->replyFlash('success', $message, $widget);
    }

    /**
     * 显示失败通知
     *
     * @param $message
     * @param string $widget growl|alert
     */
    public function failedFlash($message, $widget = 'growl')
    {
        return $this->replyFlash('danger', $message, $widget);
    }

    public function addLog($module, $log, $target_id = null, $reason = null)
    {
        return OperateLog::addLog($module, $log, $target_id, $reason);
    }
}