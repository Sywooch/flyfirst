<?php

namespace frontend\controllers;

use yii;

class StaticPageController extends BaseController
{
    public function actionAbout()
    {
        $this->bodyClass = "about-page";
        //meat tags
        Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => 'about'
        ]);
        Yii::$app->view->registerMetaTag([
            'name' => 'keywords',
            'content' => 'about'
        ]);

        return $this->render('about');
    }
}