<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "study".
 *
 * @property integer $id
 * @property string $name
 */
class Study extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'study';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name'], 'required'],
            [['id'], 'integer'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    public static function getNameById($id)
    {
        $model = self::findOne(['id' => $id] );
        return $model->name;
    }
}
