<?php
/**
 * Created by PhpStorm.
 * User: chaofei
 * Date: 18-3-25
 * Time: 下午6:23
 */

namespace frontend\assets;


use yii\web\AssetBundle;
use yii\web\View;

class LayUiAsset extends AssetBundle
{
    public $css = [
        'layui/css/layui.css',
        //'layui/css/layui.mobile.css',
    ];
    public $js = [
        'layui/layui.all.js',
    ];
    public $jsOptions = [
        'position' => View::POS_HEAD,
    ];
}