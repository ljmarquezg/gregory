<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\guest\GuestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Guests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guest-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Guest', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            /*[
                'attribute'=> 'id_event',
                'value' => 'idEvent.event_title',
            ],*/
            /*[
                'attribute'=> 'id_list',
                'value' => 'idList.description',
            ],*/
            //'id_guest',
            //'id_list',
            
            'token',
            'guest_type',
            'fullName',
            //'first_name',
            // 'middle_name',
            // 'last_name',
             'email:email',
             'phone',
             //'address',
             'mailing_address',
             'gender',
             'aditional_information',
             'guest_status',
             'picture',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>