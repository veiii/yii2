<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\BUser;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;


/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class RegistrationForm extends Model
{
    public $username;
    public $password;
    public $firstName;
    public $lastName;
    public $mail;

    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password', 'mail'], 'required'],
            [['mail'], 'email'],
        ];
    }



}
