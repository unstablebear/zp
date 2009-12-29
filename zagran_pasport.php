<?php

ini_set("memory_limit","120M");

if( ! defined( 'DATALIFEENGINE' ) ) {
    die( "Hacking attempt!" );
}

/*$im = @imagecreatefromjpeg("{$config['http_home_url']}/engine/modules/pdf_forms/zp_form_1.jpg");
$font_file = "/var/www/engine/modules/pdf_forms/DejaVuSans.ttf";

// Draw the text 'PHP Manual' using font size 13
imagefttext($im, 13, 0, 105, 55, $black, $font_file, iconv("cp1251", "utf-8", 'PHP Мануал'));
imagefttext($im, 13, 0, 50, 75, $black, $font_file, iconv("cp1251", "utf-8", trim($_POST['person_birth_address'])));

imagejpeg($im, '/tmp/img01.jpg');
imagedestroy($im);*/

if( isset( $_POST['send'] )) {

    require_once ENGINE_DIR . '/modules/tcpdf/config/lang/eng.php';
    require_once ENGINE_DIR . '/modules/tcpdf/tcpdf.php';

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('unstablebear');
    $pdf->SetTitle('anketa na zagran pasport');
    $pdf->SetSubject('');
    $pdf->SetKeywords('anketa na zagran pasport');

// remove default header/footer
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);

// set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
    $pdf->SetMargins(0, 0, PDF_MARGIN_RIGHT);
		     //PDF_MARGIN_LEFT, 0, PDF_MARGIN_RIGHT);
    //PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

//set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
//    $pdf->setImageScale(1);
			//PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
    $pdf->setLanguageArray($l);

// ---------------------------------------------------------

    $pdf->setJPEGQuality(100);
    $pdf->Image("{$config['http_home_url']}/engine/modules/pdf_forms/zp_form_1.jpg", 0, 0, 210, 295, '', 
		'', '', true, 150, '', false, false, 0, false, false);

    //    $pdf->AddPage();

    $style = array('width' => 0.3, 'cap' => 'butt', 'join' => 'miter', 'dash' => '', 'phase' => 0, 'color' => array(0, 0, 0));

    $pdf->SetFont('times', '', 16);
    $pn = iconv("cp1251", "utf-8","ччч");
    $pdf->TextField('nickname', 105, 6, array(), array('v'=>$pn), 55, 38.5);

    
      //iconv("cp1251", "utf-8", str_pad(trim($_POST['person_name']), 44));
    //    $pdf->TextField('personname', 50, 5, array(), array('v'=>$nickName));


    //iconv("cp1251", "utf-8", str_pad(trim($_POST['person_name']), 44))

    $pdf->Text(14, 53, iconv("cp1251", "utf-8", str_pad(trim($_POST['person_name_old']), 91)), 0);

    $pdf->SetFont('dejavusans', '', 12);
    $pdf->SetXY(72, 60);
    $pdf->Cell(92, 0, iconv("cp1251", "utf-8", trim($_POST['person_birthday'])), 0, 1, 'C');

    $pdf->SetFont('helvetica', '', 12);
    $pdf->SetXY(30, 66);
    $pdf->Cell(28, 0, iconv("cp1251", "utf-8", trim($_POST['person_sex'])), 0, 1, 'C');

    $pdf->SetFont('dejavusans', '', 12);
    $pdf->SetXY(50, 75);
    $pdf->Cell(150, 0, iconv("cp1251", "utf-8", trim($_POST['person_birth_address'])), 0, 1, 'L');
    $pdf->Line(50, 80, 195, 80, $style);

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

    $pdf->SetFont('dejavusans', '', 12);
    $pdf->Text(14, 101, iconv("cp1251", "utf-8", $line2), 0);

    $pdf->SetFont('dejavusans', '', 12);
    $pdf->SetXY(45, 107);
    $pdf->Cell(77, 0, iconv("cp1251", "utf-8", trim($_POST['person_citizenship'])), 0, 1, 'C');

    $pdf->SetFont('dejavusans', '', 12);
    $pdf->SetXY(107, 112);
    $other_citizenship = iconv("cp1251", "utf-8", trim($_POST['person_citizenship_other']));
    if(strlen(trim($other_citizenship)) == 0) {
      $other_citizenship = iconv("cp1251", "utf-8", 'НЕ ИМЕЮ');
    }
    $pdf->Cell(92, 0, $other_citizenship, 0, 1, 'C');

    $pdf->SetFont('dejavusans', '', 12);
    $pdf->SetXY(33, 125);
    $pdf->Cell(30, 0, iconv("cp1251", "utf-8", trim($_POST['person_passport_ser'])), 0, 1, 'C');

    $pdf->SetFont('dejavusans', '', 12);
    $pdf->SetXY(75, 125);
    $pdf->Cell(34, 0, iconv("cp1251", "utf-8", trim($_POST['person_passport_num'])), 0, 1, 'C');

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

    $pdf->SetFont('dejavusans', '', 12);
    $pdf->SetXY(14, 137);
    $pdf->Cell(180, 0, iconv("cp1251", "utf-8", $line2), 0, 1, 'C');

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

    $pdf->SetFont('dejavusans', '', 12);
    $pdf->SetXY(14, 156);
    $pdf->Cell(180, 0, iconv("cp1251", "utf-8", $purpose_country), 0, 1, 'C');

    if($_POST['type_status'] == 'взамен использованного') {
      $pdf->Line(82, 171, 123, 171, $style);      
    } else if($_POST['type_status'] == 'взамен испорченного') {
      $pdf->Line(126, 171, 149, 171, $style);
    } else if($_POST['type_status'] == 'взамен утраченного') {
      $pdf->Line(151, 171, 173, 171, $style);
    } else {
      $pdf->Line(62, 171, 80, 171, $style);
    }

    $secret_acces_info = trim($_POST['secret_access_info']);
    $has_secrets = 'да';
    if(strlen($secret_acces_info) == 0) {
      $has_secrets = 'нет';
    }
    
    $pdf->SetFont('dejavusans', '', 12);
    $pdf->SetXY(145, 182);
    $pdf->Cell(50, 0, iconv("cp1251", "utf-8", $has_secrets), 0, 1, 'C');

    $pdf->SetFont('dejavusans', '', 12);
    $pdf->SetXY(14, 187);
    $pdf->Cell(180, 0, iconv("cp1251", "utf-8", $_POST['secret_access_info']), 0, 1, 'C');

    $obl_info = trim($_POST['obligations_info']);
    if (strlen($obl_info) == 0) {
      $obl_info = 'Не имею';
    }
    $pdf->SetFont('dejavusans', '', 12);
    $pdf->SetXY(14, 202);
    $pdf->Cell(180, 0, iconv("cp1251", "utf-8", $obl_info), 0, 1, 'C');

    $pdf->SetFont('dejavusans', '', 12);
    $pdf->SetXY(104, 219);
    $pdf->Cell(90, 0, iconv("cp1251", "utf-8", $_POST['military_status']), 0, 1, 'C');

    $pdf->SetFont('dejavusans', '', 12);
    $pdf->SetXY(179, 226);
    $pdf->Cell(17, 0, iconv("cp1251", "utf-8", $_POST['criminal_status']), 0, 1, 'C');

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
    $j_date_from = iconv('cp1251', 'utf-8', $_POST['job_date_from']);
    $j_date_to = iconv('cp1251', 'utf-8', $_POST['job_date_to']);
    $j_name = iconv('cp1251', 'utf-8', $_POST['job_name']);
    $j_address = iconv('cp1251', 'utf-8', $_POST['job_address']);

    /*    for($i = 4; $i < 15; $i++) {
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
    */

    
    $pdf->SetFont('dejavusans', 'B', 9);
    $pdf->SetXY(85, $y + 29);
    $pdf->Cell(15, 0, iconv("cp1251", "utf-8", $_POST['person_old_passport_ser']), 0, 1, 'C');

    $pdf->SetXY(113, $y + 29);
    $pdf->Cell(32, 0, iconv("cp1251", "utf-8", $_POST['person_old_passport_num']), 0, 1, 'C');

    
    $pop_day = strtok($_POST['person_old_passport_date'], '.');
    $pop_month = strtok('.');
    $pop_year = strtok('.');

    if (!$pop_year) {
      $pop_year = '20';
    }

    $monthes = array ( "01" => "января", "02" => "февраля", "03" => "марта", "04" => "апреля", "05" => "мая", "06" => "июня", 
		       "07" => "июля", "08" => "августа", "09" => "сентября", "10" => "октября", "11" => "ноября", "12" => "декабря");

    $pdf->SetFont('dejavusans', 'B', 9);
    $pdf->SetXY(17, $y + 35);
    $pdf->Cell(14, 0, iconv("cp1251", "utf-8", $pop_day), 0, 1, 'C');
    $pdf->SetXY(30, $y + 35);
    $pdf->Cell(32, 0, iconv("cp1251", "utf-8", $monthes[$pop_month]), 0, 1, 'C');
    $pdf->SetXY(54, $y + 35);
    $pdf->Cell(20, 0, iconv("cp1251", "utf-8", $pop_year), 0, 1, 'C');
    $pdf->SetXY(78, $y + 35);
    $pdf->Cell(115, 0, iconv("cp1251", "utf-8", $_POST['person_old_passport_org']), 0, 1, 'C');

    $filename = "anketa.pdf";

    if($_POST['email_addr']) {

      $to = $_POST['email_addr'];
      $from = "bot@zagranpasport.ru";
      $host = $config['smtp_host'];
      $username = $config['smtp_user'];
      $password = $config['smtp_pass'];

      $message = iconv("cp1251", "utf-8", "http://zagranpassport.com/");
      $subject = iconv("cp1251", "utf-8", "Анкета на загранпаспорт");

      $separator = md5(time());
      
      $eol = PHP_EOL;
      
      // encode data (puts attachment in proper format)
      $pdfdoc = $pdf->Output($filename, "S");
      $yyy = base64_encode($pdfdoc);
      $attachment = chunk_split($yyy);
      
      // main header (multipart mandatory)
      $headers = "From: ".$from.$eol;
      $headers .= "MIME-Version: 1.0".$eol;
      $headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"".$eol.$eol;
      $headers .= "Content-Transfer-Encoding: 7bit".$eol;
      $headers .= "This is a MIME encoded message.".$eol.$eol;
      
      // message
      $headers .= "--".$separator.$eol;
      $headers .= "Content-Type: text/html; charset=\"UTF-8\"".$eol;
      $headers .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
      $headers .= $message.$eol.$eol;
      
      // attachment
      $headers .= "--".$separator.$eol;
      $headers .= "Content-Type: application/octet-stream; name=\"".$filename."\"".$eol;
      $headers .= "Content-Transfer-Encoding: base64".$eol;
      $headers .= "Content-Disposition: attachment".$eol.$eol;
      $headers .= $attachment.$eol.$eol;
      $headers .= "--".$separator."--";
    
      // send message
      mail($to, $subject, "", $headers);

    } else {
      $pdfdoc = $pdf->Output($filename, "I");
    }

     
 }

$js = <<<HTML

<script type="text/javascript" src="{$config['http_home_url']}engine/jquery/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="{$config['http_home_url']}engine/jquery/date.js"></script>
<script type="text/javascript" src="{$config['http_home_url']}engine/jquery/jquery.datePicker-2.1.2.js"></script>
<link rel="stylesheet" href="{$config['http_home_url']}engine/jquery/datePicker.css" type="text/css" />
<script src="{$config['http_home_url']}engine/jquery/jquery.maskedinput-1.2.2.min.js" type="text/javascript"></script>

HTML;

$tpl->load_template( 'zagran_pasport.tpl' );
$tpl->copy_template = $js . "<form method=\"post\" name=\"sendmail\" onsubmit=\"\" action=\"\">" . $tpl->copy_template .
  "<input name=\"send\" type=\"hidden\" value=\"send\" />
</form>";

$tpl->set('{skin}', $config['skin']);

$tpl->compile( 'content' );


?>
