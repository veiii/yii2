<?php
namespace app\models;

use Yii;
use app\models\Score;

class Admin
{

    //zliczanie liczby zaakceptowanych/odrz../... z bazy do tablicy
    public static function count()
    {
        $count = array();
        $count['IN_PROGRESS'] = Choices::find()->where(['result' => 0])->count();
        $count['ACCEPTED'] = Choices::find()->where(['result' => 1])->count();
        $count['REJECTED'] = Choices::find()->where(['result' => 2])->count();
        return $count;
    }


}