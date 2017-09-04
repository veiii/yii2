<?php
/**
 * Created by PhpStorm.
 * User: praktyki
 * Date: 31.08.2017
 * Time: 12:52
 */
namespace app\models;
use Yii;

class PasswordMail
{
    public $name;
    public $email;
    public $subject = "New password";
    public $body;
    public $username;
    public $password;
    public $token;

    public function __construct($email, $token)
    {
        $this->token=$token;
        $this->email = $email;
        $model = \app\models\BUser::findUserByEmail($email);
        $this->password=$model->password;
        $this->username=$model->username;
    }

    public function body(){
        return 'LINK: http://localhost/basic/web/index.php?r=site%2Frecover TOKEN: '.$this->token;



    }
    public function send()
    {
        $message['username']=$this->username;
        $message['password']=$this->password;
        Yii::$app->mailer->compose()
            ->setTo($this->email)
            ->setFrom("testdoindust@gmail.com")
            ->setSubject($this->subject)
            ->setTextBody($this->body())
            ->send();


    }


}