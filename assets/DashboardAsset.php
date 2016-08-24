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
class DashboardAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'bootstrap/css/bootstrap.min.css',
       //'maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css',
        'fonts/font-awesome.min.css',
        'dist/css/AdminLTE.min.css',
        '//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
        'dist/css/skins/_all-skins.min.css',
        'plugins/daterangepicker/daterangepicker-bs3.css',
        'plugins/datepicker/datepicker3.css',
        'plugins/iCheck/all.css',
        'plugins/colorpicker/bootstrap-colorpicker.min.css',
        'plugins/timepicker/bootstrap-timepicker.min.css',
        'dist/css/AdminLTE.min.css',
        'plugins/icheck/flat/blue.css',
        //'css/site.css',
        'plugins/datatables/dataTables.bootstrap.css',
        'plugins/morris/morris.css',
        'plugins/select2/select2.min.css',

    ];
    public $js = [
        //'plugins/jQuery/jQuery-2.2.0.min.js',
        'bootstrap/js/bootstrap.min.js',
       ////code.jquery.com/ui/1.11.4/jquery-ui.min.js',
       ////cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js',
       ////cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js',
        'plugins/morris/morris.min.js',
        'plugins/sparkline/jquery.sparkline.min.js',
        'plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
        'plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
        'plugins/knob/jquery.knob.js',
        'plugins/daterangepicker/daterangepicker.js',
        'plugins/datepicker/bootstrap-datepicker.js',
        'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
        'plugins/slimScroll/jquery.slimscroll.min.js',
        'plugins/fastclick/fastclick.min.js',
        'dist/js/app.min.js',
        'dist/js/demo.js',
        'plugins/datatables/dataTables.bootstrap.min.js',
        'plugins/datatables/jquery.dataTables.min.js',
        'plugins/slimScroll/jquery.slimscroll.min.js',
        'plugins/fastclick/fastclick.min.js',
        'plugins/select2/select2.full.min.js',
        'plugins/input-mask/jquery.inputmask.js',
        'plugins/input-mask/jquery.inputmask.date.extensions.js',
        'plugins/input-mask/jquery.inputmask.extensions.js',
        '',



    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
