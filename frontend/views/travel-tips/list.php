<?php
use yii\widgets\ListView;
use yii\helpers\Html;
use \yii\helpers\Url;

$path_img =  Url::base().'/public/images/';
$path_img_thumbs =  Url::base().'/public/images/thumbs/';

$this->title = 'Travel Tips';
?>
<div class="welcome-block-wrapper">
    <div class="welcome-block-inner" style="background-image: url('design/textures/travel-tips-texture.jpg')">
        <?= $this->render('@app/views/layouts/_header') ?>
        <div class="content-block-wrapper">
            <div class="content-block-inner">
                <h1>Most Popular Travel Tips</h1>
                <a href="/">Search flight</a>
            </div>
            <div class="travel-tips-wrapper border-box">
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
    </div>
</div>
<div class="page-content">
    <div class="page-content-inner border-box">
        <?php
        echo ListView::widget([
            'dataProvider' => $travel_tips_list,
            'options' => [
                'tag' => 'div',
                'class' => 'travel_tips_list',
                'id' => 'travel_tips_list',
            ],
            'layout' => "<div class='items'>{items}</div><div class='clearfix'></div>\n{pager}",
            'itemView' => '_list',
            'itemOptions' => [
                'tag' => false,
                //'class' => 'item'
            ],
            'pager' => [
                'prevPageLabel' => 'Back',
                'nextPageLabel' => 'Next',
            ],
        ]);
        ?>
    </div>
</div>