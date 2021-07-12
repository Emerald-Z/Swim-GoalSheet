<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\{Swimmer, User};


class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
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
     * {@inheritdoc}
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

    public function actionSignup()
    {
        return $this->render('signup');
    }
    
     /**
     * Sign up as a coach
     *
     */
    public function actionSignup_coach()
    {
        $model = new Swimmer();
        $model->role = 'coach';
        $model->status = 'active';
        
        if ($model->load(Yii::$app->request->post())) {
            $model->coach_code = substr($model->first_name,0,1).$model->last_name.'-'.substr(md5(time()), 0 , 5); 
            if($model->save()){
                return $this->redirect('login');
            }
        }

        return $this->render('signup_coach', [
            'model' => $model,
        ]);
    }

    /**
     * Sign up as a swimmer
     *
     */
    public function actionSignup_swimmer()
    {
        $model = new Swimmer();
        $model->role = 'swimmer';
        $model->status = 'active';
        
        if ($model->load(Yii::$app->request->post())) {
            $coach = User::findOne(['coach_code' => $model->coach_code]);
            if($coach){
                $model->coach_id = $coach->id;
                if($model->save()){
                    return $this->redirect('login');
                }
            } else {
                $model->addError('coach_code', 'wrong coach code!');
            }
            
        }

        return $this->render('signup_swimmer', [
            'model' => $model,
        ]);
    }    

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if (Yii::$app->user->identity->role == 'coach') {
                $this->redirect(['goal/teamgoals']);
            } else {
                return $this->goHome();
            }
        }

        $model->password = '';
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

}
