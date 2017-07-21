<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use backend\models\guest\Gender;
use backend\models\guest\Guest;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model backend\models\guest\GuestPlusOne */
/* @var $form yii\widgets\ActiveForm */
$dataList = ArrayHelper::map(Guest::find()->all(), 'id_guest', 'fullName');
$dataGender = ArrayHelper::map(Gender::find()->all(), 'id_gender', 'description');

?>

<div class="guest-plus-one-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_guest')->widget(Select2::classname(), [
    'data' => $dataList,
    'options' => ['placeholder' => 'Select Guest ...'],
    'pluginOptions' => [
        'allowClear' => true,
        'value' => 1,
    ]]);?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <!--?= $form->field($model, 'gender')->textInput() ?-->

    <?= $form->field($model, 'gender')->widget(Select2::classname(), [
    'data' => $dataGender,
    'options' => ['placeholder' => 'Select Gender ...'],
    'pluginOptions' => [
        'allowClear' => true,
        'value' => 1,
    ],
    ]);?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
