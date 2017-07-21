<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\guest\GuestPlusOneSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Guest Plus Ones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guest-plus-one-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Guest Plus One', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_guest_plus_one',
            'id_guest',
            'quantity',
            'gender',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
