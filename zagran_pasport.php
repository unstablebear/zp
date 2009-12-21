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

    $pdf->Rect(14, 12, 25, 13, 'D', array('all' => $style));
    $pdf->Rect(39, 12, 25, 13, 'D', array('all' => $style));

    $pdf->SetFont('dejavusans', 'IB', 12);
    $pdf->Text(90, 18, iconv("cp1251", "utf-8", '                         ОЗП              '), 0);

    $pdf->SetFont('dejavusans', 'B', 10);
    $pdf->Text(57, 33, iconv("cp1251", "utf-8", 'ЗАЯВЛЕНИЕ О ВЫДАЧЕ ПАСПОРТА'), 0);

    $pdf->SetFont('dejavusans', '', 9);
    $pdf->Text(170, 30, iconv("cp1251", "utf-8", 'место для'), 0);
    $pdf->Text(168, 34, iconv("cp1251", "utf-8", 'фотографии'), 0);

    $pdf->SetFont('dejavusans', '', 9);
    $pdf->Text(14, 45, iconv("cp1251", "utf-8", '1. Фамилия, имя, отчество'), 0);

    $pdf->SetFont('dejavusans', '', 12);
    $pdf->Text(65, 45, iconv("cp1251", "utf-8", str_pad(trim($_POST['person_name']), 44)), 0);
    $pdf->Line(65, 46, 160, 46, $style);

    $pdf->Text(14, 53, iconv("cp1251", "utf-8", str_pad(trim($_POST['person_name_old']), 91)), 0);
    $pdf->Line(14, 54, 160, 54, $style);

    $pdf->SetFont('dejavusans', 'I', 7.5);
    $pdf->Text(30, 57, iconv("cp1251", "utf-8", 'если ранее имели другие фамилию, имя, отчество укажите их, когда меняли и где'), 0);

    $pdf->SetFont('dejavusans', '', 9);
    $pdf->Text(14, 64, iconv("cp1251", "utf-8", '2. Число, месяц, год рождения'), 0);

    $pdf->SetFont('dejavusans', '', 12);
    $pdf->SetXY(72, 60);
    $pdf->Cell(92, 0, iconv("cp1251", "utf-8", trim($_POST['person_birthday'])), 0, 1, 'C');
    $pdf->Line(72, 65, 160, 65, $style);

    $pdf->SetFont('dejavusans', '', 9);
    $pdf->Text(14, 69, iconv("cp1251", "utf-8", '3. Пол'), 0);

    $pdf->SetFont('dejavusans', '', 12);
    $pdf->SetXY(30, 66);
    $pdf->Cell(28, 0, iconv("cp1251", "utf-8", trim($_POST['person_sex'])), 0, 1, 'C');
    $pdf->Line(30, 71, 60, 71, $style);

    $pdf->SetFont('dejavusans', '', 9);
    $pdf->Text(14, 79, iconv("cp1251", "utf-8", '4. Место рождения'), 0);

    $pdf->SetFont('dejavusans', '', 12);
    $pdf->SetXY(50, 75);
    $pdf->Cell(150, 0, iconv("cp1251", "utf-8", trim($_POST['person_birth_address'])), 0, 1, 'L');
    $pdf->Line(50, 80, 195, 80, $style);

    $pdf->SetFont('dejavusans', 'I', 7.5);
    $pdf->Text(92, 83, iconv("cp1251", "utf-8", 'республика, край, область, населённый пункт'), 0);

    $pdf->SetFont('dejavusans', '', 9);
    $pdf->Text(14, 88, iconv("cp1251", "utf-8", '5. Место жительства (регистрации)'), 0);

    $line1 = "";
    $line2 = "";
    $line1_full = false;
    $token = strtok($_POST['person_address'], " ");
    while($token != false) {
      if(strlen($line1) + strlen($token) < 50 && !$line1_full) {
	if(strlen($line1) > 0) {
	  $line1 = $line1 . ' ';
	}
	$line1 = $line1 . $token;
      } else {
	if(!$line1_full)
	  $line1_full = true;
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
    $pdf->Text(14, 101, iconv("cp1251", "utf-8", $line2), 0);
    $pdf->Line(14, 102, 195, 102, $style);

    $pdf->SetFont('dejavusans', '', 9);
    $pdf->Text(14, 110, iconv("cp1251", "utf-8", '6. Гражданство'), 0);

    $pdf->SetFont('dejavusans', '', 12);
    $pdf->SetXY(45, 107);
    $pdf->Cell(77, 0, iconv("cp1251", "utf-8", trim($_POST['person_citizenship'])), 0, 1, 'C');
    $pdf->Line(45, 112, 122, 112, $style);

    $pdf->SetFont('dejavusans', '', 9);
    $pdf->Text(122, 110, iconv("cp1251", "utf-8", 'Если одновременно имеете гражданство'), 0);
    $pdf->Text(14, 115, iconv("cp1251", "utf-8", 'другого государства, указывается какого именно'), 0);

    $pdf->SetFont('dejavusans', '', 12);
    $pdf->SetXY(107, 112);
    $other_citizenship = iconv("cp1251", "utf-8", trim($_POST['person_citizenship_other']));
    if(strlen(trim($other_citizenship)) == 0) {
      $other_citizenship = iconv("cp1251", "utf-8", 'НЕ ИМЕЮ');
    }
    $pdf->Cell(92, 0, $other_citizenship, 0, 1, 'C');
    $pdf->Line(107, 117, 195, 117, $style);

    $pdf->SetFont('dejavusans', '', 9);
    $pdf->Text(14, 122, iconv("cp1251", 
			      "utf-8", '7. Основной документ, удостоверяющий личность (паспорт) гражданина Российской Федерации:'), 0);

    $pdf->SetFont('dejavusans', '', 9);
    $pdf->Text(23, 129, iconv("cp1251", "utf-8", 'серия'), 0);

    $pdf->SetFont('dejavusans', '', 12);
    $pdf->SetXY(33, 125);
    $pdf->Cell(30, 0, iconv("cp1251", "utf-8", trim($_POST['person_passport_ser'])), 0, 1, 'C');

    $pdf->SetFont('dejavusans', '', 9);
    $pdf->Text(63, 129, iconv("cp1251", "utf-8", 'номер'), 0);

    $pdf->SetFont('dejavusans', '', 12);
    $pdf->SetXY(75, 125);
    $pdf->Cell(34, 0, iconv("cp1251", "utf-8", trim($_POST['person_passport_num'])), 0, 1, 'C');

    $pdf->SetFont('dejavusans', '', 9);
    $pdf->Text(107, 129, iconv("cp1251", "utf-8", 'выдан'), 0);

    $pdf->SetFont('dejavusans', '', 12);
    $pdf->SetXY(119, 125);
    $pdf->Cell(78, 0, iconv("cp1251", "utf-8", trim($_POST['person_passport_date'])), 0, 1, 'C');

    $line1 = "";
    $line2 = "";
    $line1_full = false;
    $token = strtok($_POST['person_passport_org'], " ");
    while($token != false) {
      if(strlen($line1) + strlen($token) < 70 && !$line1_full) {
	if(strlen($line1) > 0) {
	  $line1 = $line1 . ' ';
	}
	$line1 = $line1 . $token;
      } else {
	if(!$line1_full)
	  $line1_full = true;
	if(strlen($line2) > 0) {
	  $line2 = $line2 . ' ';
	}
	$line2 = $line2 . $token;
      }
      $token = strtok(" ");
    }

    $pdf->SetFont('dejavusans', '', 12);
    $pdf->SetXY(14, 131);
    $pdf->Cell(180, 0, iconv("cp1251", "utf-8", $line1), 0, 1, 'C');
    $pdf->Line(14, 136, 195, 136, $style);

    $pdf->SetFont('dejavusans', '', 12);
    $pdf->SetXY(14, 137);
    $pdf->Cell(180, 0, iconv("cp1251", "utf-8", $line2), 0, 1, 'C');
    $pdf->Line(14, 142, 195, 142, $style);

    $pdf->SetFont('dejavusans', '', 9);
    $pdf->Text(14, 150, iconv("cp1251", "utf-8", '8. Цель получения паспорта'), 0);

    $purpose = '';
    $purpose_country = trim($_POST['purpose_country']);
    if (strlen($purpose_country) == 0) {
      $purpose = 'Для временных выездов';
    } else {
      $purpose_country = 'Для проживания за границей в стране ' . $purpose_country;
    }

    $pdf->SetFont('dejavusans', '', 12);
    $pdf->SetXY(65, 146);
    $pdf->Cell(130, 0, iconv("cp1251", "utf-8", $purpose), 0, 1, 'C');
    $pdf->Line(65, 151, 195, 151, $style);

    $pdf->SetFont('dejavusans', 'I', 7.5);
    $pdf->Text(105, 153.5, iconv("cp1251", "utf-8", 'Для временных выездов за границу'), 0);

    $pdf->SetFont('dejavusans', '', 12);
    $pdf->SetXY(14, 156);
    $pdf->Cell(180, 0, iconv("cp1251", "utf-8", $purpose_country), 0, 1, 'C');
    $pdf->Line(14, 161, 195, 161, $style);

    $pdf->SetFont('dejavusans', 'I', 7.5);
    $pdf->Text(73, 164.5, iconv("cp1251", "utf-8", 'Для проживания за границей (в какой стране)'), 0);

    $pdf->SetFont('dejavusans', '', 9);
    $pdf->Text(14, 170, iconv("cp1251", "utf-8", '9. Получение паспорта:        первичное, взамен использованного, испорченного, утраченного'), 0);

    if($_POST['type_status'] == 'взамен использованного') {
      $pdf->Line(82, 171, 123, 171, $style);      
    } else if($_POST['type_status'] == 'взамен испорченного') {
      $pdf->Line(126, 171, 149, 171, $style);
    } else if($_POST['type_status'] == 'взамен утраченного') {
      $pdf->Line(151, 171, 173, 171, $style);
    } else {
      $pdf->Line(62, 171, 80, 171, $style);
    }

    $pdf->SetXY(14, 171);
    $pdf->Cell(180, 0, iconv("cp1251", "utf-8", '(нужное подчеркнуть).'), 0, 1, 'C');

    $pdf->SetFont('dejavusans', '', 9);
    $pdf->Text(14, 178, iconv("cp1251", "utf-8", '10. Был ли на Вас за период работы (учёбы, службы) оформлен допуск к сведениям особой важности или'), 0);

    $pdf->SetFont('dejavusans', '', 9);
    $pdf->Text(14, 186, iconv("cp1251", "utf-8", 'совершенно секретным сведениям, отнесенным к государственной тайне?'), 0);

    $secret_acces_info = trim($_POST['secret_access_info']);
    $has_secrets = 'да';
    if(strlen($secret_acces_info) == 0) {
      $has_secrets = 'нет';
    }
    
    $pdf->SetFont('dejavusans', '', 12);
    $pdf->SetXY(145, 182);
    $pdf->Cell(50, 0, iconv("cp1251", "utf-8", $has_secrets), 0, 1, 'C');
    $pdf->Line(145, 187, 195, 187, $style);

    $pdf->SetFont('dejavusans', '', 12);
    $pdf->SetXY(14, 187);
    $pdf->Cell(180, 0, iconv("cp1251", "utf-8", $_POST['secret_access_info']), 0, 1, 'C');
    $pdf->Line(14, 192, 195, 192, $style);

    $pdf->SetFont('dejavusans', 'I', 7.5);
    $pdf->Text(65, 194.5, iconv("cp1251", "utf-8", 'Если да, то по линии какой организации и в каком году'), 0);

    $pdf->SetFont('dejavusans', '', 9);
    $pdf->Text(14, 201, iconv("cp1251", "utf-8", '11. Имеете ли Вы договорные, контрактные обязательства, препятствующие выезду за границу?'), 0);

    $obl_info = trim($_POST['obligations_info']);
    if (strlen($obl_info) == 0) {
      $obl_info = 'Не имею';
    }
    $pdf->SetFont('dejavusans', '', 12);
    $pdf->SetXY(14, 202);
    $pdf->Cell(180, 0, iconv("cp1251", "utf-8", $obl_info), 0, 1, 'C');
    $pdf->Line(14, 207, 195, 207, $style);

    $pdf->SetFont('dejavusans', 'I', 7.5);
    $pdf->Text(58, 209.5, iconv("cp1251", "utf-8", 'Если да, то по линии какой организации и в каком году оформлены'), 0);

    $pdf->SetFont('dejavusans', '', 9);
    $pdf->Text(14, 217, iconv("cp1251", "utf-8", '12. Не призваны ли Вы на военную службу или не направлены ли на альтернативную гражданскую'), 0);

    $pdf->SetFont('dejavusans', '', 9);
    $pdf->Text(19, 223, iconv("cp1251", "utf-8", 'службу? (для мужчин в возрасте от 18 до 27 лет)'), 0);

    $pdf->SetFont('dejavusans', '', 12);
    $pdf->SetXY(104, 219);
    $pdf->Cell(90, 0, iconv("cp1251", "utf-8", $_POST['military_status']), 0, 1, 'C');
    $pdf->Line(105, 224, 195, 224, $style);

    $pdf->SetFont('dejavusans', '', 9);
    $pdf->Text(14, 230, iconv("cp1251", "utf-8", '13. Не осуждены ли Вы за совершение преступления либо привлечены в качестве обвиняемого?'), 0);

    $pdf->SetFont('dejavusans', '', 12);
    $pdf->SetXY(179, 226);
    $pdf->Cell(17, 0, iconv("cp1251", "utf-8", $_POST['criminal_status']), 0, 1, 'C');
    $pdf->Line(180, 231, 195, 231, $style);

    $pdf->SetFont('dejavusans', '', 9);
    $pdf->Text(14, 237.5, iconv("cp1251", "utf-8", '14. Прошу внести в паспорт сведения о моих детях, гражданах Российской Федерации, в возрасте до 14 лет'), 0);
    $pdf->Text(14, 241.5, iconv("cp1251", "utf-8", 'Прошу выдать паспорта моим детям (ненужное зачеркнуть)'), 0);

    $pdf->Line(14, 244, 195, 244, $style);
    $pdf->Line(14, 248.5, 195, 248.5, $style);
    $pdf->Line(14, 253, 195, 253, $style);
    $pdf->Line(14, 257.5, 195, 257.5, $style);
    $pdf->Line(14, 262, 195, 262, $style);
    $pdf->Line(14, 266.5, 195, 266.5, $style);
    $pdf->Line(14, 271, 195, 271, $style);
    $pdf->Line(14, 275.5, 195, 275.5, $style);

    $pdf->Line(104, 244, 104, 275.5, $style);
    $pdf->Line(14, 244, 14, 275.5, $style);
    $pdf->Line(195, 244, 195, 275.5, $style);

    $pdf->Text(39, 247.5, iconv("cp1251", "utf-8", 'Фамилия, имя, отчество'), 0);
    $pdf->Text(120, 247.5, iconv("cp1251", "utf-8", 'Число, месяц, год и место рождения'), 0);

    if($_POST['child_name']) {
      $pdf->Text(15, 252, iconv("cp1251", "utf-8", $_POST['child_name']), 0);
      $pdf->Text(105, 252, iconv("cp1251", "utf-8", $_POST['child_birthday']), 0);
    }

    for($i = 4; $i < 9; $i++) {
      if($_POST['child_name' . '_' . $i]) {
	$pdf->Text(15, 252 +  ($i - 3) * 4.5, iconv("cp1251", "utf-8", $_POST['child_name' . '_' . $i]), 0);
	$pdf->Text(105, 252 +  ($i - 3) * 4.5, iconv("cp1251", "utf-8", $_POST['child_birthday' . '_' . $i]), 0);
      }
    }

    $pdf->AddPage();
    $pdf->Text(15, 17, iconv("cp1251", "utf-8", 
			     '15. Выписка из трудовой книжки о трудовой деятельности за последние 10 лет (включая учёбу в учебных'), 0);
    $pdf->Text(15, 21, iconv("cp1251", "utf-8", 'заведениях и военную службу):'), 0);

    $pdf->Line(14, 25, 195, 25, $style);
    $pdf->Line(14, 37, 195, 37, $style);
    $pdf->Line(51, 25, 51, 37, $style);
    $pdf->Line(148, 25, 148, 37, $style);
    $pdf->Line(14, 29, 51, 29, $style);
    $pdf->Line(32.5, 29, 32.5, 37, $style);

    $pdf->SetFont('dejavusans', '', 7.5);
    $pdf->Text(24.5, 28, iconv("cp1251", "utf-8", 'Месяц и год'), 0);

    $pdf->Text(52, 28, iconv("cp1251", "utf-8", 'Должность и место работы с указанием министерства (ведомства),'), 0);
    $pdf->Text(53, 32, iconv("cp1251", "utf-8", 'без сокращения, в том числе номер войсковой части, вида и рода'), 0);
    $pdf->Text(82, 36, iconv("cp1251", "utf-8", 'войск вооруженных сил'), 0);

    $pdf->Text(152, 28, iconv("cp1251", "utf-8", 'Местонахождение (адрес)'), 0);
    $pdf->Text(152, 32, iconv("cp1251", "utf-8", 'предприятия, учреждения,'), 0);
    $pdf->Text(150, 36, iconv("cp1251", "utf-8", 'организации, войсковой части'), 0);

    $pdf->Text(14, 33.5, iconv("cp1251", "utf-8", 'поступления'), 0);
    $pdf->Text(33.5, 33.5, iconv("cp1251", "utf-8", 'увольнения'), 0);

    $pdf->SetFont('dejavusans', '', 8.5);
    $pdf->SetXY(14, 37);
    $tbl = '<table cellspacing="0" cellpadding="1" border="1">';

    $j_date_from = iconv('cp1251', 'utf-8', $_POST['job_date_from']);
    $j_date_to = iconv('cp1251', 'utf-8', $_POST['job_date_to']);
    $j_name = iconv('cp1251', 'utf-8', $_POST['job_name']);
    $j_address = iconv('cp1251', 'utf-8', $_POST['job_address']);
    $tbl .= <<<TBL
      <tr>
      <td width="52.5" align="center" valign="middle">{$j_date_from}</td>
      <td width="52.5" align="center" valign="middle">{$j_date_to}</td>
      <td width="275">{$j_name}</td>
      <td width="133">{$j_address}</td>
      </tr>
TBL;

    for($i = 4; $i < 15; $i++) {
        $j_date_from = iconv('cp1251', 'utf-8', $_POST['job_date_from_' . $i]);
        $j_date_to = iconv('cp1251', 'utf-8', $_POST['job_date_to_' . $i]);
        $j_name = iconv('cp1251', 'utf-8', $_POST['job_name_' . $i]);
        $j_address = iconv('cp1251', 'utf-8', $_POST['job_address_' . $i]);
        $tbl .= <<<TBL
	  <tr>
	  <td width="52.5" align="center" valign="middle">{$j_date_from}</td>
          <td width="52.5" align="center" valign="middle">{$j_date_to}</td>
	  <td width="275">{$j_name}</td>
          <td width="133">{$j_address}</td>
          </tr>
TBL;
    }
    $tbl .= '</table>';



    $pdf->writeHTML($tbl, true, false, false, false, '');
    $pdf->Output('zp.pdf', 'I');

}

$tpl->load_template( 'zagran_pasport.tpl' );
$tpl->copy_template = "<form method=\"post\" name=\"sendmail\" onsubmit=\"\" action=\"\">" . $tpl->copy_template .
        "<input name=\"send\" type=\"hidden\" value=\"send\" />
</form>";

$tpl->compile( 'content' );


?>
