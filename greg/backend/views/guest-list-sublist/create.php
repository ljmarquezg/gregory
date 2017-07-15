<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\guest\GuestListSublist */

$this->title = 'Create Guest List Sublist';
$this->params['breadcrumbs'][] = ['label' => 'Guest List Sublists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guest-list-sublist-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
