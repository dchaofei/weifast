<?php
Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('@backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');
define('USER_TYPE', \common\models\LoginLog::UESR_TYPE_ADMIN);
const MYSQL_CREATE_TABLE_OPTION = 'CHARACTER SET utf8';