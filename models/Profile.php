<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property integer $user_id
 * @property string $surname
 * @property string $first_name
 * @property string $second_name
 * @property string $PESEL
 * @property string $date_of_birth
 * @property string $place_of_birth
 * @property string $sex
 * @property string $email
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profile';
    }

    public static function getName($id){
        $model = Profile::find()->where(['user_id'=>$id])->one();
        return $model->surname.' '.$model->first_name;
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'surname', 'first_name', 'second_name', 'PESEL', 'date_of_birth', 'place_of_birth', 'sex', 'email'], 'required'],
            [['user_id'], 'integer'],
            [['date_of_birth'], 'safe'],
            [['surname', 'first_name', 'second_name', 'place_of_birth'], 'string', 'max' => 25],
            [['PESEL'], 'string', 'max' => 11],
            [['sex'], 'string', 'max' => 10],
            [['email'], 'string', 'max' => 30],
            [['PESEL'], 'isPesel'],
            [['user_id'], 'isId'],
        ];
    }
    //test czy id sie zgadza
    public function isId(){
        if($this->user_id != Yii::$app->user->id){
            $this->addError("nie to id");
        }
    }

    //ERROR ODCHACZONY NA POTRZEBY TESTÓW
    function isPesel()
    {
        if (!preg_match('/^[0-9]{11}$/',$this->PESEL))
        {
            $this->addError('PESEL','PESEL must contains 11 numbers');
        }

        $arrSteps = array(1, 3, 7, 9, 1, 3, 7, 9, 1, 3); // tablica z odpowiednimi wagami
        $intSum = 0;
        for ($i = 0; $i < 10; $i++)
        {
            $intSum += $arrSteps[$i] * $this->PESEL[$i]; //mnożymy każdy ze znaków przez wagę i sumujemy wszystko
        }
        $int = 10 - $intSum % 10; //obliczamy sumę kontrolną
        $intControlNr = ($int == 10)?0:$int;
        if ($intControlNr == $this->PESEL[10]) //sprawdzamy czy taka sama suma kontrolna jest w ciągu
        {
            return true;
        } else {
            //$this->addError('PESEL','PESEL uncorrect');
        }

    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'surname' => 'Surname',
            'first_name' => 'First Name',
            'second_name' => 'Second Name',
            'PESEL' => 'Pesel',
            'date_of_birth' => 'Date Of Birth',
            'place_of_birth' => 'Place Of Birth',
            'sex' => 'Sex',
            'email' => 'Email',
        ];
    }
}
