<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@frontend';
    public $css = [        
        'css/bootstrap-reboot.css',
        'css/bootstrap.css',
        'css/bootstrap-grid.css',
        
        'css/main.css',
        'css/fonts.min.css',
        'css/my.css',
    ];
    public $js = [
        'js/libs/jquery.appear.js',
        'js/libs/jquery.mousewheel.js',
        'js/libs/perfect-scrollbar.js',
        'js/libs/jquery.matchHeight.js',
        'js/libs/svgxuse.js',
        'js/libs/imagesloaded.pkgd.js',
        'js/libs/Headroom.js',
        'js/libs/velocity.js',
        'js/libs/ScrollMagic.js',
        'js/libs/jquery.waypoints.js',
        'js/libs/jquery.countTo.js',
        'js/libs/popper.min.js',
        'js/libs/material.min.js',
        'js/libs/bootstrap-select.js',
        'js/libs/smooth-scroll.js',
        'js/libs/selectize.js',
        'js/libs/swiper.jquery.js',
        'js/libs/moment.js',
        'js/libs/daterangepicker.js',
        'js/libs/fullcalendar.js',
        'js/libs/isotope.pkgd.js',
        'js/libs/ajax-pagination.js',
        'js/libs/Chart.js',
        'js/libs/chartjs-plugin-deferred.js',
        'js/libs/circle-progress.js',
        'js/libs/loader.js',
        'js/libs/run-chart.js',
        'js/libs/jquery.magnific-popup.js',
        'js/libs/jquery.gifplayer.js',
        'js/libs/mediaelement-and-player.js',
        'js/libs/mediaelement-playlist-plugin.min.js',
        'js/libs/ion.rangeSlider.js',
        'js/libs/leaflet.js',
        'js/libs/MarkerClusterGroup.js',
        
        'js/bootstrap/bootstrap.bundle.js',
        
        'js/main.js',
        'js/libs-init/libs-init.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
