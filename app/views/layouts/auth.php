<?php
/* @var $this \yii\web\View */
/* @var $content string */

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

    <body class="landing-page">
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
        <div class="content-bg-wrap"></div>


        <!-- Header Standard Landing  -->

        <div class="header--standard header--standard-landing" id="header--standard">
            <div class="container">
                <div class="header--standard-wrap">

                    <a href="#" class="logo">
                        <div class="img-wrap">
                            <?= Html::img("@frontend/img/auth/logo.png", ['alt' => 'Olympus']); ?>
                            <?= Html::img("@frontend/img/auth/logo-colored-small.png", ['alt' => 'Olympus', 'class' => 'logo-colored']); ?>
                        </div>
                        <div class="title-block">
                            <h6 class="logo-title">olympus</h6>
                            <div class="sub-title">SOCIAL NETWORK</div>
                        </div>
                    </a>

                    <a href="#" class="open-responsive-menu js-open-responsive-menu">
                        <svg class="olymp-menu-icon"><use xlink:href="/web/svg-icons/sprites/icons.svg#olymp-menu-icon"></use></svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- ... end Header Standard Landing  -->
        <div class="header-spacer--standard"></div>

        <div class="container">
            <?= $content ?>
        </div>

        <!-- Window Popup Main Search -->

        <div class="modal fade" id="main-popup-search" tabindex="-1" role="dialog" aria-labelledby="main-popup-search" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered window-popup main-popup-search" role="document">
                <div class="modal-content">
                    <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                        <svg class="olymp-close-icon"><use xlink:href="/web/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
                    </a>
                    <div class="modal-body">
                        <form class="form-inline search-form" method="post">
                            <div class="form-group label-floating">
                                <label class="control-label">What are you looking for?</label>
                                <input class="form-control bg-white" placeholder="" type="text" value="">
                            </div>

                            <button class="btn btn-purple btn-lg">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- ... end Window Popup Main Search -->

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>