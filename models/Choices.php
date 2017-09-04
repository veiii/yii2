<?php

namespace app\models;

use Yii;
use app\models\Score;

/**
 * This is the model class for table "choices".
 *
 * @property integer $choices_id
 * @property integer $user_id
 * @property integer $study_id
 * @property integer $points
 * @property integer $result
 */
class Choices extends \yii\db\ActiveRecord
{
    const IN_PROGRESS = 0;
    const ACCEPTED = 1;
    const REJECTED = 2;
   /* const EVENT_ACCEPTED ='accepted';
    const EVENT_REJECTED ='rejected';

    public function init()
    {
        $this->on(self::EVENT_ACCEPTED, [$this, 'happyMail'], $data);
        $this->on(self::EVENT_REJECTED, [$this, 'sadMail']);
    }

    public function happyMail($event)
    {
        $mail = new HappyMail($event->data);
        $mail->send();
    }

    public function sadMail($event)
    {
        $mail = new SadMail($event->data);
        $mail->send();
    }
*/



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'choices';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'study_id', 'points'], 'required'],
            [['user_id', 'study_id', 'points', 'result'], 'integer'],
            [['user_id'],'isId'],
            [['points'], 'isRightPoints'],
            [['study_id'], 'onlyOne']
        ];
    }

    /**
     * @inheritdoc
     */
    //blokada dublowania
    public function onlyOne()
    {
        $model = self::findOne(['user_id' => $this->user_id, 'study_id'=> $this->study_id]);
        if(!empty($model)){
            $this->addError("You already choose this course.");
        }
    }

    public function isRightPoints()
    {
        if($this->points != self::pointsById(Yii::$app->user->id)){
            $this->addError("Something wrong with points");
        }
    }

    //test czy id sie zgadza
    public function isId(){
        if($this->user_id != Yii::$app->user->id){
            $this->addError("nie to id");
        }
    }
    public function attributeLabels()
    {
        return [
            'choices_id' => 'Choices ID',
            'user_id' => 'User ID',
            'study_id' => 'Study ID',
            'points' => 'Points',
            'result' => 'Result',
        ];
    }
    public static function pointsById($userId)
    {

        $userData = Score::findOne($userId);
        $points = 0.3*($userData->polish)+0.5*($userData->biology+$userData->geography+$userData->english)+1*($userData->matematic)+1.5*($userData->physics+$userData->chemistry);

        return round($points);
    }

    public static function progress($resultInInt)
    {
        switch ($resultInInt) {
            case Choices::IN_PROGRESS:
                return 'In Progress';
                break;
            case Choices::ACCEPTED:
                return 'Accepted';
                break;
            case Choices::REJECTED:
                return 'Rejected';
                break;
            default:
                return 'Error';
        }
    }
}
