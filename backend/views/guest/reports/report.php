<?php
use kartik\mpdf\Pdf;
 
// Privacy statement output demo
public function actionMpdfDemo1() {
    $pdf = new Pdf([
        'mode' => Pdf::MODE_CORE, // leaner size using standard fonts
        'content' => $this->renderPartial('privacy'),
        'options' => [
            'title' => 'Privacy Policy - Krajee.com',
            'subject' => 'Generating PDF files via yii2-mpdf extension has never been easy'
        ],
        'methods' => [
            'SetHeader' => ['Generated By: Krajee Pdf Component||Generated On: ' . date("r")],
            'SetFooter' => ['|Page {PAGENO}|'],
        ]
    ]);
    return $pdf->render();
}
?>