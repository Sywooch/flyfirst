<?php
use \yii\helpers\Url;
?>
<div id="header-wrapper">
    <div class="header-inner border-box">
        <div class="logo">
            <a href="/">
                <div class="icon"></div>
                <span>FlyFirst</span>
            </a>
        </div>
        <div class="right-block">
            <a href="/">Search Flight</a>
        </div>
        <div class="nav-menu header-nav-menu border-box">
            <ul>
                <li class="drop">
                    <a href="javascript:void(0)">Services</a>
                    <ul>
                        <li>
                            <a href="#">Business Class</a>
                        </li>
                        <li>
                            <a href="#">First Class</a>
                        </li>
                        <li>
                            <a href="<?= Url::to(['service/corporate-account']); ?>">Corporate accounts</a>
                        </li>
                        <li>
                            <a href="<?= Url::to(['service/hotel']); ?>">Hotels</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?= Url::to(['blog/list']); ?>" class="<?php echo \Yii::$app->controller->id == 'blog' ? 'active' : ''; ?>">News <span class="bar"></span></a>
                </li>
                <li>
                    <a href="<?= Url::to(['travel-tips/list']); ?>" class="<?php echo \Yii::$app->controller->id == 'travel-tips' ? 'active' : ''; ?>">Travel tips <span class="bar"></span></a>
                </li>
                <li>
                    <a href="<?= Url::to(['static-page/about']); ?>" class="<?php echo \Yii::$app->controller->action->id == 'about' ? 'active' : ''; ?>">About Us <span class="bar"></span></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="header-inner-mobile border-box">
        <a href="javascript:void(0)" class="open-menu"></a>
        <div class="tel">
            <a href="#"></a>
        </div>
        <div class="logo">
            <a href="/">
                <div class="icon"></div>
                <span>FlyFirst</span>
            </a>
        </div>
        <div class="clearfix"></div>
        <div class="left-menu">
            <div class="left-menu-inner">
                <a href="javascript:void(0)" class="close-menu"></a>
                <div class="nav-menu">
                    <ul>
                        <li>
                            <a href="<?= Url::to(['blog/list']); ?>" class="<?php echo \Yii::$app->controller->id == 'blog' ? 'active' : ''; ?>">News <span class="bar"></span></a>
                        </li>
                        <li>
                            <a href="<?= Url::to(['travel-tips/list']); ?>" class="<?php echo \Yii::$app->controller->id == 'travel-tips' ? 'active' : ''; ?>">Travel tips <span class="bar"></span></a>
                        </li>
                        <li>
                            <a href="<?= Url::to(['static-page/about']); ?>" class="<?php echo \Yii::$app->controller->action->id == 'about' ? 'active' : ''; ?>">About Us <span class="bar"></span></a>
                        </li>
                        <li>
                            <a href="#">Business Class</a>
                        </li>
                        <li>
                            <a href="#">First Class</a>
                        </li>
                        <li>
                            <a href="<?= Url::to(['service/corporate-account']); ?>">Corporate accounts</a>
                        </li>
                        <li>
                            <a href="<?= Url::to(['service/hotel']); ?>">Hotels</a>
                        </li>
                    </ul>
                </div>
                <div class="tel">
                    <div class="icon"></div>
                    1 888 347 7817
                </div>
            </div>
        </div>
    </div>
</div>