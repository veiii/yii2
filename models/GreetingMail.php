<?php
/**
 * Created by PhpStorm.
 * User: praktyki
 * Date: 22.08.2017
 * Time: 14:26
 */

namespace app\models;

use Yii;


class GreetingMail
{
    public $name;
    public $email;
    public $subject = "Greeting message";
    public $body;
    public $username;
    public $password;


    public function __construct()
    {
        $model = BUser::findIdentity(Yii::$app->user->id);

        $this->email = $model->mail;
        $this->username = $model->username;
        $this->password = $model->password;

    }

    public function body()
    {

    }

    public function send()
    {
       /* Yii::$app->mailer->compose()
            ->setTo($this->email)
            ->setFrom("testdoindust@gmail.com")
            ->setSubject($this->subject)
            ->setTextBody($this->body())
            ->send();
       */
        Yii::$app->mailer->compose('greetings')
            ->setTo($this->email)
            ->setFrom("testdoindust@gmail.com")
            ->setSubject($this->subject)
            ->send();


    }
}