<?php
/**
 * Date: 18-3-26
 * Time: 上午11:21
 */
namespace frontend\controllers\auth;

use common\models\LoginLog;
use common\models\OperateLog;
use common\models\User;
use frontend\controllers\BaseController;
use frontend\models\ResetPasswordForm;
use Yii;
use yii\filters\AccessControl;

class ProfileController extends BaseController
{
    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index', 'reset-password'],
                'rules' => [
                    [
                        'actions' => ['index', 'reset-password'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ]);
    }

    /**
     * 个人中心
     */
    public function actionIndex()
    {
        $model = User::findOne(Yii::$app->user->id);

        $login_history = LoginLog::find()
            ->searchByUserId(Yii::$app->user->id)
            ->orderBy(['created' => SORT_DESC])
            ->limit(5)
            ->asArray()
            ->all();

        $operate_log = OperateLog::find()
            ->searchByUserId(Yii::$app->user->id)
            ->orderBy(['created' => SORT_DESC])
            ->limit(10)
            ->all();

        $operate_log_label = OperateLog::getAllModuleName();

        return $this->render('index', [
            'model' => $model,
            'login_history' => $login_history,
            'operate_log' => $operate_log,
            'operate_log_label' => $operate_log_label,
        ]);
    }

    public function actionResetPassword()
    {
        $model = new ResetPasswordForm();
        if ($model->load(Yii::$app->request->post(), '')) {
            $model->user_id = Yii::$app->user->id;
            if ($user = $model->reset()) {
                $this->addLog(OperateLog::LOG_MODULE_RESET_PASSWORD, "修改密码 {$user->username}", $user->id);
                Yii::$app->user->logout();
                return $this->successAjax();
            } else {
                return $this->failedAjax(['error' => $model]);
            }
        }
        return $this->render('reset', [
            'model' => $model
        ]);

    }
}