<?php

namespace app\controllers;

use Yii;
use app\models\Profile;
use app\models\ProfileSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\Score;
use app\models\Choices;
use yii\data\ActiveDataProvider;
use app\models\BUser;

/**
 * ProfileController implements the CRUD actions for Profile model.
 */
class ProfileController extends Controller
{
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
                    [
                        'allow' => true,
                        'actions' => ['main', 'create', 'update'],
                        'roles' => ['@'],
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

    /**
     * Lists all Profile models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProfileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Profile model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $modelScore = Score::findOne(['user_id' => $id]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'modelScore' => $modelScore,
        ]);
    }

    /**
     * Creates a new Profile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $modelProfile = new Profile();
        $modelScore = new Score();
        $modelProfile->user_id = Yii::$app->user->id;
        $modelScore->user_id = Yii::$app->user->id;
        if ($modelProfile->load(Yii::$app->request->post()) && $modelScore->load(Yii::$app->request->post())) {
            $modelScore->save();
            $modelProfile->save();

            return $this->goBack();
        } else {
            return $this->render('create', [
                'modelProfile' => $modelProfile,
                'modelScore' => $modelScore,
            ]);
        }
    }

    /**
     * Updates an existing Profile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->user_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Profile model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Profile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Profile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Profile::findOne($id)) !== null) {
            return $model;
        } else if ($id == Yii::$app->user->id) {

            //funckja jest wywoływana w actionMain() gdy na ifie trafi na false przekierowuje na strone do tworzenia profilu.
            //gdy tutaj było przekierowanie wyrzuca  błąd???
            return false;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    //printowanie wszystkich danych użytkowanika
    public function actionMain()
    {

        $modelProfile = $this->findModel(Yii::$app->user->id);
        $modelScore = Score::findOne(Yii::$app->user->id);
        $query = Choices::find()->where(['user_id' => Yii::$app->user->id]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        //sprawdzenie czy nie false z metody findmodel
        if ($modelProfile) {
            $modelChoices = new Choices();
            $modelChoices->points = Choices::pointsById(Yii::$app->user->id);
            $modelChoices->user_id = Yii::$app->user->id;
            //if sprawdza czy zapisać model wyboru kierunku
            if ($modelChoices->load(Yii::$app->request->post())) {
                $modelChoices->save();
            }

            return $this->render('main', [
                'modelProfile' => $modelProfile,
                'modelScore' => $modelScore,
                'dataProvider' => $dataProvider,
                'modelChoices' => $modelChoices,
            ]);
        } else {
            return $this->redirect(['create']);
        }
    }


}
