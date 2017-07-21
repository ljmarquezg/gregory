<?php
    $pdf = Yii::$app->pdf;
    $pdf->content = 'THis Is Sparta';
    return $pdf->render();
    exit;
   ?>