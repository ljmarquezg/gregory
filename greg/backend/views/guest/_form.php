<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
//use yii\base\Widget;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\datecontrol\DateControl;
use backend\models\customer\Customer;
use kartik\form\ActiveForm;
use kartik\file\FileInput;
use bupy7\cropbox\Cropbox;
use yii\imagine\Image;
use yii\web\JsExpression;

use backend\models\guest\Event;
use backend\models\guest\GuestList;
use backend\models\guest\Gender;
use backend\models\guest\GuestStatus;
/* @var $this yii\web\View */
/* @var $model backend\models\guest\Guest */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
$dataEvent = ArrayHelper::map(Event::find()->all(), 'id_event', 'event_title');
$dataList = ArrayHelper::map(GuestList::find()->all(), 'id_list', 'description');
$dataGender = ArrayHelper::map(Gender::find()->all(), 'id_gender', 'description');
$dataStatus = ArrayHelper::map(GuestStatus::find()->all(), 'id_guest_status', 'description');
?>


<div class="guest-form">

    <?php $form = ActiveForm::begin(); ?>

    <!--?= $form->field($model, 'id_guest')->textInput() ?-->

    <!--?= $form->field($model, 'id_list')->textInput() ?-->

     <!--?= $form->field($model, 'id_event')->textInput() ?-->

    <?= $form->field($model, 'id_event')->widget(Select2::classname(), [
    'data' => $dataEvent,
    'options' => ['placeholder' => 'Select a state ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
    ]);?>

    <?= $form->field($model, 'id_list')->widget(Select2::classname(), [
    'data' => $dataList,
    'options' => ['placeholder' => 'Select List ...'],
    'pluginOptions' => [
        'allowClear' => true,
        'value' => 1,
    ],
    ]);?>


    <?= $form->field($model, 'token')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'middle_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mailing_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'guest_type')->dropDownList([ 'Ms.' => 'Ms.', 'Mrs.' => 'Mrs.', 'Mr.' => 'Mr.', 'Dr.' => 'Dr.', 'Miss' => 'Miss', 'Prof.' => 'Prof.', 'Rev.' => 'Rev.', 'The Hon.' => 'The Hon.', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'gender')->widget(Select2::classname(), [
    'data' => $dataGender,
    'options' => ['placeholder' => 'Select Gender ...'],
    'pluginOptions' => [
        'allowClear' => true,
        'value' => 1,
    ],
    ]);?>

    <?= $form->field($model, 'aditional_information')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'guest_status')->widget(Select2::classname(), [
    'data' => $dataStatus,
    'options' => ['placeholder' => 'Select Gender ...'],
    'pluginOptions' => [
        'allowClear' => true,
        'value' => 1,
    ],
    ]);?>

    <!--?= $form->field($model, 'status')->textInput() ?-->
    <?= $form->field($model, 'picture')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
