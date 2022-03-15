<?php

namespace app\controllers;

use app\models\Login;
use app\models\Signup;
use Yii;
use yii\debug\models\search\Debug;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;


class SiteController extends Controller
{
        public function actionIndex($vote = null)
        {
            $votes = Yii::$app->session->get('votes', 0);
            if ($vote === 'up') {
                Yii::$app->session->set('votes', ++$votes);
                return $this->redirect(['index']);
            }
            return $this->render('index');
        }
        public function actionLogout()
        {
            if(!Yii::$app->user->isGuest)
            {
                Yii::$app->user->logout();
                return $this->redirect(['login']);
            }
        }
        public function actionSignup()
        {
            $model = new Signup();
            if(isset($_POST['Signup'])){
                $model->attributes = Yii::$app->request->post('Signup');
                if($model->validate() && $model->signup())
                {
                    return $this->redirect(['index']);
                }
            }
            return $this->render('signup',['model'=>$model]);
        }

        public function actionLogin(){
            if(!Yii::$app->user->isGuest){
                return $this->goHome();
            }
            $login_model = new Login();

            if(Yii::$app->request->post('Login'))
            {
                $login_model->attributes = Yii::$app->request->post('Login');
                if($login_model->validate())
                {
                    Yii::$app->user->login($login_model->getUser());
                    return $this->goHome();
                }
            }
            return $this->render('login',['login_model'=>$login_model]);
        }
}
