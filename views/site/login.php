<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<!--
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to login:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ]) ?>


        <div>
            If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
        </div>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>



    <?php ActiveForm::end(); ?>

    <div class="col-lg-offset-1" style="color:#999;">
        You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br>
        To modify the username/password, please check out the code <code>app\models\User::$users</code>.
    </div>
</div>

-->


<div class="main-content main-page">
    <div class="main-content__welcome-block">
        <div class="main-content__welcome-block_title">Добро пожаловать</div>
        <form class="main-content__welcome-block_form" id="login-form" action="/site/login" method="post">
            <input type="hidden" name="<?=Yii::$app->getRequest()->csrfParam;?>" value="<?=Yii::$app->getRequest()->getCsrfToken();?>">
            <div>
            <input type="text" placeholder="Логин" id="loginform-username" name="LoginForm[username]">
            </div>
            <div class="col-lg-8"><p class="help-block help-block-error "></p></div>
            <div>
            <input type="text" placeholder="Пароль" id="loginform-password" name="LoginForm[password]">
            </div>
            <div class="col-lg-8"><p class="help-block help-block-error "></p></div>
            <div class="check">
                <input type="hidden" name="LoginForm[rememberMe]" value="0">

                <input type="checkbox" id="loginform-rememberme" name="LoginForm[rememberMe]" value="1" checked>
                <label for="loginform-rememberme">Запомнить и не выходить из системы</label>
            </div>
            <div class="col-lg-8"><p class="help-block help-block-error "></p></div>
            <button type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" viewBox="0 0 16 16"><defs><path id="1u0qa" d="M1087 387h-8.39l1.904 1.142-.009.014c.29.176.495.48.495.843v8h6a1 1 0 0 1 0 2h-6v1a1 1 0 0 1-1 1 .974.974 0 0 1-.506-.157l-.009.015-5-3 .01-.015a.978.978 0 0 1-.328-.322c-.012-.019-.025-.034-.036-.053a.972.972 0 0 1-.131-.468v-11a1 1 0 0 1 1-1h12a1 1 0 0 1 0 2zm-3.707 4.292l2-2a1 1 0 1 1 1.414 1.414l-.293.293H1089a1 1 0 1 1 0 2h-2.586l.293.293a1 1 0 1 1-1.414 1.414l-2-2a.997.997 0 0 1 0-1.414z"></path></defs><g><g transform="translate(-1074 -385)"><use fill="#fff" xlink:href="#1u0qa"></use></g></g></svg>
                <span>Войти</span>
            </button>
        </form>
    </div>
</div>
