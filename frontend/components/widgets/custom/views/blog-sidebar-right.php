<?php
use yii\helpers\Html;
use \yii\helpers\Url;
$path_img =  Url::base().'/public/images/';
$path_img_thumbs =  Url::base().'/public/images/thumbs/';
?>
<div class="blog-article">
    <div class="title">
        Our news
    </div>
    <div class="items">
        <?php foreach($blogs as $item): ?>
            <div class="item">
                <div class="back-slide">
                    <div class="back-slide-inner">
                        <a href="<?= Url::to(['blog/index', 'alias' => $item['alias']]); ?>">
                            <img src="<?= $path_img_thumbs. Html::encode($item['images'][0]['alias']) ?>" alt="<?= Html::encode($item['images'][0]['title']) ?>">
                        </a>
                    </div>
                </div>
                <div class="title">
                    <a href="<?= Url::to(['blog/index', 'alias' => $item['alias']]); ?>">
                        <?= Html::encode($item['title']) ?>
                    </a>
                </div>
                <div class="summary">
                    <?php echo $item['summary']; ?>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="link">
            <a href="#" class="border-box">See all reviews</a>
        </div>
    </div>
</div>