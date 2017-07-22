<?php

/* @var $this yii\web\View */
/* @var $airline_model \common\sys\repository\landing\models\Airline */

use yii\helpers\Html;
use \yii\helpers\Url;
use app\components\widgets\custom\BlogSidebarRight;

$this->title = $airline_model->title;

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
                    Flights to <span><?= Html::encode($airline_model->name); ?></span>
                </h1>
                <h2>
                    <?= Html::encode($airline_model->title); ?>
                </h2>
            </div>
        </div>
        <div class="texture-bottom"></div>
    </div>
</div>
<div class="page-content">
    <div class="page-content-inner border-box">
        <div class="columns">
            <div id="content" class="column">
                <div class="summary-block">
                    <?php echo $airline_model->summary; ?>
                </div>
                <div class="body">
                    <?php echo $airline_model->body; ?>
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
                            Top Airlines Destination
                        </div>
                        <div class="description">
                            <ul>
                                <?php foreach($airlines as $item): ?>
                                    <li>
                                        <a href="<?= Url::to(['airline/index', 'alias' => $item->alias]); ?>"><?= Html::encode($item->name); ?></a>
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