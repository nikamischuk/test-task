<?php

/** @var yii\web\View $this */
use yii\widgets\ActiveForm;
use yii\helpers\Html;use yii\widgets\Pjax;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
$this->title = 'Страница';

?>
<!--<h1>Здравствуйте, --><?//= (Yii::$app->user->isGuest) ? 'Гость,' : Yii::$app->user->identity->username ?><!-- Мы на главной странице</h1>-->

<div class="site-index">
    <?php $session = Yii::$app->session; ?>
    <?php if((!Yii::$app->user->isGuest)&&($session->isActive)): ?>
    <?php $session->open();?>
    <?php $form = ActiveForm::begin(['class'=>'form-horizontal']) ?>
    <?php Pjax::begin(['enablePushState' => true]); ?>
    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">
    <p style="font-size: 300px"><?= Yii::$app->session->get('votes', 0) ?></p>
    <?= Html::a('+1', ['/', 'vote' => 'up'], ['class' => 'btn btn-lg btn-warning glyphicon glyphicon-arrow-up']) ?>
            <?= Html::a("Выход", ['site/logout'], [
                    'data' => [
                        'method' => 'post'
                    ],
                    ['class' => 'btn btn-lg btn-warning glyphicon glyphicon-arrow-up']
                ]
            );?>
    <?php Pjax::end(); ?>
    <?php ActiveForm::end() ?>
        </h1>
    </div>
    <?php else: ?>
    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">
            Вы не вошли в аккаунт. Пожалуйста
            <?= Html::a('зарегистрируйтесь',["site/signup",'#'=>'form'],['class'=>'big-button'])?>
            или
            <?= Html::a('войдите в существующий аккаунт',["site/login",'#'=>'form'],['class'=>'big-button'])?>.
        </h1>
    </div>
    <? endif;?>
</div>
