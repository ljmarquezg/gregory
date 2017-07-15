<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\guest\GuestList */

$this->title = 'Update Guest List: ' . $model->id_list;
$this->params['breadcrumbs'][] = ['label' => 'Guest Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_list, 'url' => ['view', 'id' => $model->id_list]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="guest-list-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
