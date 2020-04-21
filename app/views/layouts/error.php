<?php

use yii\helpers\Html;
use app\assets\AppAsset;
use app\assets\DeferAppAsset;

AppAsset::register($this);
DeferAppAsset::register($this);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>

        <?php $this->head() ?>

        <!-- Main Font -->
        <?php $this->registerJsFile("/web/js/libs/webfontloader.min.js", ['position' => \yii\web\View::POS_HEAD]); ?>
        <script>
            WebFont.load({
                google: {
                    families: ['Roboto:300,400,500,700:latin']
                }
            });
        </script>
    </head>
    <body class="body-bg-white">
        <?php $this->beginBody() ?>

        <!-- Preloader -->
        <div id="hellopreloader">
            <div class="preloader">
                <svg width="45" height="45" stroke="#fff">
                <g fill="none" fill-rule="evenodd" stroke-width="2" transform="translate(1 1)">
                <circle cx="22" cy="22" r="6" stroke="none">
                <animate attributeName="r" begin="1.5s" calcMode="linear" dur="3s" repeatCount="indefinite" values="6;22"/>
                <animate attributeName="stroke-opacity" begin="1.5s" calcMode="linear" dur="3s" repeatCount="indefinite" values="1;0"/>
                <animate attributeName="stroke-width" begin="1.5s" calcMode="linear" dur="3s" repeatCount="indefinite" values="2;0"/>
                </circle>
                <circle cx="22" cy="22" r="6" stroke="none">
                <animate attributeName="r" begin="3s" calcMode="linear" dur="3s" repeatCount="indefinite" values="6;22"/>
                <animate attributeName="stroke-opacity" begin="3s" calcMode="linear" dur="3s" repeatCount="indefinite" values="1;0"/>
                <animate attributeName="stroke-width" begin="3s" calcMode="linear" dur="3s" repeatCount="indefinite" values="2;0"/>
                </circle>
                <circle cx="22" cy="22" r="8">
                <animate attributeName="r" begin="0s" calcMode="linear" dur="1.5s" repeatCount="indefinite" values="6;1;2;3;4;5;6"/>
                </circle>
                </g>
                </svg>

                <div class="text">Loading ...</div>
            </div>
        </div>
        <!-- ... end Preloader -->
        
        <section class="page-500-content medium-padding120">
            <div class="container">
                <?= $content ?>
            </div>
        </section>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>