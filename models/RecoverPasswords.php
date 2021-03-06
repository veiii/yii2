<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "recover_passwords".
 *
 * @property integer $user_id
 * @property string $token
 * @property string $date
 * @property integer $used
 */
class RecoverPasswords extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'recover_passwords';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'token'], 'required'],
            [['user_id'], 'integer'],
            [['token'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'token' => 'Token',
        ];
    }

    public static function getToken()
    {
        return Yii::$app->getSecurity()->generateRandomString();
    }



}
