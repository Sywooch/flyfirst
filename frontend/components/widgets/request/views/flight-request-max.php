<?php
/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \common\sys\models\request\FlightRequestMax */

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

?>

<div class="form-flight-request-max-wrapper border-box">
    <div class="form-nav">
        <div class="tab-menu">
            <ul>
                <li class="border-box">
                    <a href="javascript:void(0)" class="active border-box" data-tab-li-id="tab-1">Round-trip</a>
                </li>
                <li class="border-box">
                    <a href="javascript:void(0)" data-tab-li-id="tab-2">One-way</a>
                </li>
                <li class="border-box">
                    <a href="javascript:void(0)" data-tab-li-id="tab-3">Multi-City</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="form-flight-request-max-inner">
        <div class="form-request-tab tab-round-trip active" data-tab-form="tab-1">
            <?php $form = ActiveForm::begin([
                'id' => 'flight_request_max_round_trip',
                'enableClientValidation' => true,
                'action' => '/request/flight',
                'fieldConfig' => [
                    'template' => "{input}",
                ],
            ]) ?>
            <div class="field-row from">
                <?= $form->field($model, 'from[]')->textInput(['placeholder' => 'From Airport or City*']) ?>
            </div>
            <div class="field-row to">
                <?= $form->field($model, 'to[]')->textInput(['placeholder' => 'To Airport or City*']) ?>
            </div>
            <div class="field-row field-data">
                <div class="depart">
                    <?= $form->field($model, 'dep_date[]')->textInput(['placeholder' => 'Depart', 'class' => 'datepicker', 'id' => 'dep-date-round-trip']) ?>
                </div>
                <div class="return">
                    <?= $form->field($model, 'arr_date[]')->textInput(['placeholder' => 'Return', 'class' => 'datepicker', 'id' => 'arr-date-round-trip']) ?>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="field-row field-block-wrapper cabin-class persones border-box">
                <div class="travelers-block">
                    <a href="javascript:void(0)" class="">
                        <span class="label-people">1 person</span>,
                        <span class="label-cabin-class">Business</span>
                        <span class="icon"></span>
                    </a>
                </div>
                <div class="travelers-content">
                    <div class="cabin-class border-box">
                        <label>Cabin</label>
                        <?= $form->field($model, 'cabin_class_name')->dropDownList(($cabin_class)); ?>
                    </div>
                    <div class="persones-block border-box">
                        <label>Person(s)</label>
                        <div class="number-persones border-box">
                            <div class="number">
                                <span class="minus"></span>
                                <span class="icon"></span>
                                <?= $form->field($model, 'people_number')->textInput(['value' => '1', 'size' => '1', 'readonly' => 'readonly']) ?>
                                <span class="plus"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contact-block-wrapper">
                <div class="field-row name">
                    <?= $form->field($model, 'name')->textInput(['placeholder' => 'Name*']) ?>
                </div>
                <div class="field-row email">
                    <?= $form->field($model, 'email')->textInput(['placeholder' => 'Email*']) ?>
                </div>
                <div class="field-row phone">
                    <?= $form->field($model, 'phone')->textInput(['placeholder' => 'Phone*']) ?>
                </div>
            </div>
            <div class="form-group form-action">
                <?= Html::submitButton('Request a Quote Now', ['class' => 'submit', 'name' => 'hotel-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
        <div class="form-request-tab tab-one-way" data-tab-form="tab-2">
            <?php $form = ActiveForm::begin([
                'id' => 'flight_request_max_one_way',
                'enableClientValidation' => true,
                'action' => '/request/flight',
                'fieldConfig' => [
                    'template' => "{input}",
                ],
            ]) ?>
            <div class="field-row from">
                <?= $form->field($model, 'from[]')->textInput(['placeholder' => 'From Airport or City*']) ?>
            </div>
            <div class="field-row to">
                <?= $form->field($model, 'to[]')->textInput(['placeholder' => 'To Airport or City*']) ?>
            </div>
            <div class="field-row field-data">
                <div class="depart">
                    <?= $form->field($model, 'dep_date[]')->textInput(['placeholder' => 'Depart', 'class' => 'datepicker', 'id' => 'dep-date-one-way']) ?>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="field-row field-block-wrapper cabin-class persones border-box">
                <div class="travelers-block">
                    <a href="javascript:void(0)" class="">
                        <span class="label-people">1 person</span>,
                        <span class="label-cabin-class">Business</span>
                        <span class="icon"></span>
                    </a>
                </div>
                <div class="travelers-content">
                    <div class="cabin-class border-box">
                        <label>Cabin</label>
                        <?= $form->field($model, 'cabin_class_name')->dropDownList(($cabin_class)); ?>
                    </div>
                    <div class="persones-block border-box">
                        <label>Person(s)</label>
                        <div class="number-persones border-box">
                            <div class="number">
                                <span class="minus"></span>
                                <span class="icon"></span>
                                <?= $form->field($model, 'people_number')->textInput(['value' => '1', 'size' => '1', 'readonly' => 'readonly']) ?>
                                <span class="plus"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contact-block-wrapper">
                <div class="field-row name">
                    <?= $form->field($model, 'name')->textInput(['placeholder' => 'Name*']) ?>
                </div>
                <div class="field-row email">
                    <?= $form->field($model, 'email')->textInput(['placeholder' => 'Email*']) ?>
                </div>
                <div class="field-row phone">
                    <?= $form->field($model, 'phone')->textInput(['placeholder' => 'Phone*']) ?>
                </div>
            </div>
            <div class="form-group form-action">
                <?= Html::submitButton('Request a Quote Now', ['class' => 'submit', 'name' => 'hotel-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
        <div class="form-request-tab tab-multi-city" data-tab-form="tab-3">
            <?php $form = ActiveForm::begin([
                'id' => 'flight_request_max_multi_city',
                'enableClientValidation' => true,
                'action' => '/request/flight',
                'fieldConfig' => [
                    'template' => "{input}",
                ],
            ]) ?>
            <div class="field-row from">
                <?= $form->field($model, 'from[]')->textInput(['placeholder' => 'From Airport or City*']) ?>
            </div>
            <div class="field-row to">
                <?= $form->field($model, 'to[]')->textInput(['placeholder' => 'To Airport or City*']) ?>
            </div>
            <div class="field-row field-data">
                <div class="depart">
                    <?= $form->field($model, 'dep_date[]')->textInput(['placeholder' => 'Depart', 'class' => 'datepicker', 'id' => 'dep-date-multi-city']) ?>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="field-row field-block-wrapper cabin-class persones border-box">
                <div class="travelers-block">
                    <a href="javascript:void(0)" class="">
                        <span class="label-people">1 person</span>,
                        <span class="label-cabin-class">Business</span>
                        <span class="icon"></span>
                    </a>
                </div>
                <div class="travelers-content">
                    <div class="cabin-class border-box">
                        <label>Cabin</label>
                        <?= $form->field($model, 'cabin_class_name')->dropDownList(($cabin_class)); ?>
                    </div>
                    <div class="persones-block border-box">
                        <label>Person(s)</label>
                        <div class="number-persones border-box">
                            <div class="number">
                                <span class="minus"></span>
                                <span class="icon"></span>
                                <?= $form->field($model, 'people_number')->textInput(['value' => '1', 'size' => '1', 'readonly' => 'readonly']) ?>
                                <span class="plus"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="destination-block-wrapper">
                <div class="destination-row" data-destination-id="1">
                    <div class="field-row from">
                        <?= $form->field($model, 'from[]')->textInput(['placeholder' => 'From Airport or City*']) ?>
                    </div>
                    <div class="field-row to">
                        <?= $form->field($model, 'to[]')->textInput(['placeholder' => 'To Airport or City*']) ?>
                    </div>
                    <div class="field-row field-data">
                        <div class="depart">
                            <?= $form->field($model, 'dep_date[]')->textInput(['placeholder' => 'Depart', 'class' => 'date-multi-city datepicker', 'id' => 'dep-date-multi-city-1']) ?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="remove-flight"></div>
                </div>
            </div>
            <div class="add-destination">
                <a href="#">Add Flight</a>
            </div>
            <div class="contact-block-wrapper">
                <div class="field-row name">
                    <?= $form->field($model, 'name')->textInput(['placeholder' => 'Name*']) ?>
                </div>
                <div class="field-row email">
                    <?= $form->field($model, 'email')->textInput(['placeholder' => 'Email*']) ?>
                </div>
                <div class="field-row phone">
                    <?= $form->field($model, 'phone')->textInput(['placeholder' => 'Phone*']) ?>
                </div>
            </div>
            <div class="form-group form-action">
                <?= Html::submitButton('Request a Quote Now', ['class' => 'submit', 'name' => 'hotel-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>