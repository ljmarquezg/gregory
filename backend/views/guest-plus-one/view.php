<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\guest\GuestPlusOne */

$this->title = $model->id_guest_plus_one;
$this->params['breadcrumbs'][] = ['label' => 'Guest Plus Ones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guest-plus-one-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_guest_plus_one' => $model->id_guest_plus_one, 'id_guest' => $model->id_guest], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_guest_plus_one' => $model->id_guest_plus_one, 'id_guest' => $model->id_guest], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_guest_plus_one',
            'id_guest',
            'quantity',
            'gender',
        ],
    ]) ?>

</div>
