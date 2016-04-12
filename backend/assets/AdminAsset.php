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
class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css',       
        'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css',
        'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
        'web/assets/dist/css/AdminLTE.min.css',
        'web/assets/dist/css/skins/_all-skins.min.css',
        'web/assets/plugins/iCheck/flat/blue.css',
        'web/assets/plugins/morris/morris.css',
        'web/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css',
        'web/assets/plugins/datepicker/datepicker3.css',
        'web/assets/plugins/daterangepicker/daterangepicker-bs3.css',
        'web/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'        
    ];
    public $js = [
        'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js',
        'https://code.jquery.com/ui/1.11.4/jquery-ui.min.js',
        'https://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular.min.js',       
        'https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js',
        'web/assets/plugins/morris/morris.min.js',
        'web/assets/plugins/sparkline/jquery.sparkline.min.js',
        'web/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
        'web/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
        'web/assets/plugins/knob/jquery.knob.js',
        'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js',
        'web/assets/plugins/daterangepicker/daterangepicker.js',
        'web/assets/plugins/datepicker/bootstrap-datepicker.js',
        'web/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
        'web/assets/plugins/slimScroll/jquery.slimscroll.min.js',
        'web/assets/plugins/fastclick/fastclick.min.js',
        'web/assets/dist/js/app.min.js',
        'web/assets/dist/js/pages/dashboard.js',
        'web/assets/dist/js/demo.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
       // 'yii\bootstrap\BootstrapAsset',
    ];
}
