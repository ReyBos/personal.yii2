<?php

use yii\helpers\Html;
use app\assets\AppAsset;
use app\assets\DeferAppAsset;
use yii\helpers\Url;

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

            <div class="text">Загрузка ...</div>
        </div>
    </div>
    <!-- ... end Preloader -->

    <!-- Fixed Sidebar Left -->
    <div class="fixed-sidebar">
        <div class="fixed-sidebar-left sidebar--small" id="sidebar-left">

            <a href="<?= Url::to(['/']) ?>" class="logo">
                <div class="img-wrap">
                    <?= Html::img('@frontend/img/auth/logo.png', ['alt' => 'Olympus']) ?>
                </div>
            </a>

            <div class="mCustomScrollbar" data-mcs-theme="dark">
                <ul class="left-menu">
                    <li>
                        <a href="#" class="js-sidebar-open">
                            <svg class="olymp-menu-icon left-menu-icon"  data-toggle="tooltip" data-placement="right" data-original-title="Меню"><use xlink:href="<?= Url::to('@frontend/svg-icons/sprites/icons.svg#olymp-menu-icon') ?>"></use></svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="fixed-sidebar-left sidebar--large" id="sidebar-left-1">
            <a href="<?= Url::to(['/']) ?>" class="logo">
                <div class="img-wrap">
                    <?= Html::img('@frontend/img/auth/logo.png', ['alt' => 'Olympus']) ?>
                </div>
                <div class="title-block">
                    <h6 class="logo-title">olympus</h6>
                </div>
            </a>

            <div class="mCustomScrollbar" data-mcs-theme="dark">
                <ul class="left-menu">
                    <li>
                        <a href="#" class="js-sidebar-open">
                            <svg class="olymp-close-icon left-menu-icon"><use xlink:href="<?= Url::to('@frontend/svg-icons/sprites/icons.svg#olymp-close-icon') ?>"></use></svg>
                            <span class="left-menu-title">Свернуть меню</span>
                        </a>
                    </li>
                </ul>

                <div class="profile-completion">

                </div>
            </div>
        </div>
    </div>
    <!-- ... end Fixed Sidebar Left -->

    <!-- Responsive Fixed Sidebar Left -->
    <div class="fixed-sidebar fixed-sidebar-responsive">

        <div class="fixed-sidebar-left sidebar--small" id="sidebar-left-responsive">
            <a href="<?= Url::to(['/']) ?>" class="logo js-sidebar-open">
                <?= Html::img('@frontend/img/auth/logo.png', ['alt' => 'Olympus']) ?>
            </a>

        </div>

        <div class="fixed-sidebar-left sidebar--large" id="sidebar-left-1-responsive">
            <a href="<?= Url::to(['/']) ?>" class="logo">
                <div class="img-wrap">
                    <?= Html::img('@frontend/img/auth/logo.png', ['alt' => 'Olympus']) ?>
                </div>
                <div class="title-block">
                    <h6 class="logo-title">olympus</h6>
                </div>
            </a>

            <div class="mCustomScrollbar" data-mcs-theme="dark">

                <div class="control-block">
                    <div class="author-page author vcard inline-items">
                        <div class="author-thumb">
                            <?= Html::img('@frontend/img/main/author-page.jpg', ['alt' => 'author', 'class' => 'avatar']) ?>
                            <span class="icon-status online"></span>
                        </div>
                        <a href="02-ProfilePage.html" class="author-name fn">
                            <div class="author-title">
                                James Spiegel <svg class="olymp-dropdown-arrow-icon"><use xlink:href="<?= Url::to('@frontend/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon') ?>"></use></svg>
                            </div>
                            <span class="author-subtitle">космический ковбой</span>
                        </a>
                    </div>
                </div>

                <div class="ui-block-title ui-block-title-small">
                    <h6 class="title">Основной раздел</h6>
                </div>

                <ul class="left-menu">
                    <li>
                        <a href="#" class="js-sidebar-open">
                            <svg class="olymp-close-icon left-menu-icon"><use xlink:href="<?= Url::to('@frontend/svg-icons/sprites/icons.svg#olymp-close-icon') ?>"></use></svg>
                            <span class="left-menu-title">Свернуть меню</span>
                        </a>
                    </li>
                </ul>

                <div class="ui-block-title ui-block-title-small">
                    <h6 class="title">Аккаунт</h6>
                </div>

                <ul class="account-settings">
                    <li>
                        <a href="#">

                            <svg class="olymp-menu-icon"><use xlink:href="<?= Url::to('@frontend/svg-icons/sprites/icons.svg#olymp-menu-icon') ?>"></use></svg>

                            <span>Настройки профиля</span>
                        </a>
                    </li>
                    <li>
                        <?php
                        echo Html::beginForm(['/auth/logout'], 'post', ['name' => 'logoutForm']);
                        $svgIcon = '<svg class="olymp-logout-icon"><use xlink:href="' . Url::to('@frontend/svg-icons/sprites/icons.svg#olymp-logout-icon') . '"></use></svg>';
                        echo Html::a($svgIcon . ' <span>Выйти</span>', '#', ['onClick' => 'document.logoutForm.submit(); return false;']);
                        echo Html::endForm()
                        ?>
                    </li>
                </ul>

            </div>
        </div>
    </div>
    <!-- ... end Responsive Fixed Sidebar Left -->

    <!-- Header-BP -->
    <header class="header" id="site-header">

        <div class="page-title">
            <h6>Профиль</h6>
        </div>

        <div class="header-content-wrapper">
            <form class="search-bar w-search notification-list friend-requests">
                <div class="form-group with-button">
                    <input class="form-control js-user-search" placeholder="Поиск людей и страниц..." type="text">
                    <button>
                        <svg class="olymp-magnifying-glass-icon"><use xlink:href="<?= Url::to('@frontend/svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon') ?>"></use></svg>
                    </button>
                </div>
            </form>

            <a href="#" class="link-find-friend">Найти друзей</a>

            <div class="control-block">

                <div class="author-page author vcard inline-items more">
                    <div class="author-thumb">
                        <?= Html::img('@frontend/img/main/author-page.jpg', ['alt' => 'author', 'class' => 'avatar']) ?>
                        <span class="icon-status online"></span>
                        <div class="more-dropdown more-with-triangle">
                            <div class="mCustomScrollbar" data-mcs-theme="dark">
                                <div class="ui-block-title ui-block-title-small">
                                    <h6 class="title">Аккаунт</h6>
                                </div>

                                <ul class="account-settings">
                                    <li>
                                        <?php
                                        echo Html::beginForm(['/auth/logout'], 'post', ['name' => 'logoutFormHeader']);
                                        $svgIcon = '<svg class="olymp-logout-icon"><use xlink:href="' . Url::to('@frontend/svg-icons/sprites/icons.svg#olymp-logout-icon') . '"></use></svg>';
                                        echo Html::a($svgIcon . ' <span>Выйти</span>', '#', ['onClick' => 'document.logoutFormHeader.submit(); return false;']);
                                        echo Html::endForm()
                                        ?>
                                    </li>
                                </ul>

                            </div>

                        </div>
                    </div>
                    <a href="/" class="author-name fn">
                        <div class="author-title">
                            James Spiegel <svg class="olymp-dropdown-arrow-icon"><use xlink:href="<?= Url::to('@frontend/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon') ?>"></use></svg>
                        </div>
                        <span class="author-subtitle">космический ковбой</span>
                    </a>
                </div>

            </div>
        </div>

    </header>
    <!-- ... end Header-BP -->

    <!-- Responsive Header-BP -->
    <header class="header header-responsive" id="site-header-responsive">

        <div class="header-content-wrapper">
            <ul class="nav nav-tabs mobile-app-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#search" role="tab">
                        <svg class="olymp-magnifying-glass-icon"><use xlink:href="<?= Url::to('@frontend/svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon') ?>"></use></svg>
                        <svg class="olymp-close-icon"><use xlink:href="<?= Url::to('@frontend/svg-icons/sprites/icons.svg#olymp-close-icon') ?>"></use></svg>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Tab panes -->
        <div class="tab-content tab-content-responsive">
            <div class="tab-pane " id="search" role="tabpanel">

                <form class="search-bar w-search notification-list friend-requests">
                    <div class="form-group with-button">
                        <input class="form-control js-user-search" placeholder="Поиск людей и страниц..." type="text">
                    </div>
                </form>

            </div>
        </div>
        <!-- ... end  Tab panes -->

    </header>
    <!-- ... end Responsive Header-BP -->
    <div class="header-spacer"></div>

    <div class="container">
        <div class="row">
            <?= $content ?>
        </div>
    </div>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
