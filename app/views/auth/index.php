<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use kartik\date\DatePicker;

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
                        <svg class="olymp-register-icon"><use xlink:href="<?= Url::to('@frontend/svg-icons/sprites/icons.svg#olymp-register-icon') ?>"></use></svg>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $isLogin ? '' : 'active' ?>" data-toggle="tab" href="#home" role="tab">
                        <svg class="olymp-login-icon"><use xlink:href="<?= Url::to('@frontend/svg-icons/sprites/icons.svg#olymp-login-icon') ?>"></use></svg>
                    </a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                
                <?php
    
                $error = \Yii::$app->session->getFlash('error');
                if ($error) {
                    echo '<div class="alert alert-danger col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12" role="alert">';
                    echo $error;
                    echo '</div>';
                }

                $success = \Yii::$app->session->getFlash('success');
                if ($success) {
                    echo '<div class="alert alert-success col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12" role="alert">';
                    echo $success;
                    echo '</div>';
                }

                ?>
                
                <div class="tab-pane <?= $isLogin ? 'active' : '' ?>" id="profile" role="tabpanel" data-mh="log-tab">
                    <div class="title h6">Войдите в свой аккаунт</div>
                    
                    <?php $form = ActiveForm::begin([
                        'action' => '/auth/login',
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
                    <?php $form = ActiveForm::begin([
                        'action' => '/auth/signup',
                        'id' => 'signup-form',
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
                            <div class="col col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <?= $form->field($userInfo, 'first_name')->textInput() ?>
                            </div>
                            <div class="col col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <?= $form->field($userInfo, 'last_name')->textInput() ?>
                            </div>
                            <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                
                                <?= $form->field($userInfo, 'birthday_site')->widget(DatePicker::classname(), [
                                    'pluginOptions' => [
                                        'autoclose'=>true
                                    ]
                                ]); ?>
                                
                                <?= $form->field($userInfo, 'gender')->dropDownList($userInfo->getGenderList(), ['class' => 'selectpicker form-control']) ?>
                                
                                <?= $form->field($signupForm, 'username')->textInput() ?>

                                <?= $form->field($signupForm, 'password')->passwordInput() ?>
                                
                                <?= Html::submitButton('Завершить регистрацию!', ['class' => 'btn btn-purple btn-lg full-width', 'name' => 'login-button']) ?>
                            </div>
                        </div>
                    
                    <?php ActiveForm::end(); ?>
                    
                </div>
            </div>
        </div>

        <!-- ... end Login-Registration Form  -->		
    </div>
</div>