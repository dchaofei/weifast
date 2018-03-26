<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[OperateLog]].
 *
 * @see OperateLog
 */
class OperateLogQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere(['type' => USER_TYPE]);
    }*/

    /**
     * @inheritdoc
     * @return OperateLog[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return OperateLog|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function searchByUserId($user_id = null)
    {
        return $this->andFilterWhere(['user_id' => $user_id]);
    }
}
