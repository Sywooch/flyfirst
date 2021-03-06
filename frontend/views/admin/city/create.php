<?php
use yii\widgets\ActiveForm;
use app\components\widgets\adminimagemanager\AdminImageFormWidget;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

/* @var $city_model \common\sys\repository\landing\models\City */
?>
Create City
<div class="form-block-wrapper">
    <?php $form = ActiveForm::begin([
        'id' => 'continent_crate',
        'enableClientValidation' => true,
    ]) ?>

    <?= $form->field($city_model, 'id')->hiddenInput()->label(false) ?>
    <div class="col-md-4">
        <?= $form->field($city_model, 'name') ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($city_model, 'description')->textarea(['rows' => 4]) ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($city_model, 'keywords')->textarea(['rows' => 4]) ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($city_model, 'title') ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($city_model, 'alias') ?>
    </div>
    <div class="col-md-4 price-block" style="float:left;">
        <?= $form->field($city_model, 'first_class_price')->textInput([
            'type' => 'number'
        ]) ?>
        <?= $form->field($city_model, 'first_class_old_price')->textInput([
            'type' => 'number'
        ]) ?>
        <?= $form->field($city_model, 'is_first_class_price_top')->checkbox(['uncheck' => '0'], false)->label('Show First Class in Price\'s Block') ?>
    </div>
    <div class="col-md-4 price-block" style="float:left;margin-left:10px;">
        <?= $form->field($city_model, 'business_class_price')->textInput([
            'type' => 'number'
        ]) ?>
        <?= $form->field($city_model, 'business_class_old_price')->textInput([
            'type' => 'number'
        ]) ?>
        <?= $form->field($city_model, 'is_business_class_price_top')->checkbox(['uncheck' => '0'], false)->label('Show Business Class in Price\'s Block') ?>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-4" style="float:left;">
        <?= $form->field($city_model, 'continent_id')->dropDownList(ArrayHelper::map($continents, 'id', 'name'), ['prompt' => 'Select']); ?>
    </div>
    <div class="col-md-4" style="float:left;margin-left:10px;">
        <?= $form->field($city_model, 'country_id')->dropDownList(ArrayHelper::map($countries, 'id', 'name'), ['prompt' => 'Select']); ?>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-6">
        <?= $form->field($city_model, 'summary')->textarea(['rows' => 10]) ?>
    </div>

    <?= $form->field($city_model, 'body')->widget(\dosamigos\ckeditor\CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'full'
    ]) ?>

    <div class="uploads_photo">
        <p class="center_data upload_title">Image</p>
        <?= AdminImageFormWidget::widget(
            [
                'config' => $img_params_poster['config'],
                'images' => $img_params_poster['images'],
            ]
        ); ?>
    </div>
    <?php echo count($errors) != 0 && isset($errors['image']) ? $errors['image'][0] : '' ; ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary btn-lg', 'name' => 'contact-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

