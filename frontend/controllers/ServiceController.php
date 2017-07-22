<?php

namespace frontend\controllers;

use common\sys\core\traveltips\TravelTipsInfoService;
use yii;

class ServiceController extends BaseController
{
    public function actionHotel()
    {
        $travel_tips_info_service = new TravelTipsInfoService();

        $this->bodyClass = "hotels-page";
        //meat tags
        Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => 'hotels'
        ]);
        Yii::$app->view->registerMetaTag([
            'name' => 'keywords',
            'content' => 'hotels'
        ]);

        $random_travel_tips = $travel_tips_info_service->random_travel_tips(7);

        return $this->render('hotel', [
            'random_travel_tips' => $random_travel_tips,
        ]);
    }

    public function actionCorporateAccount()
    {
        $this->bodyClass = "corporate-accounts-page";
        //meat tags
        Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => 'corporate accounts'
        ]);
        Yii::$app->view->registerMetaTag([
            'name' => 'keywords',
            'content' => 'corporate accounts'
        ]);
        return $this->render('corporate-accounts');
    }
}