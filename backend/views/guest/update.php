<?php

use yii\helpers\Html;
use backend\models\guest\Guest;
use backend\models\guest\GuestPlusOne;
/* @var $this yii\web\View */
/* @var $model backend\models\guest\Guest */

$this->title = 'Update Guest: ' . $model->id_guest;
$this->params['breadcrumbs'][] = ['label' => 'Guests', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_guest, 'url' => ['view', 'id' => $model->id_guest]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="guest-update">

    <h1><?= Html::encode($this->title) ?></h1>

    		<?php 
    		$generator = new Picqer\Barcode\BarcodeGeneratorHTML();
    		$generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
    		$name = str_pad(ord ($model->first_name), 3 , "0");
            $lastname = str_pad(ord ($model->last_name), 3 , "0");
            $countGuest = Guest::find()->count();
            $countGuest = $countGuest+1;
            $countGuestPlusOne = GuestPlusOne::find()->where(['id_guest' => $model->id_guest])->count();
            $countGuest = str_pad(($countGuest.$countGuestPlusOne), 3 , "0");
            echo 'Plus Ones: '. $countGuestPlusOne. '<br>';
			$token = $name.$lastname.$countGuest;

/*
            echo '<div style="max-width:120px">'.$generator->getBarcode($token, $generator::TYPE_CODE_128)."</div> <br>";
            echo '<img style="width:120px; height:50px;" src="data:image/png;base64,' . base64_encode($generatorPNG->getBarcode($token, $generatorPNG::TYPE_CODE_128)) . '">';
*/
            echo $token;
            ?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
