<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\guest\GuestStatus */

$this->title = 'Create Guest Status';
$this->params['breadcrumbs'][] = ['label' => 'Guest Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guest-status-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
