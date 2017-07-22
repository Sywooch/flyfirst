<?php
/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \common\sys\models\request\RequestCorporateAccounts */

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
?>
<div class="form-block-wrapper">
    <?php $form = ActiveForm::begin([
        'id' => 'request_corporate_accounts',
        'options' => [
            'class' => 'form-animate-label'
        ],
        'enableClientValidation' => true,
        'action' => '/request/corporate-account',
        'fieldConfig' => [
            'template' => "{input}\n{label}\n<span class=\"bar\"></span>",
        ],
    ]) ?>

    <div class="row row-1 name">
        <?= $form->field($model, 'name', [
            'labelOptions' => [ 'class' => 'mui-form-floating-label mui-form-floating-label-0'
            ]])
            ->textInput(['class' => 'mui-form-control mui-form-control-0']) ?>
    </div>
    <div class="row row-2 cell_phone">
        <?= $form->field($model, 'cell_phone', [
            'labelOptions' => [ 'class' => 'mui-form-floating-label mui-form-floating-label-1'
            ]])
            ->textInput(['class' => 'mui-form-control mui-form-control-1']) ?>
    </div>
    <div class="row row-3 email">
        <?= $form->field($model, 'email', [
            'labelOptions' => [ 'class' => 'mui-form-floating-label mui-form-floating-label-2'
            ]])
            ->textInput(['class' => 'mui-form-control mui-form-control-2']) ?>
    </div>
    <div class="row row-4 from">
        <?= $form->field($model, 'from', [
            'labelOptions' => [ 'class' => 'mui-form-floating-label mui-form-floating-label-3'
            ]])
            ->textInput(['class' => 'mui-form-control mui-form-control-3']) ?>
    </div>
    <div class="row row-5 to">
        <?= $form->field($model, 'to', [
            'labelOptions' => [ 'class' => 'mui-form-floating-label mui-form-floating-label-4'
            ]])
            ->textInput(['class' => 'mui-form-control mui-form-control-4']) ?>
    </div>
    <div class="row row-6 dep_date arr_date">
        <?= $form->field($model, 'dep_date', [
            'labelOptions' => [ 'class' => 'mui-form-floating-label mui-form-floating-label-5'
            ]])
            ->textInput(['class' => 'mui-form-control mui-form-control-5 datepicker', 'readonly' => 'true']) ?>

        <?= $form->field($model, 'arr_date', [
            'labelOptions' => [ 'class' => 'mui-form-floating-label mui-form-floating-label-6'
            ]])
            ->textInput(['class' => 'mui-form-control mui-form-control-6 datepicker', 'readonly' => 'true']) ?>
    </div>
    <div class="row row-7 fare">
        <?= $form->field($model, 'fare', [
            'labelOptions' => [ 'class' => 'mui-form-floating-label mui-form-floating-label-7'
            ]])
            ->textInput(['class' => 'mui-form-control mui-form-control-7']) ?>
    </div>
    <div class="row row-8 message">
        <?= $form->field($model, 'message', [
            'labelOptions' => [ 'class' => 'mui-form-floating-label mui-form-floating-label-8'
            ]])
            ->textInput(['class' => 'mui-form-control mui-form-control-8']) ?>
    </div>
    <div class="clearfix"></div>
    <div class="form-group form-action">
        <?= Html::submitButton('Submit a Quote Request', ['class' => 'submit', 'name' => 'corporate-accounts-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>