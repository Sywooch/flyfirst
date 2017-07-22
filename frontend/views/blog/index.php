<?php
/* @var $this yii\web\View */
/* @var $blog_article_model \common\sys\repository\blog\models\BlogArticles */

use yii\helpers\Html;
use \yii\helpers\Url;
use app\components\widgets\custom\BlogSidebarRight;

$this->title = $blog_article_model->title;

$path_img =  Url::base().'/public/images/';
$path_img_thumbs =  Url::base().'/public/images/thumbs/';
?>
<div class="welcome-block-wrapper section--header-parallax">
    <?= $this->render('@app/views/layouts/_header') ?>
    <div class="img-section" style="background-image:url(<?= $path_img. Html::encode($images[1]['alias']); ?>)"></div>
    <div class="welcome-block-inner single-header__content">
        <div class="texture"></div>
        <div class="content-block-wrapper">
            <div class="content-block-inner">
                <h1>
                    Flights to <span><?= Html::encode($blog_article_model->title); ?></span>
                </h1>
                <a href="/">Search flight</a>
            </div>
        </div>
        <div class="texture-bottom"></div>
    </div>
</div>
<div class="page-content">
    <div class="page-content-inner border-box">
        <div class="columns">
            <div id="content" class="column">
                <div class="body">
                    <?php echo $blog_article_model->body; ?>
                </div>
                <div class="summary-block border-box">
                    <?php echo $blog_article_model->summary; ?>
                </div>
            </div>
            <div id="sidebar-right" class="column">
                <?= BlogSidebarRight::widget() ?>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>