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

// set font
    $pdf->SetFont('dejavusans', '', 10);

// add a page
    $pdf->AddPage();

// print a line using Cell()

    $pdf->Cell(57, 0, iconv("cp1251", "utf-8", '1. Фамилия, имя, отчество'), 0, 0, 'L');

    $pdf->SetFont('dejavusans', 'U', 12);
    $pdf->Cell(0, 0, iconv("cp1251", "utf-8", str_pad(trim($_POST['person_name']), 44)), 0, 1, 'L');
    $pdf->Cell(0, 0, iconv("cp1251", "utf-8", str_pad(trim($_POST['person_name_old']), 91)), 0, 1, 'L');
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
