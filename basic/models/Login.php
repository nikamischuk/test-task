<?php

namespace app\models;

use Yii;
use yii\base\Model;

class Login extends Model
{
    public $username;
    public $password;
    public function rules()
    {
        return [
            [['username','password'],'required'],
            ['password','validatePassword']
        ];
    }

    public function validatePassword($attribute,$params){
        if(!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Неверный логин или пароль');
            }
        }
    }
    public function getUser(){
        return User::findOne(['username'=>$this->username]);
    }

}