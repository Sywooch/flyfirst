<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use \yii\helpers\Url;
use app\components\widgets\custom\LandingListWidget;
use app\components\widgets\request\FlightRequestMax;

$this->title = 'FlyFirst';

$path_img =  Url::base().'/public/images/';
$path_img_thumbs =  Url::base().'/public/images/thumbs/';

?>

<div class="welcome-block-wrapper section--header-parallax">
    <?= $this->render('@app/views/layouts/_header') ?>
    <div class="img-section" style="background-image:url('design/FF-poster.jpg')"></div>
    <div class="welcome-block-inner single-header__content">
        <div class="texture"></div>
        <div class="content-block-wrapper">
            <div class="content-block-inner">
                <h1>Discounted Business Class Tickets</h1>
                <h2><span>Great Prices</span> - Outstanding Customer Service</h2>
                <?= FlightRequestMax::widget() ?>
            </div>
        </div>
        <div class="texture-bottom"></div>
    </div>
</div>
<div class="page-content">
    <script type="text/javascript">
        var page_h = document.documentElement.offsetHeight,
            welcomeBlockWrapper = document.getElementsByClassName("welcome-block-wrapper"),
            pageContent =  document.getElementsByClassName("page-content");
        welcomeBlockWrapper[0].setAttribute("style","height:"+(page_h - 130)+"px;");
        pageContent[0].setAttribute("style","margin-top:"+(page_h - 130)+"px;");
    </script>
    <div class="row-page row-page-1 specials-block-wrapper border-box">
        <div class="row-inner">
            <div class="texture"></div>
            <div class="continent-list-wrapper border-box">
                <div class="left-block">
                    <div class="title">
                        Recently Flights
                    </div>
                    <ul class="continents-items">
                        <li class="continent-item">
                            <a href="#" class="active" data-continent-id="0">World</a>
                        </li>
                        <?php foreach($continents as $continent_item): ?>
                            <li class="continent-item">
                                <a href="#" data-continent-id="<?= Html::encode($continent_item['id']) ?>"><?= Html::encode($continent_item['name']) ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="right-block border-box">
                    <div class="tel">
                        <div class="icon"></div>
                        1 888 347 7817
                    </div>
                    <div class="icon"></div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="cities-block-wrapper">
                <div class="cities-block" id="cities_list">
                    <ul class="city-items visible" data-current-continent="0">
                        <?php foreach($cities_random as $city_item): ?>
                            <li class="city-item">
                                <a href="<?= Url::to(['city/index', 'alias' => $city_item['alias']]); ?>">
                                    <div class="cities-li-inner">
                                        <div class="photo">
                                            <div class="back-slide">
                                                <div class="back-slide-inner">
                                                    <img src="<?= $path_img_thumbs. Html::encode($city_item['image_alias']) ?>" alt="<?= Html::encode($city_item['image_title']) ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="city-inner border-box">
                                            <div class="title">
                                                <?= Html::encode($city_item['name']) ?>
                                            </div>
                                            <div class="sub-title">
                                                Round trip / Business class
                                            </div>
                                            <div class="price-block">
                                                <div class="old">
                                                    $5,729
                                                </div>
                                                <div class="new">
                                                    $2,395
                                                </div>
                                            </div>
                                        </div>
                                        <div class="texture"></div>
                                    </div>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="bottom-block-wrapper">
                    <button class="show-more">Show more price</button>
                    <div class="texture"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row-page row-page-2 border-box">
        <div class="row-inner">
            <div class="left-block border-box">
                <div class="title">
                    Read Latest News
                </div>
                <div class="sub-title">
                    Lorem Ipsum is simply dummy text
                </div>
                <a href="#">View news</a>
            </div>
            <div class="right-block border-box">
                <div class="title">
                    Top travel-tips
                </div>
                <div class="sub-title">
                    Contrary to popular belief
                </div>
                <div class="items">
                    <?php foreach($random_travel_tips as $item): ?>
                        <div class="item">
                            <a href="<?= Url::to(['travel-tips/index', 'alias' => $item['alias']]); ?>">
                                <div class="back-slide">
                                    <div class="back-slide-inner">
                                        <img src="<?= $path_img. Html::encode($item['image_alias']) ?>" alt="<?= Html::encode($item['image_title']) ?>">
                                    </div>
                                </div>
                                <div class="body">
                                    <div class="texture"></div>
                                    <div class="inner">
                                        <div class="city">
                                            <?= Html::encode($item['name']) ?>
                                        </div>
                                        <div class="type">
                                            <span>travel tips</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="row-page row-page-3 border-box">
        <div class="row-inner">
            <div class="testimonials-list border-box">
                <div class="items">
                    <?php foreach($testimonials as $item): ?>
                        <div class="item">
                            <a href="http://www.shopperapproved.com/customer-review/iflyfirstclass.com/<?= Html::encode($item['shopperapproved_id']) ?>" onclick="window.open(this.href, '', 'scrollbars=1'); return false;">
                                <div class="photo" style="background-image: url(<?= $path_img. Html::encode($item['image_alias']) ?>)"></div>
                                <div class="info">
                                    <div class="author">
                                        <?= Html::encode($item['author']) ?>
                                    </div>
                                    <div class="address">
                                        <?= Html::encode($item['address']) ?>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="body">
                                    <?= Html::encode($item['body']) ?>
                                </div>
                                <div class="date">
                                    <div class="icon"></div>
                            <span>
                                <?= Html::encode($item['field_created_date']) ?>
                            </span>
                                </div>
                                <div class="rating">
                                    <div class="icon"></div>
                                    <?= Html::encode($item['rating']) ?>.0
                                </div>
                                <div class="clearfix"></div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="testimonials-bottom-block">
                <button class="show-more" onclick="readMoreTestimonials(this)">Show more testimonials</button>
                <script type="text/javascript">
                    function readMoreTestimonials(elem) {
                        var content = document.getElementsByClassName("testimonials-list"),
                            bottomBlock = document.getElementsByClassName("testimonials-bottom-block");
                        bottomBlock[0].classList.add('disable');
                        content[0].classList.add("active");
                    }
                </script>
            </div>
        </div>
    </div>
    <div class="row-page row-page-4 landing-block-wrapper border-box">
        <div class="row-inner landing-block-inner">
            <?= LandingListWidget::widget() ?>
        </div>
        <div class="landing-more-link">
            <a href="javascript:void(0)" onclick="readMoreLanding(this)">Show more desination</a>
            <div class="icon"></div>
            <script type="text/javascript">
                function readMoreLanding(elem) {
                    var content = document.getElementsByClassName("landing-block-inner"),
                        landingMoreLink = document.getElementsByClassName("landing-more-link");
                    landingMoreLink[0].classList.add('disable');
                    content[0].classList.add("visible");
                }
            </script>
        </div>
    </div>
</div>