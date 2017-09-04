<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "score".
 *
 * @property integer $user_id
 * @property integer $polish
 * @property integer $matematic
 * @property integer $english
 * @property integer $geography
 * @property integer $physics
 * @property integer $chemistry
 * @property integer $biology
 */
class Score extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'score';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'polish', 'matematic', 'english', 'geography', 'physics', 'chemistry', 'biology'], 'integer', 'min' => 0 , 'max' => 100],
            [['user_id'], 'isId']//testowe
        ];
    }

    /**
     * @inheritdoc
     */
    //test czy id sie zgadza
    public function isId(){
        if($this->user_id != Yii::$app->user->id){
            $this->addError("nie to id");
        }
    }
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'polish' => 'Polish',
            'matematic' => 'Matematic',
            'english' => 'English',
            'geography' => 'Geography',
            'physics' => 'Physics',
            'chemistry' => 'Chemistry',
            'biology' => 'Biology',
        ];
    }
/*
    public static function getDataToMainView($id)
    {
        if (($model = self::findOne($id)) !== null) {
            return $model;
        } else {
            return false;
        }
    }*/
}
