<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;//use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\select2\Select2;
use backend\models\guest\Guest;
use backend\models\guest\GuestStatus;
use kartik\export\ExportMenu;
use kartik\editable\Editable;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\guest\GuestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

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
$gridColumns = [
[
        'attribute' => 'token',
        'format' => 'raw',
        'value' => function ($model) {
                $generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
                if ($model->token = NULL) {
                return '<div><img src="data:image/png;base64,' . base64_encode($generatorPNG->getBarcode($model->token, $generatorPNG::TYPE_CODE_128)) . '"><br>'.$model->token.'</div>';
                }
        },
],

    'guest_type',
    'fullName',
    'first_name',
    'middle_name',
    'last_name',
    'email:email',
    'phone',
    'address',
    'mailing_address',
    'gender',
    'aditional_information',
    //'guest_status',
]
?>
<div class="content full-row shadow">
<!-- /.col -->
<?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<p>
    <?= Html::a('Create Guest', ['create'], ['class' => 'btn btn-success']) ?>
</p>
<?php
echo Html::a('<i class="fa fa-file-pdf-o"></i> PDF', ['/guest/report'], [
    'class'=>'btn btn-default',
    'id'=>'exportPDF',
    'target'=>'_blank', 
    'data-toggle'=>'tooltip', 
    'title'=>'Will open the generated PDF file in a new window'
]);
 
echo ExportMenu::widget([
    'asDropdown' => true,
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns,
    'showConfirmAlert'=>true,
    'filename'=>'guestlist',
    'target' => ExportMenu::TARGET_BLANK,
    'exportConfig' => [
   // ExportMenu::FORMAT_TEXT => false,
   // ExportMenu::FORMAT_HTML=> false,
   // ExportMenu::FORMAT_CSV =>false,

        ExportMenu::FORMAT_PDF => [
        'label' => Yii::t('yii', 'Export PDF'),
        //'icon' => $isFa ? 'file-pdf-o' : 'floppy-disk',
        //'iconOptions' => ['class' => 'text-danger'],
        'linkOptions' => [],
        'options' => ['title' => Yii::t('yii', 'Portable Document Format')],
        //'alertMsg' => Yii::t('yii', 'The PDF export file will be generated for download.'),
        'mime' => 'application/pdf',
        'extension' => 'pdf',
        'writer' => 'PDF',
        ],
    ],
]);
?>

<?= GridView::widget([
    'autoXlFormat'=>true,
    'export'=>[
        'fontAwesome'=>true,
        'showConfirmAlert'=>false,
        'target'=>GridView::TARGET_BLANK
    ],
    'condensed'=>true,
    'responsive'=>true,
    'hover'=>true,
    'pjax'=>true,
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
    ['class' => '\kartik\grid\SerialColumn'],
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

[
        'attribute' => 'token',
        //'filterType'=>GridView::FILTER_SELECT2,
        'format' => 'raw',
        'options'=>['class'=>'select2-bootstrap', 'style'=>'max-width:150px; width:120px;', 'allowClear' => true],
        'value' => function ($model) {
                $generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
                return '<div class="text-center"><img style="width:100px; height:30px;" src="data:image/png;base64,' . base64_encode($generatorPNG->getBarcode($model->token, $generatorPNG::TYPE_CODE_128)) . '"><br>'.$model->token.'</div>';
        },
    //'filter'=>array( ""=>"Show all",  ArrayHelper::map(GuestStatus::find()->all(), 'id_guest_status', 'status')),
],


//'guest_type',
[
        'attribute' => 'guest_type',
        'filterType'=>GridView::FILTER_SELECT2,
        //'format' => 'raw',
        'options'=>['class'=>'select2-bootstrap', 'style'=>'max-width:150px; width:120px;', 'allowClear' => true],
        
        'filter'=>array( "" => "All" , ArrayHelper::map(Guest::find()->all(), 'guest_type', 'guest_type')),

           /*'value' => function ($model) {

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
    },*/
    //'filter'=>array( ""=>"Show all", "1"=>"U","2"=>"Confirmed", "3"=>"Interested","4"=>"Declined"),
],

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
 [
        'class' => 'kartik\grid\EditableColumn',
        'filter'=>array( ""=>"All",  ArrayHelper::map(GuestStatus::find()->all(), 'id_guest_status', 'status')),
        'filterType'=>GridView::FILTER_SELECT2,'options'=>['class'=>'select2-bootstrap', 'style'=>'max-width:150px; width:120px;', 'allowClear' => true],
        'attribute' => 'guest_status',
        'format' => 'raw',
        'value' => function($model, $key, $index) {

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
        'editableOptions' => function ($model, $key, $index){

            return [
            'pluginEvents'=>[
                    /*"editableChange"=>"function(val) { alert('Changed Value ' + val); }",*/
                    "editableSuccess"=>"function(val) { $('#guest-header').load(location.href + ' #guest-header>*', ''); }",
             ],

                'header' => Yii::t('yii', 'Status'),
                'format' => Editable::FORMAT_BUTTON,
                'inputType' => Editable::INPUT_DROPDOWN_LIST,
                'data' => [ArrayHelper::map(GuestStatus::find()->all(), 'id_guest_status', 'status')],
                'options' => [
                    'class' => 'form-control select2',
                    //'prompt' => Yii::t('yii', 'Select a status'),
                ],
                'editableValueOptions' => [
                    'class' => 'text-danger',
                ],
                'asPopover' => true,
                'placement' => \kartik\popover\PopoverX::ALIGN_LEFT,
            ];

        },
        'contentOptions'=>[
            'style'=>'min-width: 100px; padding-top: 10px; padding-bottom: 10px;'
        ],
    ],

//'picture',

['class' => '\kartik\grid\ActionColumn',
    'template' => '{download} {view} {update} {delete}',
    'buttons' => [
        'download' => function ($url) {
            return Html::a(
                '<span class="glyphicon glyphicon-arrow-download"></span>',
                $url, 
                [
                    'title' => 'Download',
                    'data-pjax' => '0',
                ]
            );
        },
    ],

],


],

]);

?>


<script type="text/javascript">
var actual = '/guest/report';

$('#exportPDF').on('click', function(){
    $(this).attr('href', '' + actual + '');
    var str = (window.location.href);
    //alert(str);
    var filter = str.substring(str.indexOf("?") + 0);
    //alert('this is filter: '+ filter);
    if (str = filter){
        //alert('Equal, No time to add');
    }else{
        $(this).attr('href', '' + actual + filter + '');
    }
    
    //alert(actual + filter );
})


</script>
<script type="text/javascript">
  $('select').select2();
</script>

<style>
.select2-container--krajee .select2-results__group{
    display: none;
}
</style>
</div>
