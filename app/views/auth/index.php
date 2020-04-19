<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Добро пожаловать в Olympus';

?>

<div class="row display-flex">
    <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
        <div class="landing-content">
            <h1>Добро пожаловать в крупнейшую социальную сеть в мире</h1>
            <p>Мы лучшая и самая большая социальная сеть с 5 миллиардами активных пользователей по всему миру. Делитесь своими мыслями, пишите в блоге, показывайте свою любимую музыку через Stopify, зарабатывайте значки и многое другое!</p>
        </div>
    </div>

    <div class="col col-xl-5 col-lg-6 col-md-12 col-sm-12 col-12">

        <!-- Login-Registration Form  -->

        <div class="registration-login-form">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link <?= $isLogin ? 'active' : '' ?>" data-toggle="tab" href="#profile" role="tab">
                        <svg class="olymp-register-icon"><use xlink:href="/web/svg-icons/sprites/icons.svg#olymp-register-icon"></use></svg>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $isLogin ? '' : 'active' ?>" data-toggle="tab" href="#home" role="tab">
                        <svg class="olymp-login-icon"><use xlink:href="/web/svg-icons/sprites/icons.svg#olymp-login-icon"></use></svg>
                    </a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane <?= $isLogin ? 'active' : '' ?>" id="profile" role="tabpanel" data-mh="log-tab">
                    <div class="title h6">Войдите в свой аккаунт</div>
                    
                    <?php $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'options' => [
                            'class' => 'content',
                        ],
                        'fieldConfig' => [
                            'template' => "{label}\n{input}\n{error}",
                            'labelOptions' => [
                                'class' => 'control-label'
                             ],
                            'options' => [
                                'class' => 'form-group label-floating',
                            ],
                        ],
                        'errorCssClass' => '',
                        'successCssClass' => '',
                    ]); ?>
                        
                        <div class="row">
                            <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <?= $form->field($loginForm, 'username')->textInput() ?>

                                <?= $form->field($loginForm, 'password')->passwordInput() ?>

                                <?= $form->field($loginForm, 'rememberMe')->checkbox([
                                    'options' => ['class' => 'remember'],
                                    'template' => "<div class=\"checkbox\"><label>{input} {label}<label></div>",
                                 ]) ?>
                                
                                <?= Html::submitButton('Войти', ['class' => 'btn btn-lg btn-primary full-width', 'name' => 'login-button']) ?>
                                
                            </div>
                        </div>

                    <?php ActiveForm::end(); ?>
                    
                </div>
                <div class="tab-pane <?= $isLogin ? '' : 'active' ?>" id="home" role="tabpanel" data-mh="log-tab">
                    <div class="title h6">Регистрация в Olympus</div>
                    <form class="content">
                        <div class="row">
                            <div class="col col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Имя</label>
                                    <input class="form-control" placeholder="" type="text">
                                </div>
                            </div>
                            <div class="col col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Фамилия</label>
                                    <input class="form-control" placeholder="" type="text">
                                </div>
                            </div>
                            <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Email</label>
                                    <input class="form-control" placeholder="" type="email">
                                </div>
                                <div class="form-group label-floating">
                                    <label class="control-label">Пароль</label>
                                    <input class="form-control" placeholder="" type="password">
                                </div>

                                <div class="form-group date-time-picker label-floating">
                                    <label class="control-label">Дата рождения</label>
                                    <input name="datetimepicker" value="10/24/1984" />
                                    <span class="input-group-addon">
                                        <svg class="olymp-calendar-icon"><use xlink:href="/web/svg-icons/sprites/icons.svg#olymp-calendar-icon"></use></svg>
                                    </span>
                                </div>

                                <div class="form-group label-floating is-select">
                                    <label class="control-label">Пол</label>
                                    <select class="selectpicker form-control">
                                        <option value="MA">Мужской</option>
                                        <option value="FE">Женский</option>
                                    </select>
                                </div>

                                <a href="#" class="btn btn-purple btn-lg full-width">Завершить регистрацию!</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- ... end Login-Registration Form  -->		
    </div>
</div>