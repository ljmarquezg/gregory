<?php
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use backend\models\guest\Guest;
use backend\models\guest\GuestStatus;

$this->title = 'Guests';
$this->params['breadcrumbs'][] = $this->title;

$connection = Yii::$app->getDb();
$modelGuest = $connection->createCommand('SELECT COUNT(*) FROM guest_imported');
$countGuest = $modelGuest->queryScalar();

$modelGuestPlusOne = $connection->createCommand('SELECT COUNT(*) FROM guest_imported WHERE plus_one <> 0');
$countGuestPlusOne = $modelGuestPlusOne->queryScalar();

$countGuest = $countGuest+ $countGuestPlusOne;

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

$generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
$guestStatus = ArrayHelper::map(GuestStatus::find()->all(), 'id_guest_status', 'status');

Pjax::begin(['id'=>'guest-header']); ?>
<div class="guest-index">
    <div class="content full-row shadow">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-md-10 col-sm-8">
                    <h1><i class="ion-person-stalker ion fa" ></i><?= Html::encode($this->title) ?></h1>
                </div>
                <div class="col-md-2 col-sm-4">
                    <h3 class="text-center"> <?= $countGuestUnconfirmed + $countGuestConfirmed + $countGuestInterested + $countGuestDeclined . ' / ' . $countGuest; ?></h3>
                    <h6 class="text-center"> Total Registered</h6>
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
                        <?= round($countGuestUnconfirmedPorcent,2); ?>% / 100%
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
                        <?= round($countGuestConfirmedPorcent,2); ?>% / 100%
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
                    <span class="info-box-number"><?= $countGuestInterested;?> / <?=$countGuest; ?></span>
                    <div class="progress">
                        <div class="progress-bar" style="width: <?= $countGuestInterestedPorcent; ?>% "></div>
                    </div>
                    <span class="progress-description">
                        <?= round($countGuestInterestedPorcent, 2 ); ?>% / 100%
                    </span>
                </div>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="/guest/">
            <div class="info-box bg-red">
                <span class="info-box-icon"><i class="fa ion ion-android-close"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Declined</span>
                    <span class="info-box-number"><?= $countGuestDeclined;?> / <?=$countGuest; ?></span>
                    <div class="progress">
                        <div class="progress-bar" style="width: <?= $countGuestDeclinedPorcent; ?>% "></div>
                    </div>
                    <span class="progress-description">
                        <?= round($countGuestDeclinedPorcent,2); ?>% / 100%
                    </span>
                </div>
            </div>
            </a>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    <div class="col-xs-12">
        <div class="progress progress-sm active shadow">
            <div class="progress-bar progress-bar-gray progress-bar-striped" role="progressbar" aria-valuenow="<?= $countGuestUnconfirmedPorcent ?>40" aria-valuemin="0" aria-valuemax="100" style="width: <?= $countGuestUnconfirmedPorcent ?>%">
            </div>
            <div class="progress-bar progress-bar-aqua progress-bar-striped" role="progressbar" aria-valuenow="<?= $countGuestUnconfirmedPorcent ?>40" aria-valuemin="0" aria-valuemax="100" style="width: <?= $countGuestConfirmedPorcent ?>%">
            </div>
            <div class="progress-bar progress-bar-green progress-bar-striped" role="progressbar" aria-valuenow="<?= $countGuestUnconfirmedPorcent ?>40" aria-valuemin="0" aria-valuemax="100" style="width: <?= $countGuestInterestedPorcent ?>%">
            </div>
            <div class="progress-bar progress-bar-red progress-bar-striped" role="progressbar" aria-valuenow="<?= $countGuestUnconfirmedPorcent ?>40" aria-valuemin="0" aria-valuemax="100" style="width: <?= $countGuestDeclinedPorcent ?>%">
            </div>
        </div>
    </div>
    </div>
</div>
<?php Pjax::end(); ?>

<?= $this->render('_guestdata', [
    'searchModel' => $searchModel,
    'dataProvider' => $dataProvider,
    ]);
?>