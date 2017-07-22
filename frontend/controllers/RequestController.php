<?php

namespace frontend\controllers;

use common\sys\models\request\FlightRequestMax;
use common\sys\models\request\RequestCorporateAccounts;
use common\sys\models\request\RequestHotel;
use yii;

class RequestController extends BaseController
{
    public function actionFlight()
    {
        //meat tags
        Yii::$app->view->registerMetaTag([
            'name' => 'robots',
            'content' => 'noindex, follow'
        ]);

        $flight_request_max_model = new FlightRequestMax();
        if ($flight_request_max_model->load(Yii::$app->request->post())) {
            print_r($_POST);
            die();
        }
    }

    public function actionHotel()
    {
        //meat tags
        Yii::$app->view->registerMetaTag([
            'name' => 'robots',
            'content' => 'noindex, follow'
        ]);

        $hotel_model = new RequestHotel();
        if ($hotel_model->load(Yii::$app->request->post())) {
            $isValid = $hotel_model->validate();
            if ($isValid) {
                if ($hotel_model->sendEmailRequestHotel(Yii::$app->params['adminEmail'], $hotel_model)) {
                    $this->bodyClass = "accept-page";
                    return $this->render('accepted');
                }

                return $this->render('rejected');
            } else {
                $err = array();
                $err = array_merge($hotel_model->errors);
                $errors = $err;
                $this->bodyClass = "rejected-page";
                return $this->render('rejected', [
                    'errors' => $errors,
                ]);
            }
        }
    }

    public function actionCorporateAccount()
    {
        //meat tags
        Yii::$app->view->registerMetaTag([
            'name' => 'robots',
            'content' => 'noindex, follow'
        ]);

        $model = new RequestCorporateAccounts();
        if ($model->load(Yii::$app->request->post())) {
            $isValid = $model->validate();
            if ($isValid) {
                if ($model->sendEmailRequestCorporateAccount(Yii::$app->params['adminEmail'], $model)) {
                    $this->bodyClass = "accept-page";
                    return $this->render('accepted');
                }

                return $this->render('rejected');
            } else {
                $err = array();
                $err = array_merge($model->errors);
                $errors = $err;
                $this->bodyClass = "rejected-page";
                return $this->render('rejected', [
                    'errors' => $errors,
                ]);
            }
        }
    }
}