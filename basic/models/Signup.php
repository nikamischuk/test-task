<?php

namespace app\models;

use yii\base\Model;

class Signup extends Model
{
    public $username;
    public $password;
    public $date;

    public function rules()
    {
        return [
            [['username','password','date'],'required'],
            ['password','string','min'=>8],
            ['login','username','targetClass'=>'app\models\User'],
            ['date','myRule1'],
            ['date','myRule2']
        ];
    }

    public function signup()
    {
        $user = new User();
        $user->username = $this->username;
        $user->setPassword($this->password);
        $user->date = $this->date;
        return $user->save();
    }
    public function myRule1($attr){
        if (self::timeDifference($this->$attr) < 5) {
            $this->addError($attr,'Too young!');
        }
    }
    public function myRule2($attr){
        if(self::timeDifference($this->$attr) > 150){
            $this->addError($attr,'Too old!');
        }
    }
    public static function timeDifference($date)
    {
        $dateTime = new \DateTime();
        $now = new \DateTime($date);
        $interval = $dateTime->diff($now);
        return $interval->y;
    }
}