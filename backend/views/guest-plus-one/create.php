<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\guest\GuestPlusOne */

$this->title = 'Create Guest Plus One';
$this->params['breadcrumbs'][] = ['label' => 'Guest Plus Ones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guest-plus-one-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
