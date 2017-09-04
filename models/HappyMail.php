<?php

namespace app\models;

use Yii;

class HappyMail
{
    public $name;
    public $email;
    public $subject = "Application Accepted";
    public $body;
    public $username;
    public $password;


    public function __construct($id)
    {
        $model = BUser::findIdentity($id);

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
        Yii::$app->mailer->compose('accepted')
            ->setTo($this->email)
            ->setFrom("testdoindust@gmail.com")
            ->setSubject($this->subject)
            ->send();


    }


}