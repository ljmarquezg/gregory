<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\guest\Event */

$this->title = 'Update Event: ' . $model->id_event;
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_event, 'url' => ['view', 'id' => $model->id_event]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="event-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
