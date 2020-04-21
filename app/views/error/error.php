<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Ошибка!';

?>

<div class="row">
    <div class="col col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12">
        <?= Html::img(Url::to('@frontend/img/error/500.png'), ['alt' => $name]) ?>
    </div>
    <div class="col col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
        <div class="crumina-module crumina-heading">
            <h1 class="page-500-sup-title"><?= $statusCode ?></h1>
            <h2 class="h1 heading-title"><?= $name ?></h2>
            <p class="heading-text"><?= $message ?></p>
            <p class="heading-text">Если хотите, вы можете вернуться на нашу домашнюю страницу или, если проблема не устранена, отправить нам письмо по адресу:
                <a href="#">test@test.com</a>
            </p>
        </div>
        <a href="<?= Url::to(['auth/login']); ?>" class="btn btn-primary btn-lg">Вернуться на главную</a>
    </div>
</div>
