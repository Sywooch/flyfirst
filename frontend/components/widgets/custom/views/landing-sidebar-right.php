<?php
/* @var $testimonial \common\sys\repository\testimonials\models\Testimonials*/

use yii\helpers\Html;
use \yii\helpers\Url;
?>
<div class="testimonials-block">
    <div class="testimonials-block-inner border-box">
        <div class="author">
            <?= Html::encode($testimonial->author); ?>
        </div>
        <div class="rating">
            <?php for($i = 1; $i <= $testimonial['rating']; $i++) { ?>
                <div class="i"></div>
            <?php } ?>
        </div>
        <div class="address">
            <?= Html::encode($testimonial->address); ?>
        </div>
        <div class="clearfix"></div>
        <div class="body">
            <?= Html::encode($testimonial->body); ?>
        </div>
        <div class="date">
            <?= Html::encode($testimonial->field_created_date); ?>
        </div>
        <div class="link">
            <a href="#" class="border-box">See all reviews</a>
        </div>
        <div class="hover-block">
            <div class="icon-1"></div>
            <div class="icon-2"></div>
        </div>
    </div>
</div>
<div class="contacts-block border-box">
    <div class="title">
        Call Us Now
    </div>
    <div class="column tel">
        <div class="t-1">
            Mob.:
        </div>
        <div class="t-2">
            1 888 347 7817
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="column fax">
        <div class="t-1">
            Fax.:
        </div>
        <div class="t-2">
            1 888 671 6403
        </div>
        <div class="clearfix"></div>
    </div>
</div>