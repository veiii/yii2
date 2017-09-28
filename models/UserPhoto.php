<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_photo".
 *
 * @property integer $user_id
 * @property string $path
 */
class UserPhoto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_photo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'path'], 'required'],
            [['user_id'], 'integer'],
            [['path'], 'string', 'max' => 100],
            [['user_id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('app', 'User ID'),
            'path' => Yii::t('app', 'Path'),
        ];
    }

    public static function isPhoto($id)
    {
        $model = self::findOne(['user_id' => $id]);
        if ($model){
            return true;
        } else {
            return false;
        }
    }

    public function findPhotoByUserId($id)
    {
        return self::findOne(['user_id' => $id]);
    }

    public static function deleteFileByUserId($id)
    {


    }
}
