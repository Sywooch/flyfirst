<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use \yii\helpers\Url;

$path_img =  Url::base().'/public/images/';
$path_img_thumbs =  Url::base().'/public/images/thumbs/';
?>
<div class="item">
    <a href="<?= Url::to(['blog/index', 'alias' => $model['alias']]); ?>">
        <div class="item-inner">
            <div class="photo">
                <div class="back-slide">
                    <div class="back-slide-inner">
                        <img src="<?= $path_img_thumbs. Html::encode($model['image_alias']) ?>" alt="<?= Html::encode($model['image_title']) ?>">
                    </div>
                </div>
            </div>
            <div class="inner border-box">
                <div class="title">
                    <?= Html::encode($model['title']) ?>
                </div>
                <div class="summary">
                    <?php echo $model['summary']; ?>
                </div>
            </div>
        </div>
    </a>
</div>