<?php

namespace frontend\controllers;

use app\components\AppConfig;
use app\modules\imagemanager\models\Image;
use common\sys\repository\landing\models\Airline;
use common\sys\repository\landing\models\Continent;
use yii\web\HttpException;
use yii;

class AirlineController extends BaseController
{
    public function actionIndex()
    {
        $alias = Yii::$app->request->getQueryParam('alias');

        $airline = Airline::find()
            ->where(['alias' => $alias])
            ->one();

        if(!$airline)
            throw new HttpException(404, 'Page not found');

        $images = Image::find()
            ->where([
                'content_id' => $airline->id,
                'content_type_id' => AppConfig::Image_ContentType_Airline,
                'content_field_id' => AppConfig::Image_ContentField_Airline,
            ])
            ->asArray()
            ->all();

        $this->bodyClass = "airline-page landing-page";
        //meat tags
        Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $airline->description,
        ]);
        Yii::$app->view->registerMetaTag([
            'name' => 'keywords',
            'content' => $airline->keywords,
        ]);

        //sections
        $continents = Continent::find()
            ->select(['name', 'alias'])
            ->all();

        $airlines = Airline::find()
            ->select(['alias', 'name'])
            ->all();

        return $this->render('index', [
            'airline_model' => $airline,
            'images' => $images,
            'continents' => $continents,
            'airlines' => $airlines,
        ]);
    }
}