<?php
/**
 * Date: 18-3-26
 * Time: 上午10:44
 */

namespace frontend\assets;

use yii\web\AssetBundle;
use yii\web\View;

class PaceAsset extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte';
    public $css = [
        'plugins/pace/pace.min.css',
    ];
    public $js = [
        'plugins/pace/pace.min.js',
    ];
    public $jsOptions = [
        'position' => View::POS_BEGIN,
    ];
    public $depends = [
    ];
}