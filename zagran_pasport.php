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

    $pdf->SetFont('dejavusans', '', 9);
    $pdf->Text(16, 64, iconv("cp1251", "utf-8", '2. Число, месяц, год рождения'), 0);

    $pdf->SetFont('dejavusans', '', 12);
    $pdf->SetXY(72, 60);
    $pdf->Cell(92, 0, iconv("cp1251", "utf-8", trim($_POST['person_birthday'])), 0, 1, 'C');
    $pdf->Line(72, 65, 160, 65, $style);

    $pdf->SetFont('dejavusans', '', 9);
    $pdf->Text(16, 69, iconv("cp1251", "utf-8", '3. Пол'), 0);

    $pdf->SetFont('dejavusans', '', 12);
    $pdf->SetXY(30, 66);
    $pdf->Cell(28, 0, iconv("cp1251", "utf-8", trim($_POST['person_sex'])), 0, 1, 'C');
    $pdf->Line(30, 71, 60, 71, $style);

    $pdf->SetFont('dejavusans', '', 9);
    $pdf->Text(16, 79, iconv("cp1251", "utf-8", '4. Место рождения'), 0);

    $pdf->SetFont('dejavusans', '', 12);
    $pdf->SetXY(50, 75);
    $pdf->Cell(150, 0, iconv("cp1251", "utf-8", trim($_POST['person_birth_address'])), 0, 1, 'L');
    $pdf->Line(50, 80, 195, 80, $style);

    $pdf->SetFont('dejavusans', 'I', 7.5);
    $pdf->Text(92, 83, iconv("cp1251", "utf-8", 'республика, край, область, населённый пункт'), 0);

    $pdf->SetFont('dejavusans', '', 9);
    $pdf->Text(16, 88, iconv("cp1251", "utf-8", '5. Место жительства (регистрации)'), 0);

    $line1 = "";
    $line2 = "";
    $token = strtok($_POST['person_address'], " ");
    while($token != false) {
      if(strlen($line1) + strlen($token) < 45) {
	if(strlen($line1) > 0) {
	  $line1 = $line1 . ' ';
	}
	$line1 = $line1 . $token;
      } else {
	if(strlen($line2) > 0) {
	  $line2 = $line2 . ' ';
	}
	$line2 = $line2 . $token;
      }
      $token = strtok(" ");
    }

    $pdf->SetFont('dejavusans', '', 12);
    $pdf->SetXY(78, 85);
    $pdf->Cell(120, 0, iconv("cp1251", "utf-8", $line1), 0, 1, 'L');
    $pdf->Line(78, 90, 195, 90, $style);

    $pdf->SetFont('dejavusans', 'I', 7.5);
    $pdf->Text(105, 93, iconv("cp1251", "utf-8", 'республика, край, область, населённый пункт'), 0);

    $pdf->SetFont('dejavusans', '', 12);
    $pdf->Text(16, 101, iconv("cp1251", "utf-8", $line2), 0);
    $pdf->Line(16, 102, 195, 102, $style);

    $pdf->SetFont('dejavusans', '', 9);
    $pdf->Text(16, 110, iconv("cp1251", "utf-8", '6. Гражданство'), 0);

    $pdf->SetFont('dejavusans', '', 12);
    $pdf->SetXY(45, 107);
    $pdf->Cell(77, 0, iconv("cp1251", "utf-8", trim($_POST['person_citizenship'])), 0, 1, 'C');
    $pdf->Line(45, 112, 122, 112, $style);

    $pdf->SetFont('dejavusans', '', 9);
    $pdf->Text(122, 110, iconv("cp1251", "utf-8", 'Если одновременно имеете гражданство'), 0);
    $pdf->Text(16, 115, iconv("cp1251", "utf-8", 'другого государства, указывается какого именно'), 0);

    $pdf->SetFont('dejavusans', '', 12);
    $pdf->SetXY(107, 112);
    $other_citizenship = iconv("cp1251", "utf-8", trim($_POST['person_citizenship_other']));
    if(strlen(trim($other_citizenship)) == 0) {
      $other_citizenship = iconv("cp1251", "utf-8", 'НЕ ИМЕЮ');
    }
    $pdf->Cell(92, 0, $other_citizenship, 0, 1, 'C');
    $pdf->Line(107, 117, 195, 117, $style);


    $pdf->Output('zp.pdf', 'I');

}

$tpl->load_template( 'zagran_pasport.tpl' );
$tpl->copy_template = "<form method=\"post\" name=\"sendmail\" onsubmit=\"\" action=\"\">" . $tpl->copy_template .
        "<input name=\"send\" type=\"hidden\" value=\"send\" />
</form>";

$tpl->compile( 'content' );


?>
