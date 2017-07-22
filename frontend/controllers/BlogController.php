<?php

namespace frontend\controllers;

use app\components\AppConfig;
use app\modules\imagemanager\models\Image;
use common\sys\repository\blog\models\BlogArticles;
use yii;
use common\sys\core\blog\BlogArticleInfoService;
use yii\web\HttpException;

class BlogController extends BaseController
{
    private $blog_info_service_repo;
    private function get_blog_info_service_repo()
    {
        if($this->blog_info_service_repo != null)
            return $this->blog_info_service_repo;
        $this->blog_info_service_repo = new BlogArticleInfoService();
        return $this->blog_info_service_repo;
    }

    public function actionIndex()
    {
        $alias = Yii::$app->request->getQueryParam('alias');

        $blog_article = BlogArticles::find()
            ->where(['alias' => $alias])
            ->one();

        if(!$blog_article)
            throw new HttpException(404, 'Page not found');

        $images = Image::find()
            ->where([
                'content_id' => $blog_article->id,
                'content_type_id' => AppConfig::Image_ContentType_BlogArticle,
                'content_field_id' => AppConfig::Image_ContentField_BlogArticle,
            ])
            ->asArray()
            ->all();

        $this->bodyClass = "blog-article-page";
        //meat tags
        Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $blog_article->description,
        ]);
        Yii::$app->view->registerMetaTag([
            'name' => 'keywords',
            'content' => $blog_article->keywords,
        ]);

        return $this->render('index', [
            'blog_article_model' => $blog_article,
            'images' => $images,
        ]);
    }

    public function actionList()
    {
        $this->bodyClass = "blog-page";
        //meat tags
        Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => '',
        ]);
        Yii::$app->view->registerMetaTag([
            'name' => 'keywords',
            'content' => '',
        ]);

        $blog_articles = $this->get_blog_info_service_repo()->BlogListDataProvider(20);

        return $this->render('list', [
            'blog_articles' => $blog_articles,
        ]);
    }
}