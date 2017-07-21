<html>
<head>
<title> Hello </title>
</head>
<body>
<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;//use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\select2\Select2;
use backend\models\guest\Guest;
use backend\models\guest\GuestStatus;
use kartik\export\ExportMenu;


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

$generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
?>

<?= GridView::widget([
    'autoXlFormat'=>true,
    'condensed'=>true,
    'dataProvider' => $dataProvider,
    //'filterModel' => $searchModel,
    'columns' => [
    ['class' => 'yii\grid\SerialColumn'],
[
        'attribute' => 'token',
        'format' => 'raw',
        'options'=>['style'=>'max-width:0px; width:80px;', 'allowClear' => true],
        'value' => function ($model) {
                $generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
                return '<div class="text-center"><img style="width:80px; height:30px;" src="data:image/png;base64,' . base64_encode($generatorPNG->getBarcode($model->token, $generatorPNG::TYPE_CODE_128)) . '"><br>'.$model->token.'</div>'/*<barcode code="'.$model->token.'" type="EAN13" height="0.66" text="1" />'*/;
        },
],
[
        'attribute' => 'guest_type',
],

'fullName',
//'first_name',
// 'middle_name',
// 'last_name',
//'email:email',
'phone',
'address',
//'mailing_address',
//'gender',
//'aditional_information',

[
        'attribute' => 'guest_status',
        'format' => 'raw',
        'options'=>['style'=>'width:50px;'],
        'value' => function ($model) {
            switch ($model->guest_status) {
            case 1:
                return '<p class="label label-default">Unconfirmed</p>';
                break;
            case 2:
                return '<p class="label label-primary">Confirmed</p>';
                break;
            case 3:
                return '<p class="label label-success">Interested</p>';
                break;
            case 4:
                return '<p class="label label-danger">Declined</p>';
                break;
        }
    },
],


//'picture',

['class' => 'yii\grid\ActionColumn'],
],
]);

?>

<div class="col-xs-12">
            <div class="row">
                <div class="col-xs-8">
                    <h1><i class="ion-person-stalker ion fa" ></i><?= Html::encode($this->title) ?></h1>
                </div>
                <div class="col-xs-4">
                    <h3 class="text-center"> <?=$countGuest; ?></h3>
                    <h6 class="text-center"> Total</h6>
                    <barcode code="978-0-9542246-0" type="EAN" height="0.66" text="1" />
                </div>
            </div>
        </div>

<h1>H1</h1>
</body>

</html>