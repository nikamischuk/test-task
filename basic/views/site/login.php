<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
//use yii\widgets\ActiveForm;

$this->title = 'Вход';
?>
<div class="site-index">
<div class="jumbotron text-center bg-transparent">
    <h1 class="display-4">
      Вход
    </h1>
</div>
        <?php $form = ActiveForm::begin() ?>
        <?= $form->field($login_model, 'username')?>
        <?= $form->field($login_model, 'password')->passwordInput()?>
        <?= Html::submitButton('Войти', ['class' => 'btn btn-info']) ?>
        <?= Html::a('Зарегистрироваться',["site/signup",'#'=>'form'],['class'=>'big-button'])?>
        <?php $form = ActiveForm::end() ?>
</div>
