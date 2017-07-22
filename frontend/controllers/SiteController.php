<?php
namespace frontend\controllers;

use app\components\AppConfig;
use app\modules\imagemanager\models\Image;
use common\sys\core\landing\CityInfoService;
use common\sys\core\landing\ContinentInfoService;
use common\sys\core\testimonials\TestimonialsInfoService;
use common\sys\core\traveltips\TravelTipsInfoService;
use Yii;
use yii\base\InvalidParamException;
use yii\helpers\Json;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends BaseController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
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
            /*[
                'class' => 'yii\filters\PageCache',
                'only' => ['index'],
                'duration' => 60,
                'dependency' => [
                    'class' => 'yii\caching\DbDependency',
                    'sql' => 'SELECT MAX(update_date) FROM city',
                ],
            ],*/
            /*[
                'class' => 'yii\filters\HttpCache',
                'only' => ['index'],
                'lastModified' => function ($action, $params) {
                    $q = new \yii\db\Query();
                    $update_date = $q->from('city')->max('update_date');
                    $date = new \DateTime($update_date);
                    return $date->format('U');
                },
            ],*/
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

    public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $this->bodyClass = "front-page flight-request-max";
        //meat tags
        Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => 'Description of the page...'
        ]);
        Yii::$app->view->registerMetaTag([
            'name' => 'keywords',
            'content' => 'FlyFirst'
        ]);

        $continent_info_service = new ContinentInfoService();
        $citi_info_service = new CityInfoService();
        $testimonials_info_service = new TestimonialsInfoService();
        $travel_tips_info_service = new TravelTipsInfoService();

        $continents = $continent_info_service->select_continent_to_form();
        $cities_random = $citi_info_service->get_random_cities(20);
        $testimonials = $testimonials_info_service->get_testimonials_is_top(20);
        $random_travel_tips = $travel_tips_info_service->random_travel_tips(5);

        return $this->render('index', [
            'continents' => $continents,
            'cities_random' => $cities_random,
            'testimonials' => $testimonials,
            'random_travel_tips' => $random_travel_tips,
        ]);
    }

    public function actionCities()
    {
        $citi_info_service = new CityInfoService();
        $cities_random = $citi_info_service->get_random_cities(20);

        return $this->renderAjax('_cities', ['cities_random' => $cities_random]);
    }

    public function actionContinents()
    {
        $continent_info_service = new ContinentInfoService();
        $citi_info_service = new CityInfoService();
        $continents = $continent_info_service->select_continent_to_form();
        foreach($continents as $key => &$item)
        {
            $item['cities'] = $citi_info_service->get_cities_info_by_continent_id($item['id']);
        }

        return $this->renderAjax('_continents', ['continents' => $continents]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
