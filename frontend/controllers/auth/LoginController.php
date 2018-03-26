<?php
/**
 * Date: 18-3-26
 * Time: 下午2:36
 */

namespace frontend\controllers\auth;

use common\models\LoginLog;
use Yii;
use common\models\LoginForm;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\User;

class LoginController extends Controller
{
    public $layout = 'main-login';
    public $enableCsrfValidation = false;

    public function init()
    {
        Yii::$app->user->on(User::EVENT_AFTER_LOGIN, [LoginLog::class, 'addLoginEventLog']);
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goHome();
        } else {
            $model->password = '';

            return $this->render('index', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}