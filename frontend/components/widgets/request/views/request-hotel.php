<?php
/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \common\sys\models\request\RequestHotel */

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

?>
<div class="form-block-wrapper">
    <?php $form = ActiveForm::begin([
        'id' => 'request_hotel',
        'enableClientValidation' => true,
        'action' => '/request/hotel',
        'fieldConfig' => [
            'template' => "{input}",
        ],
    ]) ?>

    <div class="row row-1 hotel-checkin">
        <?= $form->field($model, 'hotel_checkin')->textInput(['placeholder' => 'City, airport, landmark, or address']) ?>
    </div>
    <div class="row row-2 check-in">
        <?= $form->field($model, 'check_in')->textInput(['placeholder' => 'Check in', 'class' => 'datepicker']) ?>
    </div>
    <div class="row row-3 check-out">
        <?= $form->field($model, 'check_out')->textInput(['placeholder' => 'Check out', 'class' => 'datepicker']) ?>
    </div>
    <div class="row row-4 rooms-number">
        <?= $form->field($model, 'rooms_number')->dropDownList(($rooms), ['prompt' => 'Rooms']); ?>
    </div>
    <div class="row row-5 adults-number">
        <?= $form->field($model, 'adults_number')->dropDownList(($adults), ['prompt' => 'Adults']); ?>
    </div>
    <div class="row row-6 children-number">
        <?= $form->field($model, 'children_number')->dropDownList(($children), ['prompt' => 'Children']); ?>
    </div>
    <div class="row row-7 name">
        <?= $form->field($model, 'name')->textInput(['placeholder' => 'Name*']) ?>
    </div>
    <div class="row row-8 email">
        <?= $form->field($model, 'email')->textInput(['placeholder' => 'Email*']) ?>
    </div>
    <div class="row row-9 phone">
        <?= $form->field($model, 'phone')->textInput(['placeholder' => 'Phone/Mobile*']) ?>
    </div>

    <div class="form-group form-action">
        <?= Html::submitButton('Get quote now', ['class' => 'submit', 'name' => 'hotel-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>