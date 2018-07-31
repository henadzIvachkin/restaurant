<?php

namespace app\controllers;

use app\models\Feedback;
use app\models\Food;
use function React\Promise\all;
use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;
use app\controllers\AppController;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\Post;
use app\models\Subscribe;
use app\models\Reservation;
use yii\bootstrap\ActiveForm;

class SiteController extends AppController
{
    /**
     * {@inheritdoc}
     */

    public $layout = 'restaurant';

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
        $posts = Post::find()
            ->where(['status' => '1'])
            ->orderBy(['id' => SORT_DESC])
            ->limit(4)
            ->with('username')
            ->all();
        $breakfast = Food::find()
            ->where(['status' => '1', 'type' => 'breakfast'])
            ->orderBy(['id'=> SORT_DESC])
            ->one();

        $lunch = Food::find()
            ->where(['status' => '1', 'type' => 'lunch'])
            ->orderBy(['id'=> SORT_DESC])
            ->one();

        $dinner = Food::find()
            ->where(['status' => '1', 'type' => 'dinner'])
            ->orderBy(['id'=> SORT_DESC])
            ->one();



        return $this->render('index',
            [
                'posts' => $posts,
                'breakfast' => $breakfast,
                'lunch' => $lunch,
                'dinner' => $dinner,
            ]);
    }


    public function actionSubscribe(){

            $subscribe = new Subscribe();

            if(\Yii::$app->request->isAjax){
                if ($email = \Yii::$app->request->post('email')){
                    $subscribe->email = $email;
                    if($subscribe->validate()){
                        $subscribe->save();
                        return 'Success!';
                    } else
                    {
                        return json_encode($subscribe->errors);

                    }

                } else{
                    return 'Request error';
                }
            }
            return false;



    }


    public function actionReservation(){
        $reservation = new Reservation();

        if(\Yii::$app->request->isAjax){
            if ($data = \Yii::$app->request->post()){

                $reservation->day = $data['day'];
                $reservation->hour = $data['hour'];
                $reservation->full_name = $data['name'];
                $reservation->phone = $data['phone'];
                $reservation->persons = $data['persons'];

                if ($reservation->validate()){
                    $reservation->save();
                    return ('Success');
                } else {
                    return json_encode($reservation->errors);
                }
            } else{
                return false;
            }
        }
        return false;

    }



    public function actionFeedback(){
        $feedback = new Feedback();
        if(Yii::$app->request->isAjax)
        {
            if ($feedback->load(Yii::$app->request->post())){
                if ($feedback->validate()){
                    $feedback->save();
                    return ('Success');
                } else {
                    return json_encode($feedback->errors);
                }
            }


        }

        return false;

    }



    public function actionContact()
    {
        $feedback = new Feedback();

        if (Yii::$app->request->isAjax && $feedback->load(Yii::$app->request->post())) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($feedback);

        }

        return $this->render('contact', [
            'model' => $feedback,
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
}
