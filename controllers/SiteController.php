<?php

namespace app\controllers;

use app\models\RecoverPasswords;
use Yii;
use yii\base\DynamicModel;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\BUser;
use app\models\PasswordMail;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['login', 'logout', 'about', 'registration', 'main'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login', 'registration', 'recover', 'password'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout', 'main'],
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['about'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return BUser::isUserAdmin(Yii::$app->user->identity->username);
                        }
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */

    //automatyczne logowanie po rejestracji i "powitalny mail"
    public function actionRegistration()
    {
        $model = new BUser();

        try {
            if ($model->load(Yii::$app->request->post()) && $model->save()) {


                $login = new LoginForm($model->username, $model->password);
                $login->login();
                $model->trigger(BUser::EVENT_NEW_USER);
                return $this->goBack();
            } else {
                return $this->render('registration', [
                    'model' => $model,
                ]);
            }
        } catch (yii\db\IntegrityException $e) {
            return $this->goBack();
        }
    }


    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    //przekierowanie na my profile
    public function actionProfile()
    {
        return $this->render('profile');
    }

    public function actionPassword()
    {
        $model = new DynamicModel(['email','verifyCode']);
        $model->addRule(['email', 'verifyCode'], 'required');
        $model->addRule(['verifyCode'], 'captcha');


        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $user = BUser::findUserByEmail($model->email);
            if (!$user) {
                $model->email = "Wrong email";
                return $this->render('password', ['model' => $model]);
            } else {
                //do bazy token i dane, try/catch sprawdza czy ktoś po raz x nie wprowadza maila i updateuje rekort w bazie
                try {
                    $db = new RecoverPasswords();
                    $db->user_id = $user->id;
                    $db->token = RecoverPasswords::getToken();
                    $db->save(false);

                } catch (yii\db\IntegrityException $e) {
                    $db = RecoverPasswords::find()->where(['user_id'=> $user->id])->one();
                    $db->token= RecoverPasswords::getToken();
                    $db->save(false);
                }
                //mail
                $mail = new PasswordMail($model->email, $db->token);
                $mail->send();
                Yii::$app->session->setFlash('passwordFormSubmitted');
                return $this->refresh();
            }


        } else {
            return $this->render('password', ['model' => $model]);
        }
    }

    public function actionRecover()
    {
        $model = new DynamicModel(['newpassword', 'newpassword2']);
        $model->addRule(['newpassword','newpassword2'], 'required');

        $model->addRule(['newpassword','newpassword2'], function ($attribute, $params) use ($model){
           if($model->newpassword != $model->newpassword2){
               $model->addError($attribute,"Different Passwords");
           }
       });


        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $token = RecoverPasswords::findOne(['token' => Yii::$app->request->get('token')]);
            if ($token) {
                $buser = BUser::findOne(['id' => $token->user_id]);
                $buser->password = $model->newpassword;
                $buser ->save(false);
                $token->delete();
                $this->redirect(['site/login']);

            } else {

                $model->addError('newpassword', 'Invalid token');
                return $this->render('recover', ['model' => $model]);
            }


        } else {
            return $this->render('recover', ['model' => $model]);
        }
        return true;

    }
}
