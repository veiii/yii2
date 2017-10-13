<?php
namespace app\controllers;

use app\models\BUser;
use yii\rest\ActiveController;
use yii\filters\auth\HttpBasicAuth;

class ResttestController extends ActiveController
{
    public $modelClass = 'app\models\Resttest';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::className(),
            'auth' => [$this, 'auth'],
        ];
        return $behaviors;
    }

    public function auth($username, $password)
    {
        if(empty($username) || empty($password)){
            return false;
        }
        $model = BUser::findByUsername($username);

        if($password != $model->password){
            return false;
        } else {
            return $model;
        }

    }

    public function verbs(){

        return [
          'index' => ['POST','GET']
        ];
    }

    public function init()
    {
        parent::init();
        \Yii::$app->user->enableSession = false;
    }



   /* public function action()
    {
        $action = parent::actions();

    }*/

    public function actionCreate()
    {

    }
/**
 * takie coś nie działa wyrzuca całą zawartoś w xmlu
 */
    /*public function actionResttest(){
        return $this->render('resttest');
    }*/
}
