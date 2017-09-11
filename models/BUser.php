<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\web\IdentityInterface;
use \yii\db\ActiveRecord;

/**
 * This is the model class for table "b_user".
 *
 * @property integer $id
 * @property string $firstName
 * @property string $lastName
 * @property string $username
 * @property string $password
 * @property integer $authKey
 * @property string $mail
 */


class BUser extends ActiveRecord implements IdentityInterface
{
    const ROLE_USER = 0;
    const ROLE_ADMIN = 1;
    const EVENT_NEW_USER = 'new-user';

    public function init(){
        $this->on(self::EVENT_NEW_USER, [$this, 'greeting']);
    }

    public function greeting()
    {
        //die("event działa");
        $mail = new GreetingMail();
        $mail->send();

    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstName', 'lastName', 'username', 'password'], 'required'],
            //[['authKey'], 'integer'],
            [['firstName'], 'string', 'max' => 15],
            [['lastName'], 'string', 'max' => 20],
            [['username', 'password'], 'string', 'max' => 30],
            [['username'], 'unique'],
            [['mail'], 'string', 'max' =>45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstName' => 'First Name',
            'lastName' => 'Last Name',
            'username' => 'Username',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'role' => 'Role',
            'mail' => 'Mail',
        ];
    }

    /**
     * Finds an identity by the given ID.
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface the identity object that matches the given ID.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     * @param mixed $token the token to be looked for
     * @param mixed $type the type of the token. The value of this parameter depends on the implementation.
     * For example, [[\yii\filters\auth\HttpBearerAuth]] will set this parameter to be `yii\filters\auth\HttpBearerAuth`.
     * @return IdentityInterface the identity object that matches the given token.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException();
    }

    /**
     * Returns an ID that can uniquely identify a user identity.
     * @return string|int an ID that uniquely identifies a user identity.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns a key that can be used to check the validity of a given identity ID.
     *
     * The key should be unique for each individual user, and should be persistent
     * so that it can be used to check the validity of the user identity.
     *
     * The space of such keys should be big enough to defeat potential identity attacks.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @return string a key that is used to check the validity of a given identity ID.
     * @see validateAuthKey()
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * Validates the given auth key.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @param string $authKey the given auth key
     * @return bool whether the given auth key is valid.
     * @see getAuthKey()
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public static function findByUsername($username){
        return self::findOne(['username'=>$username]);
    }

    public function validatePassword($password)
    {
        return $this->password === $password;
    }
    //test
    public static function isUserAdmin($id)
    {
        if(static::findOne(['id'=> $id, 'role' => self::ROLE_ADMIN])){

            return true;
        } else {
            return false;
        }
    }

    public static function findUserByEmail($email)
    {
        return self::findOne(['mail' => $email]);

    }
}
