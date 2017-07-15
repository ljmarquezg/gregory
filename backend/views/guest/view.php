<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\guest\Guest */

$this->title = $model->id_guest;
$this->params['breadcrumbs'][] = ['label' => 'Guests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guest-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_guest], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_guest], [
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
            'id_guest',
            /*[
                'attribute'=> 'id_list',
                'value' => 'idList.description',
            ],*/
            'id_list',
            'id_event',
            'token',
            'first_name',
            'middle_name',
            'last_name',
            'email:email',
            'address',
            'mailing_address',
            'phone',
            'guest_type',
            'gender',
            'aditional_information',
            'guest_status',
            'picture',
        ],
    ]) ?>

</div>
