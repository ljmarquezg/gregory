<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\guest\GuestStatus */

$this->title = 'Update Guest Status: ' . $model->id_guest_status;
$this->params['breadcrumbs'][] = ['label' => 'Guest Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_guest_status, 'url' => ['view', 'id' => $model->id_guest_status]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="guest-status-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
