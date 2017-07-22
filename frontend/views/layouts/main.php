<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|Open+Sans:300,400,700,800|Overpass:400|Fira+Sans+Condensed:400|Open+Sans+Condensed:700" rel="stylesheet" type="text/css">
    <?php $this->head() ?>
</head>
<body class="<?= $this->context->bodyClass; ?>">
<?php $this->beginBody() ?>
<div id="page-wrapper">
    <?= $this->render('@app/views/layouts/header') ?>
    <div id="page">
        <?= $content ?>
        <div class="push"></div>
    </div>
</div>
<?= $this->render('@app/views/layouts/footer') ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
