<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\guest\GuestListSublist */

$this->title = $model->id_sublist;
$this->params['breadcrumbs'][] = ['label' => 'Guest List Sublists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guest-list-sublist-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_sublist], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_sublist], [
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
            'id_sublist',
            'id_list',
            'description',
        ],
    ]) ?>

</div>
