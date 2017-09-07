<?php

namespace app\models;

use Yii;
use app\models\Choices;

class ChoicesQuery extends \yii\db\ActiveQuery
{


    public function inProgress()
    {
        return $this->andWhere(['result'=> Choices::IN_PROGRESS]);
    }

    public function accepted()
    {
        return $this->andWhere(['result'=> Choices::ACCEPTED]);
    }

    public function rejected()
    {
        return $this->andWhere(['result'=> Choices::REJECTED]);
    }

    public function studyId($id=1)
    {
        return $this->andWhere(['study_id'=> $id]);
    }



}