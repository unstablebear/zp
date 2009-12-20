<?php
if( ! defined( 'DATALIFEENGINE' ) ) {
    die( "Hacking attempt!" );
}

if( isset( $_POST['send'] ) ) {

    require_once ENGINE_DIR . '/modules/tcpdf/config/lang/eng.php';
    require_once ENGINE_DIR . '/modules/tcpdf/tcpdf.php';

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Nicola Asuni');
    $pdf->SetTitle('TCPDF Example 002');
    $pdf->SetSubject('TCPDF Tutorial');
    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// remove default header/footer
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);

// set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

//set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
    $pdf->setLanguageArray($l);

// ---------------------------------------------------------

    $pdf->AddPage();
    $style = array('width' => 0.3, 'cap' => 'butt', 'join' => 'miter', 'dash' => '', 'phase' => 0, 'color' => array(0, 0, 0));

    $pdf->Rect(16, 12, 25, 13, 'D', array('all' => $style));
    $pdf->Rect(41, 12, 25, 13, 'D', array('all' => $style));

    $pdf->SetFont('dejavusans', 'IB', 12);
    $pdf->Text(90, 17, iconv("cp1251", "utf-8", '                         ОЗП              '), 0);

    $pdf->SetFont('dejavusans', 'B', 10);
    $pdf->Text(57, 33, iconv("cp1251", "utf-8", 'ЗАЯВЛЕНИЕ О ВЫДАЧЕ ПАСПОРТА'), 0);

    $pdf->SetFont('dejavusans', '', 9);
    $pdf->Text(170, 27, iconv("cp1251", "utf-8", 'место для'), 0);
    $pdf->Text(168, 31, iconv("cp1251", "utf-8", 'фотографии'), 0);


    $pdf->SetFont('dejavusans', '', 9);
    $pdf->Text(16, 45, iconv("cp1251", "utf-8", '1. Фамилия, имя, отчество'), 0);

    $pdf->SetFont('dejavusans', '', 12);
    $pdf->Text(65, 45, iconv("cp1251", "utf-8", str_pad(trim($_POST['person_name']), 44)), 0);
    $pdf->Line(65, 46, 160, 46, $style);

    $pdf->Text(16, 53, iconv("cp1251", "utf-8", str_pad(trim($_POST['person_name_old']), 91)), 0);
    $pdf->Line(16, 54, 160, 54, $style);

    $pdf->SetFont('dejavusans', 'I', 7.5);
    $pdf->Text(30, 57, iconv("cp1251", "utf-8", 'если ранее имели другие фамилию, имя, отчество укажите их, когда меняли и где'), 0);


//    $pdf->Cell(0, 0, iconv("cp1251", "utf-8", str_pad(trim($_POST['person_name_old']) .
//            ', ' . trim($_POST['person_birthday']), 93)), 0, 1, 'L');
// ---------------------------------------------------------

//Close and output PDF document
    $pdf->Output('example_002.pdf', 'I');

}

$tpl->load_template( 'zagran_pasport.tpl' );
$tpl->copy_template = "<form method=\"post\" name=\"sendmail\" onsubmit=\"\" action=\"\">" . $tpl->copy_template .
        "<input name=\"send\" type=\"hidden\" value=\"send\" />
</form>";

$tpl->compile( 'content' );


?>
