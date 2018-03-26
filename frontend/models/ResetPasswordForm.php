<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;
/**
 * ResetPasswordForm is the model behind the reset password form.
 */
class ResetPasswordForm extends Model
{
    public $user_id;
    public $password;
    public $confirm_password;

    private $_user;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['password', 'confirm_password'], 'required'],
            [['user_id'], 'exist', 'targetClass' => User::class, 'targetAttribute' => 'id', 'filter' => ['!=', 'status', User::USER_DELETE]],
            [['user_id'], 'compare', 'compareValue' => Yii::$app->user->id, 'on' => 'self'],
            [['password'], 'match', 'pattern' => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[~!@#$%^&*()_+`\-={}:";\'<>?,.\/]?).{10,}$/', 'message' => '密码不符合规范'],
            [['confirm_password'], 'compare', 'compareAttribute' => 'password', 'message' => '确认密码不相同'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => '用户',
            'password' => '密码',
            'confirm_password' => '确认密码',
        ];
    }

    public function reset()
    {
        if ($this->validate()) {
            $this->_user = User::find()->where(['id' => $this->user_id])->active()->one();
            $this->_user->setAttributes([
                'password_hash' => Yii::$app->getSecurity()->generatePasswordHash($this->password),
                //'secret' => null,
                'auth_key' => Yii::$app->security->generateRandomString(),
            ], false);
            if ($this->_user->save()) {
                return $this->_user;
            }
        }
        return false;
    }
}
