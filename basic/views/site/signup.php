<?php

/** @var yii\web\View $this */
use yii\widgets\ActiveForm;
use yii\helpers\Html;
$this->title = 'Регистрация';
?>
<div class="site-index">
    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">
            Регистрация
        </h1>
    </div>
    <?php $form = ActiveForm::begin(['class'=>'form-horizontal']) ?>
    <?= $form->field($model, 'username')->textInput(['autofocus'=>true])->label('Логин')?>
    <?= $form->field($model, 'password')->passwordInput()->label('Пароль')?>
    <?= $form->field($model, 'date')->input('date')->label('Дата рождения')?>
    <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-info']) ?>
    <?php ActiveForm::end() ?>
</div>