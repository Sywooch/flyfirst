<?php
/* @var $this yii\web\View */
/* @var $travel_tips_model \common\sys\repository\traveltips\models\TravelTips */

use yii\helpers\Html;
use \yii\helpers\Url;
use app\components\widgets\custom\BlogSidebarRight;

$path_img =  Url::base().'/public/images/';
$path_img_thumbs =  Url::base().'/public/images/thumbs/';

$this->title = $travel_tips_model->browser_title;
?>
<div class="welcome-block-wrapper section--header-parallax">
    <?= $this->render('@app/views/layouts/_header') ?>
    <div class="img-section" style="background-image:url(<?= $path_img. Html::encode($images[1]['alias']); ?>)"></div>
    <div class="welcome-block-inner single-header__content">
        <div class="texture"></div>
        <div class="content-block-wrapper">
            <div class="content-block-inner">
                <h1>
                    Flights to <span><?= Html::encode($travel_tips_model->title); ?></span>
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
                <div class="items">
                    <?php foreach($travel_tips_attactions as $item): ?>
                        <div class="item">
                            <div class="img-poster">
                                <img src="<?= $path_img. Html::encode($item['images'][0]['alias']); ?>" alt="<?= Html::encode($item['images'][0]['title']) ?>">
                            </div>
                            <div class="title">
                                <?= Html::encode($item['title']) ?>
                            </div>
                            <div class="body">
                                <?php echo $item['body']; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div id="sidebar-right" class="column">
                <?= BlogSidebarRight::widget() ?>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="random-travel-tips border-box">
        <div class="title">
            Another Travel Tips
        </div>
        <div class="items">
            <?php foreach($random_travel_tips as $item): ?>
                <div class="item">
                    <a href="<?= Url::to(['travel-tips/index', 'alias' => $item['alias']]); ?>">
                        <div class="item-inner">
                            <div class="inner">
                                <div class="back-slide">
                                    <div class="back-slide-inner">
                                        <img src="<?= $path_img. Html::encode($item['image_alias']) ?>" alt="<?= Html::encode($item['image_title']) ?>">
                                    </div>
                                </div>
                                <div class="texture"></div>
                                <div class="content">
                                    <div class="title">
                                        <?= Html::encode($item['name']) ?>
                                    </div>
                                    <div class="type">
                                        travel tips
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>