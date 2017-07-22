<?php

use app\components\widgets\request\RequestHotel;
use yii\helpers\Html;
use \yii\helpers\Url;

$path_img =  Url::base().'/public/images/';
$path_img_thumbs =  Url::base().'/public/images/thumbs/';

$this->title = 'Cheap Rates On Hotels, Discounted Fares';
?>
<div class="welcome-block-wrapper">
    <?= $this->render('@app/views/layouts/_header') ?>
    <div class="img-section" style="background-image:url('/design/hotel-poster.jpg')"></div>
    <div class="welcome-block-inner single-header__content">
        <div class="texture"></div>
        <div class="content-block-wrapper">
            <div class="content-block-inner">
                <h1>
                    Hotel search
                </h1>
                <h2>
                    The Lowesr Prices on Business/First Class Guaranted
                </h2>
                <?= RequestHotel::widget() ?>
            </div>
        </div>
        <div class="texture-bottom"></div>
        <div class="specials-block single-header__meta">
            <div class="inner">
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
        <div class="random-travel-tips border-box">
            <div class="title">
                Top Travel Tips
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
            <div class="links">
                <a href="#">See all reviews</a>
            </div>
        </div>
    </div>
    <div class="bottom-block-wrapper">
        <div class="texture"></div>
        <div class="bottom-block-inner border-box">
            <div class="inner">
                <div class="title">
                    Search Business &amp; First Class Now
                </div>
                <a href="/" class="search-now">Search now</a>
            </div>
        </div>
    </div>
</div>