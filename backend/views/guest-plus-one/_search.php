<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\guest\GuestPlusOneSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="guest-plus-one-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_guest_plus_one') ?>

    <?= $form->field($model, 'id_guest') ?>

    <?= $form->field($model, 'quantity') ?>

    <?= $form->field($model, 'gender') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
