<?php
/**
 * Created by PhpStorm.
 * User: praktyki
 * Date: 25.08.2017
 * Time: 09:27
 */

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\BUser;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\Choices;
use app\models\Admin;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\data\SqlDataProvider;
use app\models\HappyMail;
use app\models\SadMail;
use yii\base\DynamicModel;
use app\models\ChoicesSearch;

class AdminController extends Controller
{
    public $userId;
    const EVENT_ACCEPTED ='accepted';
    const EVENT_REJECTED ='rejected';


    public function init()
    {
        $this->on(self::EVENT_ACCEPTED, [$this, 'happyMail']);
        $this->on(self::EVENT_REJECTED, [$this, 'sadMail']);
    }

    public function happyMail()
    {

        $mail = new HappyMail($this->userId);
        $mail->send();
    }

    public function sadMail()
    {
        $mail = new SadMail($this->userId);
        $mail->send();
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            //test początek

            'access' => [
                'class' => AccessControl::className(),
                //'only' => ['login', 'logout', 'signup'],
                'rules' => [

                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'update','accept','reject', 'many'],
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return BUser::isUserAdmin(Yii::$app->user->id);
                        }
                    ],
                ],
            ],
            //test koniec
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $dataProvider = new SqlDataProvider([
            'sql' => 'SELECT study_id, COUNT(*) AS lp From choices GROUP BY study_id ',
            //'totalCount' => $count,
            'pagination' => [
                'pageSize' => 15,
            ],
            'sort' => [
                'attributes' => [
                    'study_id',
                    'lp',
                ],
            ],
        ]);



        return $this->render('index', [
            'count' => Admin::count(), //tablica ze statami
            'data' => $dataProvider,// tabela z posortowaną ilością chętnych na dany kierunek
        ]);
       //testowe
      /*  $searchModel = new ChoicesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);*/
    }

    //widok tablicy chętnych na konkretny kierunek
    public function actionView($id)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Choices::find()->where(['study_id' => $id])->orderBy('points DESC'),
        ]);

        return $this->render('view', [
            'dataProvider' => $dataProvider,
        ]);
    }

    protected static function findModel($id)
    {
        if (($model = Choices::findOne($id)) !== null) {
            return $model;
        } else {
            //return false;
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    //testowe dwie metody
    public function actionAccept($id)
    {

        $model = $this->findModel($id);
        $this->userId = $model->user_id;
        $model->result = Choices::ACCEPTED;
        $model->save(false);
        //domyśnie odkomentować jak będą adresy mailowe wszystkie
        //$this->trigger(self::EVENT_ACCEPTED);
        return $this->redirect(['view', 'id' => $model->study_id]);
    }

    public function actionReject($id)
    {
        $model = $this->findModel($id);
        $this->userId = $model->user_id;
        $model->result = Choices::REJECTED;
        $model->save(false);
        //domyśnie odkomentować jak będą adresy mailowe wszystkie
        //$this->trigger(self::EVENT_REJECTED);
        return $this->redirect(['view', 'id' => $model->study_id]);
    }

    public function actionMany()
    {
        $model = new DynamicModel([
            'howManyPoints','studyId'
        ]);
        $model->addRule(['howManyPoints','studyId'], 'required');

        if($model->load(Yii::$app->request->post()) && $model->validate())
        {
            //logika przeniesiona do metod
           $choicesInProgress = $this->getNotAcceptedChoices($model->studyId);
           $this->decideResult($choicesInProgress, $model->howManyPoints);

        } else {
            return $this->render('many', array('model'=>$model));

        }
    }

    public function getNotAcceptedChoices($studyId)
    {
        $table = Choices::find()->where(['study_id' => $studyId, 'result' => 0])->asArray()->all();
        return $table;
    }

    public function decideResult($choicesInProgress, $pointLine)
    {
        foreach($choicesInProgress as $tab){
            if($tab['points']>=$pointLine){
                $this->actionAccept($tab['choices_id']);
            } else {
                $this->actionReject($tab['choices_id']);
            }
        }
    }

}