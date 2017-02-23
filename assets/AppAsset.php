<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'css/site.css',
        'theme/css/style.css',
        '/theme/libs/slick-1.6.0/slick/slick.css',
        '/theme/libs/Magnific-Popup-master/dist/magnific-popup.css'
    ];
    public $js = [
        '/theme/libs/bootstrap.min.js',
        '/theme/libs/slick-1.6.0/slick/slick.min.js',
        '/theme/libs/jquery.smooth-scroll.min.js',
        '/theme/libs/jquery.maskedinput.min.js',
        '/theme/scripts/forms.js',
        '/theme/scripts/callback.js',
        '/theme/scripts/slick-initialize.js',
        '/theme/libs/Magnific-Popup-master/dist/jquery.magnific-popup.js',
        '/theme/scripts/header.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
