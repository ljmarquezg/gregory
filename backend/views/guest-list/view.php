<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\guest\GuestList */

$this->title = $model->id_list;
$this->params['breadcrumbs'][] = ['label' => 'Guest Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guest-list-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_list], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_list], [
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
            'id_list',
            'description',
            'id_guest',
        ],
    ]) ?>

</div>
