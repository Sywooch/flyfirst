<?php
use yii\widgets\ActiveForm;
use app\components\widgets\adminimagemanager\AdminImageFormWidget;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

/* @var $contry_model \common\sys\repository\landing\models\Country */
?>
Create Country
<div class="form-block-wrapper">
    <?php $form = ActiveForm::begin([
        'id' => 'continent_crate',
        'enableClientValidation' => true,
    ]) ?>

    <?= $form->field($country_model, 'id')->hiddenInput()->label(false) ?>
    <div class="col-md-4">
        <?= $form->field($country_model, 'name') ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($country_model, 'description')->textarea(['rows' => 4]) ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($country_model, 'keywords')->textarea(['rows' => 4]) ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($country_model, 'title') ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($country_model, 'alias') ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($country_model, 'capital_city') ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($country_model, 'first_class_price')->textInput([
            'type' => 'number'
        ]) ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($country_model, 'first_class_old_price')->textInput([
            'type' => 'number'
        ]) ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($country_model, 'business_class_price')->textInput([
            'type' => 'number'
        ]) ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($country_model, 'business_class_old_price')->textInput([
            'type' => 'number'
        ]) ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($country_model, 'continent_id')->dropDownList(ArrayHelper::map($continents, 'id', 'name'), ['prompt' => 'Select']); ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($country_model, 'summary')->textarea(['rows' => 10]) ?>
    </div>

    <?= $form->field($country_model, 'body')->widget(\dosamigos\ckeditor\CKEditor::className(), [
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

