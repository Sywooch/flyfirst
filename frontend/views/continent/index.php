<?php
/* @var $this yii\web\View */
/* @var $continent_model \common\sys\repository\landing\models\Continent */

use yii\helpers\Html;
use \yii\helpers\Url;
use app\components\widgets\custom\BlogSidebarRight;

$this->title = $continent_model->title;

$path_img =  Url::base().'/public/images/';
$path_img_thumbs =  Url::base().'/public/images/thumbs/';
?>
<div class="welcome-block-wrapper section--header-parallax" style="height: 100vh;">
    <?= $this->render('@app/views/layouts/_header') ?>
    <div class="img-section" style="background-image:url(<?= $path_img. Html::encode($images[1]['alias']); ?>)"></div>
    <div class="welcome-block-inner single-header__content">
        <div class="texture"></div>
        <div class="content-block-wrapper">
            <div class="content-block-inner">
                <h1>
                    Flights to <span><?= Html::encode($continent_model->name); ?></span>
                </h1>
                <h2>
                    <?= Html::encode($continent_model->title); ?>
                </h2>
            </div>
        </div>
        <div class="texture-bottom"></div>
        <div class="specials-block single-header__meta">
            <div class="inner">
                <div class="left-block">
                    <div class="title">
                        Special Offer to <?= Html::encode($continent_model->name); ?>
                    </div>
                    <div class="column column-1">
                        <div class="column-title">
                            Business Class
                        </div>
                        <div class="l">
                            Price <span class="old">$4365</span>
                        </div>
                        <div class="r">
                            from <span class="new">$<?= Html::encode($continent_model->business_class_price); ?></span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="column column-2">
                        <div class="column-title">
                            First Class
                        </div>
                        <div class="l">
                            Price <span class="old">$4365</span>
                        </div>
                        <div class="r">
                            from <span class="new">$<?= Html::encode($continent_model->first_class_price); ?></span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="right-block">
                    <div class="icon"></div>
                    <div class="info">
                        <div class="t">
                            To speak to a live agent
                        </div>
                        <div class="b">
                            1 888 347 7817
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<div class="page-content">
    <div class="page-content-inner border-box">
        <div class="columns">
            <div id="content" class="column">
                <div class="summary-block">
                    <?php echo $continent_model->summary; ?>
                </div>
                <div class="body">
                    <?php echo $continent_model->body; ?>
                </div>
                <div class="sections">
                    <div class="column column-1">
                        <div class="title">
                            Continent
                        </div>
                        <div class="description">
                            <ul>
                                <?php foreach($continents as $item): ?>
                                    <li>
                                        <a href="<?= Url::to(['continent/index', 'alias' => $item->alias]); ?>"><?= Html::encode($item->name); ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="column column-2">
                        <div class="title">
                            Top <?= Html::encode($continent_model->name); ?> Destination
                        </div>
                        <div class="description">
                            <ul>
                                <?php foreach($countries as $item): ?>
                                    <li>
                                        <a href="<?= Url::to(['country/index', 'alias' => $item->alias]); ?>"><?= Html::encode($item->name); ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div id="sidebar-right" class="column">
                <?= BlogSidebarRight::widget() ?>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="bottom-block-wrapper">
    <div class="bottom-block-inner border-box">
        <div class="title">
            Search Discount Flight to <?= Html::encode($continent_model->name); ?>
        </div>
        <a href="javascript:void(0)" class="search-now link-scroll-top-page">Search now</a>
    </div>
</div>
