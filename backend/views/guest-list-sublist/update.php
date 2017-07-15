<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\guest\GuestListSublist */

$this->title = 'Update Guest List Sublist: ' . $model->id_sublist;
$this->params['breadcrumbs'][] = ['label' => 'Guest List Sublists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_sublist, 'url' => ['view', 'id' => $model->id_sublist]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="guest-list-sublist-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
