<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\guest\GuestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Guests';
$this->params['breadcrumbs'][] = $this->title;
$connection = Yii::$app->getDb();
$modelGuest = $connection->createCommand('SELECT COUNT(*) FROM guest');
$countGuest = $modelGuest->queryScalar();

$modelGuestUnconfirmed = $connection->createCommand('SELECT COUNT(*) FROM guest WHERE guest_status = 1');
$countGuestUnconfirmed = $modelGuestUnconfirmed->queryScalar();
$countGuestUnconfirmedPorcent = ($countGuestUnconfirmed / $countGuest ) * 100;

$modelGuestConfirmed = $connection->createCommand('SELECT COUNT(*) FROM guest WHERE guest_status = 2');
$countGuestConfirmed = $modelGuestConfirmed->queryScalar();
$countGuestConfirmedPorcent = ($countGuestConfirmed / $countGuest ) * 100;

$modelGuestInterested = $connection->createCommand('SELECT COUNT(*) FROM guest WHERE guest_status = 3');
$countGuestInterested = $modelGuestInterested->queryScalar();
$countGuestInterestedPorcent = ($countGuestInterested / $countGuest ) * 100;

$modelGuestDeclined = $connection->createCommand('SELECT COUNT(*) FROM guest WHERE guest_status = 4');
$countGuestDeclined = $modelGuestDeclined->queryScalar();
$countGuestDeclinedPorcent = ($countGuestDeclined / $countGuest ) * 100;

?>

<div class="guest-index">
<?php /* <div class="row">
    <div class="col-xs-12">
        <div class="row">
            <div class="col-xs-10">
                <h1><i class="ion-person-stalker ion fa" ></i><?= Html::encode($this->title) ?></h1>
            </div>
            <div class="col-xs-2">
                <h3 class="text-center"> <?=$countGuest; ?></h3>
                <h6 class="text-center"> Total</h6>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-gray">
            <span class="info-box-icon"><i class="fa ion ion-android-remove"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Unconfirmed</span>
                <span class="info-box-number"><?= $countGuestUnconfirmed;?> / <?=$countGuest; ?></span>

                <div class="progress">
                    <div class="progress-bar" style="width: <?= $countGuestUnconfirmedPorcent; ?>% "></div>
                </div>
                <span class="progress-description">
                    <?= $countGuestUnconfirmedPorcent; ?>% / 100%
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fa ion ion-android-done-all"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Confirmed</span>
                <span class="info-box-number"><?= $countGuestConfirmed;?> / <?=$countGuest; ?></span>
                <div class="progress">
                    <div class="progress-bar" style="width: <?= $countGuestConfirmedPorcent; ?>% "></div>
                </div>
                <span class="progress-description">
                    <?= $countGuestConfirmedPorcent; ?>% / 100%
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fa ion ion-android-done"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Interested</span>
                <span class="info-box-number"><?= $countGuestConfirmed;?> / <?=$countGuest; ?></span>
                <div class="progress">
                    <div class="progress-bar" style="width: <?= $countGuestConfirmedPorcent; ?>% "></div>
                </div>
                <span class="progress-description">
                    <?= $countGuestConfirmedPorcent; ?>% / 100%
                </span>
            </div>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-red">
            <span class="info-box-icon"><i class="fa ion ion-android-close"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Declined</span>
                <span class="info-box-number"><?= $countGuestDeclined;?> / <?=$countGuest; ?></span>
                <div class="progress">
                    <div class="progress-bar" style="width: <?= $countGuestDeclinedPorcent; ?>% "></div>
                </div>
                <span class="progress-description">
                    <?= $countGuestDeclinedPorcent; ?>% / 100%
                </span>
            </div>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
</div>

<div class="col-xs-12">
    <div class="progress shadow">
        <div class="progress-bar progress-bar-gray progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?= $countGuestUnconfirmedPorcent ?>%">
        </div>
        <div class="progress-bar progress-bar-aqua progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?= $countGuestConfirmedPorcent ?>%">
        </div>
        <div class="progress-bar progress-bar-green progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?= $countGuestInterestedPorcent ?>%">
        </div>
        <div class="progress-bar progress-bar-red progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?= $countGuestDeclinedPorcent ?>%">
        </div>
    </div>
</div>
</div>

<!-- /.col -->
<?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<!--p>
    <?= Html::a('Create Guest', ['create'], ['class' => 'btn btn-success']) ?>
</p-->
*/?>
<div style="display: flex; max-width: 280px; background-color: gray;">
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

//'token',
//'guest_type',
'fullName',
//'first_name',
// 'middle_name',
// 'last_name',
//'email:email',
//'phone',
//'address',
//'mailing_address',
//'gender',
//'aditional_information',
//'guest_status',
//'picture',

//['class' => 'yii\grid\ActionColumn'],
],
]); ?>
</div>
</div>
<div style="flex"