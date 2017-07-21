<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\guest\GuestPlusOne */

$this->title = 'Update Guest Plus One: ' . $model->id_guest_plus_one;
$this->params['breadcrumbs'][] = ['label' => 'Guest Plus Ones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_guest_plus_one, 'url' => ['view', 'id_guest_plus_one' => $model->id_guest_plus_one, 'id_guest' => $model->id_guest]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="guest-plus-one-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
