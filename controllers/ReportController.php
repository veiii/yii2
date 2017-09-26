<?php

namespace app\controllers;


use app\models\Study;
use Yii;
use yii\web\Controller;
use app\models\Choices;
use yii\data\ActiveDataProvider;


class ReportController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionReport() {
        $id = Yii::$app->request->get('studyId');
        $query = $this->getAcceptedList($id);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $pdf = Yii::$app->pdf;
        $pdf->filename= date("Y-m-d").'_'.Study::getNameById($id);
        $pdf->content = $this->renderPartial('_reportView', [
            'dataProvider' => $dataProvider,
            'studyName' => Study::getNameById($id),
        ]);
        $pdf->render();
        exit();
    }

    public function getAcceptedList($studyId)
    {
        $model = Choices::find()->studyId($studyId)->accepted();
        return $model;
    }


}