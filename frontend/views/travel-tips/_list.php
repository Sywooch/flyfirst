<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use \yii\helpers\Url;

$path_img =  Url::base().'/public/images/';
$path_img_thumbs =  Url::base().'/public/images/thumbs/';
?>
<div class="item">
    <a href="<?= Url::to(['travel-tips/index', 'alias' => $model['alias']]); ?>">
        <div class="item-inner">
            <div class="inner">
                <div class="back-slide">
                    <div class="back-slide-inner">
                        <img src="<?= $path_img. Html::encode($model['image_alias']) ?>" alt="<?= Html::encode($model['image_title']) ?>">
                    </div>
                </div>
                <div class="texture"></div>
                <div class="content">
                    <div class="title">
                        <?= Html::encode($model['name']) ?>
                    </div>
                    <div class="type">
                        travel tips
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>