<?php
use yii\widgets\ListView;
use yii\helpers\Html;

$this->title = 'Blog';

?>
<div class="welcome-block-wrapper section--header-parallax">
    <?= $this->render('@app/views/layouts/_header') ?>
    <div class="img-section" style="background-color: #0d47a1;"></div>
    <div class="welcome-block-inner single-header__content">
        <div class="content-block-wrapper">
            <div class="content-block-inner">
                <h1>
                    Good travel news
                </h1>
                <a href="/">Search flight</a>
            </div>
        </div>
    </div>
</div>
<div class="page-content">
    <div class="page-content-inner border-box">
            <?php
                echo ListView::widget([
                    'dataProvider' => $blog_articles,
                    'options' => [
                        'tag' => 'div',
                        'class' => 'blog_list',
                        'id' => 'blog_list',
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