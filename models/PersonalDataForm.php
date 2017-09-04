<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * rejestracja studentów
 * Dane personalne do weryfikacji
 */
class PersonalDataForm extends Model
{
    public $surname;
    public $firstName;
    public $secondName;
    public $PESEL; //jakieś ładne sprawdzanie peselu trzeba
    public $dateOfBirth;
    public $placeOfBirth;
    public $sex;
    public $email;

    public function rules()
    {
        return [
            [['surname','firstName','PESEL','dateOfBirth','placeOfBirth','sex'], 'required'],
            ['email', 'email'],
        ];
    }
}