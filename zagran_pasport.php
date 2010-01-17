<?php

ini_set("memory_limit","32M");

if( ! defined( 'DATALIFEENGINE' ) ) {
    die( "Hacking attempt!" );
}

if($_POST['page_id'] == '')
  $pageId = uniqid('page');
else
  $pageId = $_POST['page_id'];

if( isset( $_POST['send'] )) {

  $monthes = array ( "01" => "января", "02" => "февраля", "03" => "марта", "04" => "апреля", "05" => "мая", "06" => "июня", 
		     "07" => "июля", "08" => "августа", "09" => "сентября", "10" => "октября", "11" => "ноября", "12" => "декабря");

  if( $_POST['pdf_or_jpeg'] == 1 ) {

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

    $pdf->SetFont('times', '', 12);

    $pdf->TextField('person_name', 105, 6, array(), 
		    array('v'=>iconv("cp1251", "utf-8", trim($_POST['person_name'])), 'Q'=>1), 55, 38.5);
    $pdf->TextField('person_name_old', 148, 6, array(), array('v'=>iconv("cp1251", "utf-8", trim($_POST['person_name_old'])), 'Q'=>1), 
		    13, 45.5);
    $pdf->TextField('person_birthday', 91, 6, array(), array('v'=>iconv("cp1251", "utf-8", trim($_POST['person_birthday'])), 'Q'=>1)
		    , 61, 55);
    $pdf->TextField('person_sex', 30, 6, array(), array('v'=>iconv("cp1251", "utf-8", trim($_POST['person_sex'])), 'Q'=>1), 
		    164.5, 55);
    $pdf->TextField('person_birth_address', 150, 5, array(), array('v'=>iconv("cp1251", "utf-8", trim($_POST['person_birth_address'])),
								   'q'=>1), 44.5, 62);
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

    $pdf->TextField('person_address1', 126, 5, array(), array('v'=>iconv("cp1251", "utf-8", $line1), 'q'=>1), 69, 71)  ;
    $pdf->TextField('person_address2', 183, 5, array(), array('v'=>iconv("cp1251", "utf-8", $line2), 'q'=>1), 12, 79.7);
    $pdf->TextField('person_citizenship', 82, 6, array(), array('v'=>iconv("cp1251", "utf-8", trim($_POST['person_citizenship'])), 'q'=>1), 
		    38, 87.7);

    $other_citizenship = iconv("cp1251", "utf-8", trim($_POST['person_citizenship_other']));
    if(strlen(trim($other_citizenship)) == 0) {
      $other_citizenship = iconv("cp1251", "utf-8", 'НЕ ИМЕЮ');
    }
    $pdf->TextField('person_citizenship_other', 103, 5, array(), array('v'=>$other_citizenship, 'q'=>1), 92, 95);
    $pdf->TextField('person_passport_ser', 28, 6, array(), array('v'=>iconv("cp1251", "utf-8", trim($_POST['person_passport_ser'])),
								 'q'=>1), 27, 105);
    $pdf->TextField('person_passport_num', 32, 6, array(), array('v'=>iconv("cp1251", "utf-8", trim($_POST['person_passport_num'])),
								 'q'=>1), 66.5, 105);
    $pp_day = strtok($_POST['person_passport_date'], '.');
    $pp_month = strtok('.');
    $pp_year = strtok('.');

    $pdf->TextField('person_passport_date_day', 8, 6, array(), array('v'=>$pp_day, 'q'=>1), 116.7, 105);
    $pdf->TextField('person_passport_date_month', 36, 6, array(), array('v'=>iconv('cp1251', 'utf-8', $monthes[$pp_month]), 'q'=>1), 
		    127, 105);
    $pdf->TextField('person_passport_date_year', 22, 6, array(), array('v'=>$pp_year, 'q'=>1), 165.5, 105);

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

    $pdf->TextField('person_passport_org', 182, 5, array(), array('v'=>iconv("cp1251", "utf-8", $line1), 'q'=>1), 12.5, 112);

    $purpose = '';
    $purpose_country = trim($_POST['purpose_country']);
    if (strlen($purpose_country) == 0) {
      $purpose = 'Для временных выездов';
    } else {
      $purpose_country = 'Для проживания за границей в стране ' . $purpose_country;
    }

    $pdf->TextField('purpose', 138, 5, array(), array('v'=>iconv("cp1251", "utf-8", $purpose), 'q'=>1), 57, 120);
    $pdf->TextField('purpose_country', 182, 5, array(), array('v'=>iconv("cp1251", "utf-8", $purpose_country), 'q'=>1), 12.5, 126);
    $pdf->TextField('type_status', 146, 6, array(), array('v'=>iconv("cp1251", "utf-8", $_POST['type_status']), 'q'=>1), 49, 134.5);

    $secret_acces_info = trim($_POST['secret_access_info']);
    $has_secrets = 'да';
    if(strlen($secret_acces_info) == 0) {
      $has_secrets = 'нет';
    }
    
    $pdf->TextField('has_secrets', 63, 5, array(), array('v'=>iconv("cp1251", "utf-8", $has_secrets), 'q'=>1), 132, 147.5);
    $pdf->TextField('secret_access_info', 182, 5, array(), array('v'=>iconv("cp1251", "utf-8", $_POST['secret_access_info']), 'q'=>1), 
		    12.5, 153.5);

    $obl_info = trim($_POST['obligations_info']);
    if (strlen($obl_info) == 0) {
      $pdf->TextField('obl_info', 40, 6, array(), array('v'=>iconv("cp1251", "utf-8", 'Не имею'), 'q'=>1), 155, 161.5);
    }
    $pdf->TextField('obligations_info', 182, 5, array(), array('v'=>iconv("cp1251", "utf-8", $obl_info), 'q'=>1), 12.5, 168.5);


    $pdf->TextField('military_status', 81, 6, array(), array('v'=>iconv("cp1251", "utf-8", $_POST['military_status']), 'q'=>1), 
		    113.5, 180.5);
    $pdf->TextField('military_status_2', 182, 5, array(), array('v'=>'', 'q'=>1), 12.5, 186.5);


    $pdf->TextField('criminal_status', 35, 6, array(), array('v'=>iconv("cp1251", "utf-8", $_POST['criminal_status']), 'q'=>1),
		    160, 192);
    $pdf->TextField('criminal_status_2', 182, 5, array(), array('v'=>'', 'q'=>1), 12.5, 198.5);
    $pdf->TextField('judicial_obligations', 65, 5, array(), array('v'=>iconv("cp1251", "utf-8", $_POST['judicial_obligations']), 'q'=>1),
		    130, 204.3);
    $pdf->TextField('judicial_obligations_2', 182, 5, array(), array('v'=>'', 'q'=>1), 12.5, 210.3);

    for($i = 0; $i < 2; $i++) {
      $j_date_from = iconv('cp1251', 'utf-8', $_POST['job_date_from_' . $i]);
      $j_date_to = iconv('cp1251', 'utf-8', $_POST['job_date_to_' . $i]);
      $j_name = iconv('cp1251', 'utf-8', $_POST['job_name_' . $i]);
      $j_address = iconv('cp1251', 'utf-8', $_POST['job_address_' . $i]);

      $y_pos = 244.5 + $i * 18;

      $pdf->TextField('job_date_from_' . $i, 14.5, 8, array(), array('v'=>$j_date_from, 'q'=>1), 13.5, $y_pos);
      $pdf->TextField('job_date_to_' . $i, 14.5, 8, array(), array('v'=>$j_date_to, 'q'=>1), 29, $y_pos);
      $pdf->TextField('job_name_' . $i, 100, 17, array(), array('v'=>$j_name, 'q'=>1, 'ff'=>4096), 
		      44.5, $y_pos);
      $pdf->TextField('job_address_' . $i, 48, 17, array(), array('v'=>$j_address, 'q'=>1, 'ff'=>4096), 145.5, $y_pos);
    }

    // PDF - SECOND PAGE

    $pdf->Image("{$config['http_home_url']}/engine/modules/pdf_forms/zp_form_2.jpg", 0, 0, 210, 295, '', 
		'', '', true, 150, '', false, false, 0, false, false);

    for($i = 2; $i < 10; $i++) {
      $j_date_from = iconv('cp1251', 'utf-8', $_POST['job_date_from_' . $i]);
      $j_date_to = iconv('cp1251', 'utf-8', $_POST['job_date_to_' . $i]);
      $j_name = iconv('cp1251', 'utf-8', $_POST['job_name_' . $i]);
      $j_address = iconv('cp1251', 'utf-8', $_POST['job_address_' . $i]);

      $y_pos = 25.3 + ($i - 2) * 18.2;

      $pdf->TextField('job_date_from_' . $i, 14.5, 8, array(), array('v'=>$j_date_from, 'q'=>1), 11, $y_pos);
      $pdf->TextField('job_date_to_' . $i, 14.5, 8, array(), array('v'=>$j_date_to, 'q'=>1), 26.5, $y_pos);
      $pdf->TextField('job_name_' . $i, 106, 17, array(), array('v'=>$j_name, 'q'=>1, 'ff'=>4096), 
		      42, $y_pos);
      $pdf->TextField('job_address_' . $i, 42, 17, array(), array('v'=>$j_address, 'q'=>1, 'ff'=>4096), 149, $y_pos);
    }

    $pdf->TextField('kadr_chief_1', 9, 6, array(), array('v'=>'', 'q'=>1), 12.5, 181);
    $pdf->TextField('kadr_chief_2', 26, 6, array(), array('v'=>'', 'q'=>1), 23.5, 181);
    $pdf->TextField('kadr_chief_3', 11, 6, array(), array('v'=>'', 'q'=>1), 55.5, 181);
    $pdf->TextField('kadr_chief_4', 119, 6, array(), array('v'=>'', 'q'=>1), 73.5, 181);

    $pdf->TextField('person_old_passport_ser', 36, 6, array(), array('v'=>iconv("cp1251", "utf-8", $_POST['person_old_passport_ser']), 
								     'q'=>1), 74.5, 194.3);
    $pdf->TextField('person_old_passport_num', 40, 6, array(), array('v'=>iconv("cp1251", "utf-8", $_POST['person_old_passport_num']), 
								     'q'=>1), 122, 194.3);

    $pop_day = strtok($_POST['person_old_passport_date'], '.');
    $pop_month = strtok('.');
    $pop_year = strtok('.');

    if (!$pop_year) {
      $pop_year = '20';
    }

    $pdf->TextField('pop_date_1', 9, 5, array(), array('v'=>$pop_day, 'q'=>1), 12.5, 201.4);
    $pdf->TextField('pop_date_2', 26, 5, array(), array('v'=>iconv("cp1251", "utf-8", $pop_month), 'q'=>1), 23.5, 201.4);
    $pdf->TextField('pop_date_3', 9, 5, array(), array('v'=>$pop_year, 'q'=>1), 56.5, 201.4);
    $pdf->TextField('pop_date_4', 119, 5, array(), array('v'=>iconv("cp1251", "utf-8", $_POST['person_old_passport_org']), 
							 'q'=>1), 73.5, 201.4);
    $pdf->TextField('today_1', 9, 5, array(), array('v'=>'', 'q'=>1), 12.5, 230.7);
    $pdf->TextField('today_2', 26, 5, array(), array('v'=>'', 'q'=>1), 23.5, 230.7);
    $pdf->TextField('today_3', 11, 5, array(), array('v'=>'', 'q'=>1), 55.5, 230.7);

    $pdf->TextField('giving_date_1', 9, 5, array(), array('v'=>'', 'q'=>1), 53.5, 239.3);
    $pdf->TextField('giving_date_2', 25, 5, array(), array('v'=>'', 'q'=>1), 64.5, 239.3);
    $pdf->TextField('giving_date_3', 11, 5, array(), array('v'=>'', 'q'=>1), 94.5, 239.3);

    $pdf->TextField('reg_number', 55, 5, array(), array('v'=>'', 'q'=>1), 51, 245.3);

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

  } else {
    
    $im = @imagecreatefromjpeg("{$config['http_home_url']}/engine/modules/pdf_forms/zp_form_1.jpg");
    $font_file = realpath("./engine/modules/pdf_forms/DejaVuSans.ttf");
    //    5.2727272727272725
    txtCenter($im, 13, 0, 290, 228, $black, $font_file, iconv("cp1251", "utf-8", trim($_POST['person_name'])), 554);
    txtCenter($im, 13, 0, 68, 265, $black, $font_file, iconv("cp1251", "utf-8", trim($_POST['person_name_old'])), 780);
    txtCenter($im, 13, 0, 321, 312, $black, $font_file, iconv("cp1251", "utf-8", trim($_POST['person_birthday'])), 480);
    txtCenter($im, 13, 0, 867, 312, $black, $font_file, iconv("cp1251", "utf-8", trim($_POST['person_sex'])), 158);
    txtCenter($im, 13, 0, 235, 346, $black, $font_file, iconv("cp1251", "utf-8", trim($_POST['person_birth_address'])), 791);
    
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

    txtCenter($im, 13, 0, 364, 394, $black, $font_file, iconv("cp1251", "utf-8", $line1), 664);
    txtCenter($im, 13, 0, 63, 439, $black, $font_file, iconv("cp1251", "utf-8", $line2), 965);
    txtCenter($im, 13, 0, 200, 486, $black, $font_file, iconv("cp1251", "utf-8", trim($_POST['person_citizenship'])), 432);

    $other_citizenship = iconv("cp1251", "utf-8", trim($_POST['person_citizenship_other']));
    if(strlen(trim($other_citizenship)) == 0) {
      $other_citizenship = iconv("cp1251", "utf-8", 'НЕ ИМЕЮ');
    }
    txtCenter($im, 13, 0, 485, 518, $black, $font_file, $other_citizenship, 543);
    txtCenter($im, 13, 0, 142, 576, $black, $font_file, iconv("cp1251", "utf-8", trim($_POST['person_passport_ser'])), 148);
    txtCenter($im, 13, 0, 350, 576, $black, $font_file, iconv("cp1251", "utf-8", trim($_POST['person_passport_num'])), 169);

    $pp_day = strtok($_POST['person_passport_date'], '.');
    $pp_month = strtok('.');
    $pp_year = strtok('.');

    txtCenter($im, 13, 0, 615, 576, $black, $font_file, $pp_day, 42);
    txtCenter($im, 13, 0, 669, 576, $black, $font_file, iconv('cp1251', 'utf-8', $monthes[$pp_month]), 190);
    txtCenter($im, 13, 0, 872, 576, $black, $font_file, $pp_year, 116);

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

    txtCenter($im, 13, 0, 66, 608, $black, $font_file, iconv("cp1251", "utf-8", $line1), 960);

    $purpose = '';
    $purpose_country = trim($_POST['purpose_country']);
    if (strlen($purpose_country) == 0) {
      $purpose = 'Для временных выездов';
    } else {
      $purpose_country = 'Для проживания за границей в стране ' . $purpose_country;
    }

    txtCenter($im, 13, 0, 300, 650, $black, $font_file, iconv("cp1251", "utf-8", $purpose), 728);
    txtCenter($im, 13, 0, 66, 682, $black, $font_file, iconv("cp1251", "utf-8", $purpose_country), 960);
    txtCenter($im, 13, 0, 258, 732, $black, $font_file, iconv("cp1251", "utf-8", $_POST['type_status']), 770);

    $secret_acces_info = trim($_POST['secret_access_info']);
    $has_secrets = 'да';
    if(strlen($secret_acces_info) == 0) {
      $has_secrets = 'нет';
    }
    
    txtCenter($im, 13, 0, 696, 794, $black, $font_file, iconv("cp1251", "utf-8", $has_secrets), 332);
    txtCenter($im, 13, 0, 66, 826, $black, $font_file, iconv("cp1251", "utf-8", $_POST['secret_access_info']), 960);

    $obl_info = trim($_POST['obligations_info']);
    if (strlen($obl_info) == 0) {
      txtCenter($im, 13, 0, 817, 872, $black, $font_file, iconv("cp1251", "utf-8", 'Не имею'), 211);
    }
    txtCenter($im, 13, 0, 66, 906, $black, $font_file, iconv("cp1251", "utf-8", $obl_info), 960);
    txtCenter($im, 13, 0, 598, 972, $black, $font_file, iconv("cp1251", "utf-8", $_POST['military_status']), 427);
    txtCenter($im, 13, 0, 66, 1058, $black, $font_file, '', 100);
    txtCenter($im, 13, 0, 843, 1032, $black, $font_file, iconv("cp1251", "utf-8", $_POST['criminal_status']), 185);
    txtCenter($im, 13, 0, 66, 1126, $black, $font_file, '', 100);
    txtCenter($im, 13, 0, 685, 1092, $black, $font_file, iconv("cp1251", "utf-8", $_POST['judicial_obligations']), 343);
    txtCenter($im, 13, 0, 66, 1193, $black, $font_file, '', 100);

    for($i = 0; $i < 2; $i++) {
      $j_date_from = iconv('cp1251', 'utf-8', $_POST['job_date_from_' . $i]);
      $j_date_to = iconv('cp1251', 'utf-8', $_POST['job_date_to_' . $i]);
      $j_name = iconv('cp1251', 'utf-8', $_POST['job_name_' . $i]);
      $j_address = iconv('cp1251', 'utf-8', $_POST['job_address_' . $i]);

      $y_pos = 1297 + $i * 95;

      txtCenter($im, 13, 0, 71, $y_pos, $black, $font_file, $j_date_from, 75);
      txtCenter($im, 13, 0, 153, $y_pos, $black, $font_file, $j_date_to, 75);
      txtCenter($im, 13, 0, 235, $y_pos, $black, $font_file, wrap(13, 0, $font_file, $j_name, 527), 527);
      txtCenter($im, 13, 0, 767, $y_pos, $black, $font_file, wrap(13, 0, $font_file, $j_address, 253), 253);
    }

    $first_page = realpath('./uploads/forms_images') . '/' . $pageId . '_zp_bio_page_1.jpg';

    if(file_exists($first_page))
      unlink($first_page);

    imagejpeg($im, $first_page);
    imagedestroy($im);
    //    unlink($first_page);

    /*$im = @imagecreatefromjpeg("{$config['http_home_url']}/engine/modules/pdf_forms/zp_form_2.jpg");

    for($i = 2; $i < 10; $i++) {
      $j_date_from = iconv('cp1251', 'utf-8', $_POST['job_date_from_' . $i]);
      $j_date_to = iconv('cp1251', 'utf-8', $_POST['job_date_to_' . $i]);
      $j_name = iconv('cp1251', 'utf-8', $_POST['job_name_' . $i]);
      $j_address = iconv('cp1251', 'utf-8', $_POST['job_address_' . $i]);

      $y_pos = 25.3 + ($i - 2) * 18.2;

      $pdf->TextField('job_date_from_' . $i, 14.5, 8, array(), array('v'=>$j_date_from, 'q'=>1), 11, $y_pos);
      $pdf->TextField('job_date_to_' . $i, 14.5, 8, array(), array('v'=>$j_date_to, 'q'=>1), 26.5, $y_pos);
      $pdf->TextField('job_name_' . $i, 106, 17, array(), array('v'=>$j_name, 'q'=>1, 'ff'=>4096), 
		      42, $y_pos);
      $pdf->TextField('job_address_' . $i, 42, 17, array(), array('v'=>$j_address, 'q'=>1, 'ff'=>4096), 149, $y_pos);
    }

    $pdf->TextField('person_old_passport_ser', 36, 6, array(), array('v'=>iconv("cp1251", "utf-8", $_POST['person_old_passport_ser']), 
								     'q'=>1), 74.5, 194.3);

    $pdf->TextField('person_old_passport_num', 40, 6, array(), array('v'=>iconv("cp1251", "utf-8", $_POST['person_old_passport_num']), 
								     'q'=>1), 122, 194.3);

    $pop_day = strtok($_POST['person_old_passport_date'], '.');
    $pop_month = strtok('.');
    $pop_year = strtok('.');

    if (!$pop_year) {
      $pop_year = '20';
    }

    $pdf->TextField('pop_date_1', 9, 5, array(), array('v'=>$pop_day, 'q'=>1), 12.5, 201.4);
    $pdf->TextField('pop_date_2', 26, 5, array(), array('v'=>iconv("cp1251", "utf-8", $pop_month), 'q'=>1), 23.5, 201.4);
    $pdf->TextField('pop_date_3', 9, 5, array(), array('v'=>$pop_year, 'q'=>1), 56.5, 201.4);
    $pdf->TextField('pop_date_4', 119, 5, array(), array('v'=>iconv("cp1251", "utf-8", $_POST['person_old_passport_org']), 
							 'q'=>1), 73.5, 201.4);

    $second_page = realpath('./uploads/') . '/' . $pageId . '_zp_bio_page_2.jpg';
    imagejpeg($im, $second_page);
    imagedestroy($im);*/

  }
     
 }

$js = <<<HTML

<script type="text/javascript" src="{$config['http_home_url']}engine/jquery/jquery-1.3.2.js"></script>
<script type="text/javascript" src="{$config['http_home_url']}engine/jquery/date.js"></script>
<script type="text/javascript" src="{$config['http_home_url']}engine/jquery/jquery.datePicker-2.1.2.js"></script>

<script type="text/javascript" src="{$config['http_home_url']}engine/jquery/jquery_ui/ui/ui.core.js"></script> 
<script type="text/javascript" src="{$config['http_home_url']}engine/jquery/jquery_ui/ui/ui.draggable.js"></script>
<script type="text/javascript" src="{$config['http_home_url']}engine/jquery/jquery_ui/ui/ui.resizable.js"></script>
<script type="text/javascript" src="{$config['http_home_url']}engine/jquery/jquery_ui/ui/ui.dialog.js"></script>
<script type="text/javascript" src="{$config['http_home_url']}engine/jquery/jquery_ui/ui/effects.core.js"></script>
<script type="text/javascript" src="{$config['http_home_url']}engine/jquery/jquery_ui/ui/effects.highlight.js"></script>
<script type="text/javascript" src="{$config['http_home_url']}engine/jquery/jquery_ui/external/bgiframe/jquery.bgiframe.js"></script>
<link rel="stylesheet" href="{$config['http_home_url']}engine/jquery/jquery_ui/themes/base/ui.all.css" type="text/css" />

<link rel="stylesheet" href="{$config['http_home_url']}engine/jquery/datePicker.css" type="text/css" />

<script src="{$config['http_home_url']}engine/jquery/jquery.maskedinput-1.2.2.min.js" type="text/javascript"></script>

HTML;



$tpl->load_template( 'zagran_pasport.tpl' );
$tpl->copy_template = $js . "<form method=\"post\" name=\"sendmail\" onsubmit=\"\" action=\"\">" . $tpl->copy_template .
  "<input name=\"send\" type=\"hidden\" value=\"send\" />
  <input name=\"page_id\" type=\"hidden\" value=\"" . $pageId . "\" />
</form>";

//$tpl->set('{zp_bio_page_1}', './uploads/forms_images/' . $pageId . '_zp_bio_page_1.jpg');

// JPEG DIALOG INIT
if (isset( $_POST['send'] ) && $_POST['pdf_or_jpeg'] == 2)
{
  $tpl->set('{jpeg_autoload}', 'true');

$jpeg_form_html = <<<HTML
<img src="./uploads/forms_images/{$pageId}_zp_bio_page_1.jpg" alt="" border="2" width="552" height="776"/>
HTML;

  $tpl->set('{jpeg_form_html}', $jpeg_form_html);
}
else
{
  $tpl->set('{jpeg_autoload}', 'false');
  $tpl->set('{jpeg_form_html}', '');
}


// RESTORE FIELDS VALUES
$tpl->set('{person_name}', $_POST['person_name']);
$tpl->set('{person_name_old}', $_POST['person_name_old']);
$tpl->set('{person_birthday}', $_POST['person_birthday']);
$tpl->set('{person_sex}', $_POST['person_sex']);
$tpl->set('{person_birth_address}', $_POST['person_birth_address']);
$tpl->set('{person_address}', $_POST['person_address']);
$tpl->set('{person_citizenship}', $_POST['person_citizenship']);
$tpl->set('{person_citizenship_other}', $_POST['person_citizenship_other']);
$tpl->set('{person_passport_ser}', $_POST['person_passport_ser']);
$tpl->set('{person_passport_num}', $_POST['person_passport_num']);
$tpl->set('{person_passport_date}', $_POST['person_passport_date']);
$tpl->set('{person_passport_org}', $_POST['person_passport_org']);
$tpl->set('{purpose_country}', $_POST['purpose_country']);
$tpl->set('{type_status}', $_POST['type_status']);
$tpl->set('{secret_access_info}', $_POST['secret_access_info']);
$tpl->set('{obligations_info}', $_POST['obligations_info']);
$tpl->set('{military_status}', $_POST['military_status']);
$tpl->set('{criminal_status}', $_POST['criminal_status']);
$tpl->set('{judicial_obligations}', $_POST['judicial_obligations']);
$tpl->set('{person_old_passport_ser}', $_POST['person_old_passport_ser']);
$tpl->set('{person_old_passport_num}', $_POST['person_old_passport_num']);
$tpl->set('{person_old_passport_date}', $_POST['person_old_passport_date']);
$tpl->set('{person_old_passport_org}', $_POST['person_old_passport_org']);
$tpl->set('{email_addr}', $_POST['email_addr']);

if( $_POST['military_status'] == 'Да') {
  $tpl->set('{military_status_1_selected}', '');
  $tpl->set('{military_status_2_selected}', 'selected="true"');
} else {
  $tpl->set('{military_status_2_selected}', '');
  $tpl->set('{military_status_1_selected}', 'selected="true"');
}

if( $_POST['criminal_status'] == 'Да') {
  $tpl->set('{criminal_status_1_selected}', '');
  $tpl->set('{criminal_status_2_selected}', 'selected="true"');
} else {
  $tpl->set('{criminal_status_2_selected}', '');
  $tpl->set('{criminal_status_1_selected}', 'selected="true"');
}

if( $_POST['judicial_obligations'] == 'Да') {
  $tpl->set('{judicial_obligations_1_selected}', '');
  $tpl->set('{judicial_obligations_2_selected}', 'selected="true"');
} else {
  $tpl->set('{judicial_obligations_2_selected}', '');
  $tpl->set('{judicial_obligations_1_selected}', 'selected="true"');
}

if( $_POST['type_status'] == 'взамен использованного') {
  $tpl->set('{type_status_1_selected}', '');
  $tpl->set('{type_status_2_selected}', 'selected="true"');
  $tpl->set('{type_status_3_selected}', '');
  $tpl->set('{type_status_4_selected}', '');
} else if( $_POST['type_status'] == 'взамен испорченного') {
  $tpl->set('{type_status_1_selected}', '');
  $tpl->set('{type_status_2_selected}', '');
  $tpl->set('{type_status_3_selected}', 'selected="true"');
  $tpl->set('{type_status_4_selected}', '');
} else if( $_POST['type_status'] == 'взамен утраченного') {
  $tpl->set('{type_status_1_selected}', '');
  $tpl->set('{type_status_2_selected}', '');
  $tpl->set('{type_status_3_selected}', '');
  $tpl->set('{type_status_4_selected}', 'selected="true"');
} else {
  $tpl->set('{type_status_1_selected}', 'selected="true"');
  $tpl->set('{type_status_2_selected}', '');
  $tpl->set('{type_status_3_selected}', '');
  $tpl->set('{type_status_4_selected}', '');
}

if( $_POST['person_sex'] == 'жен') {
  $tpl->set('{person_msex_selected}', ''); 
  $tpl->set('{person_fsex_selected}', 'selected="true"'); 
} else {
  $tpl->set('{person_msex_selected}', 'selected="true"'); 
  $tpl->set('{person_fsex_selected}', ''); 
}

if( $_POST['pdf_or_jpeg'] == 2 ) {
  $tpl->set('{pdf_checked}', 'false'); 
  $tpl->set('{jpeg_checked}', 'true'); 
} else {
  $tpl->set('{pdf_checked}', 'true'); 
  $tpl->set('{jpeg_checked}', 'false'); 
}

$job_tbl_rows = "";
for($i = 0; $i < 10; $i++) {
  $j_date_from = $_POST['job_date_from_' . $i];
  $j_date_to = $_POST['job_date_to_' . $i];
  $j_name = $_POST['job_name_' . $i];
  $j_address = $_POST['job_address_' . $i];

  //  echo('!' . $j_date_to . $j_date_to . $j_name . $j_address . '!');

  if(strlen($j_date_to) + strlen($j_date_to) + strlen($j_name) + strlen($j_address) > 0)
  {
    if(strlen($job_tbl_rows) > 0)
      $job_tbl_rows .= ', ';

    $job_tbl_rows .= '"' . $j_date_from . '", "' . $j_date_to . '", "' . $j_name . '", "' . $j_address . '"';
    
  }
  
}

//echo($job_tbl_rows);

$tpl->set('{job_tbl_rows}', $job_tbl_rows);
$tpl->set('{skin}', $config['skin']);

$tpl->compile( 'content' );

removeOldFiles(realpath('./uploads/forms_images/'), 30);

// FUNCTIONS

function txtCenter($image, $size, $angle, $left, $top, $color, $font, $text, $max_width) 
{
  $tb = imagettfbbox($size, $angle, $font, $text);
  $x = ceil(($max_width - $tb[2]) / 2) + $left;
  imagettftext($image, $size, $angle, $x, $top, $tc, $font, mb_strtoupper($text, 'utf-8'));
}

function wrap($fontSize, $angle, $fontFace, $string, $width){
   
  $ret = "";
   
  $arr = explode(' ', $string);
   
  foreach ( $arr as $word ){
   
    $teststring = $ret.' '.$word;
    $testbox = imagettfbbox($fontSize, $angle, $fontFace, $teststring);
    if ( $testbox[2] > $width ){
      $ret.=($ret==""?"":"\n").$word;
    } else {
      $ret.=($ret==""?"":' ').$word;
    }
  }
   
  return $ret;
}

function removeOldFiles($directory, $period)
{
  $list = dirList($directory);
  $today = gettimeofday();
  for($i = 0; $i < count($list); $i++)
  {
    $fname = $directory . '/' . $list[$i];
    if(time() - filemtime($fname) > $period * 60)
    {
      unlink($fname);
    }
  }
}

function dirList ($directory) 
{

  // create an array to hold directory list
  $results = array();

  // create a handler for the directory
  $handler = opendir($directory);

  // keep going until all files in directory have been read
  while ($file = readdir($handler)) {

    // if $file isn't this directory or its parent, 
    // add it to the results array
    if ($file != '.' && $file != '..' && !is_dir($file))
      $results[] = $file;
  }

  // tidy up: close the handler
  closedir($handler);

  // done!
  return $results;

}

?>
