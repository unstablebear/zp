
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="20" align="left" valign="top"><img src="{THEME}/images/dlet_abl01.gif" width="20" height="30" alt="" /></td>
    <td align="left" valign="top" class="abl02"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="abl121">
	<tr>
	  <td width="40" height="30"><img src="{THEME}/images/spacer.gif" width="40" height="1" alt="" /></td>
	  <td align="left" class="ntitle">Заявление о выдаче загранпаспорта</td>
	</tr>
    </table></td>
    <td width="20" align="right" valign="top"><img src="{THEME}/images/dlet_abl13.gif" width="20" height="30" alt="" /></td>
  </tr>
  <tr>
    <td width="20" align="left" valign="top"><img src="{THEME}/images/dlet_abl51.gif" width="20" height="30" alt="" /></td>
    <td align="left" valign="top" class="abl22"><table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	  <td height="30" class="abl221">&nbsp;</td>
	</tr>
    </table></td>
    <td width="20" align="right" valign="top"><img src="{THEME}/images/dlet_abl53.gif" width="20" height="30" alt="" /></td>
  </tr>
  <tr>
    <td width="20" align="left" valign="top" class="abl31"><img src="{THEME}/images/spacer.gif" width="20" height="1" alt="" /></td>
    <td align="left" valign="top" class="stext">
      <table width="680" border="0" cellspacing="0" cellpadding="0">
	<tr>
	  <td width="80" align="left" valign="top"><img src="{THEME}/images/statics-2.png" border="0" alt="" /></td>
	  <td width="600" align="left" valign="top">
	    <table width="100%" border="0" cellspacing="0" cellpadding="0">
	      <tr>
		<td >Ф.И.О. (полностью в именительном падеже)</td>
		<td><input type="text" tabindex="1" maxlength="35" name="person_name" class="f_input" value="{person_name}" onkeyup="fieldToUpperCase(this);"/></td>
	      </tr>
	      <tr>
	        <td><br/></td>
	      </tr>
	      <tr><td colspan="2" ><strong>Если ранее имели другие фамилии</strong></td></tr>
	      <tr>
		<td width="300" height="25" >Фамилия, когда меняли и где</td>
		<td><input type="text" tabindex="1" id="person_name_old" name="person_name_old" value="{person_name_old}" class="f_input"
			   maxlength="35" onkeyup='return fieldToUpperCase(this);'></td>
	      </tr>
	      <tr>
	        <td><br/></td>
	      </tr>
              <tr>
		<td width="300" height="25" >Дата рождения</td>
		<td><input type="text" tabindex="1" id="person_birthday" name="person_birthday" value="{person_birthday}" class="f_input" maxlength="10" onkeyup='return fieldToUpperCase(this);' ></td>
              </tr>
              <tr>
		<td width="300" height="25" >Пол<td>
		  <select name="person_sex" value="{person_sex}" id="person_sex" tabindex="1" class="f_select" style="height:20px;width:303px;">
		    <option value="муж" {person_msex_selected}>Мужской</option>
                    <option value="жен" {person_fsex_selected}>Женский</option>
		  </select>
              </tr>
	      <tr>
		<td width="300" height="25" >Место рождения</td>
		<td><input type="text" tabindex="1" id="person_birth_address" name="person_birth_address" value="{person_birth_address}" class="f_input" maxlength="70" onkeyup='return fieldToUpperCase(this);'></td>
	      </tr>
	      <tr>
		<td width="300" height="25" >Место жительства (регистрации)</td>
		<td><input type="text" tabindex="1" id="person_address" name="person_address" value="{person_address}" class="f_input"
			    maxlength="70"  onkeyup='return fieldToUpperCase(this);'></td>
	      </tr>
              <tr>
		<td width="300" height="25" >Гражданство</td>
		<td><input type="text" tabindex="1" id="person_citizenship" name="person_citizenship" value="{person_citizenship}" class="f_input" maxlength="30" onkeyup='return fieldToUpperCase(this);' ></td>
              </tr>
	      <tr>
	        <td><br/></td>
	      </tr>
	      <tr><td colspan="2" ><strong>Если одновременно имеете гражданство другого государства</strong></td></tr>
	      <tr>
		<td width="300" height="25" >Государство</td>
		<td><input type="text" tabindex="1" id="person_citizenship_other" name="person_citizenship_other" value="{person_citizenship_other}" class="f_input" maxlength="30"  onkeyup='return fieldToUpperCase(this);'></td>
              </tr>
	      <tr>
	        <td><br/></td>
	      </tr>
	      <tr><td colspan="2" ><strong>Реквизиты паспорта гражданина РФ</strong></td></tr>
	      <tr>
		<td width="300" height="25" >Серия</td>
		<td><input type="text" tabindex="1" id="person_passport_ser" name="person_passport_ser" value="{person_passport_ser}" class="f_input" maxlength="4"  onkeyup='return fieldToUpperCase(this);'></td>
              </tr>
              <tr>
		<td width="300" height="25" >Номер</td>
		<td><input type="text" tabindex="1" id="person_passport_num" name="person_passport_num" value="{person_passport_num}" class="f_input" maxlength="6"  onkeyup='return fieldToUpperCase(this);'></td>
              </tr>
              <tr>
		<td width="300" height="25" >Дата выдачи</td>
		<td><input type="text" tabindex="1" id="person_passport_date" name="person_passport_date" value="{person_passport_date}" class="f_input" maxlength="10"  onkeyup='return fieldToUpperCase(this);'></td>
              </tr>
              <tr>
		<td width="300" height="25" >Кем выдан</td>
		<td><input type="text" tabindex="1" id="person_passport_org" name="person_passport_org" value="{person_passport_org}" class="f_input" maxlength="100" onkeyup='return fieldToUpperCase(this);' ></td>
              </tr>
	      <tr>
	        <td><br/></td>
	      </tr>
	      <tr><td colspan="2" ><strong>Если цель получения - постоянное проживание</strong></td></tr>
	      <tr>
		<td width="300" height="25" >Страна</td>
		<td><input type="text" tabindex="1" id="purpose_country" name="purpose_country" value="{purpose_country}" class="f_input"
			    maxlength="30" onkeyup='return fieldToUpperCase(this);'></td>
              </tr>
	      <tr>
	        <td><br/></td>
	      </tr>
              <tr>
		<td width="300" height="25" >Получение паспорта</td>
		<td>
                  <select name="type_status" value="{type_status}" id="type_status" tabindex="1" class="f_select" style="height:20px;width:303px;">
		    <option value="первичное" {type_status_1_selected}>первичное</option>
		    <option value="взамен использованного" {type_status_2_selected}>взамен использованного</option>
		    <option value="взамен испорченного" {type_status_3_selected}>взамен испорченного</option>
		    <option value="взамен утраченного" {type_status_4_selected}>взамен утраченного</option>
                  </select>
		</td>
              </tr>
	      <tr>
	        <td><br/></td>
	      </tr>
	      <tr><td colspan="2" ><strong>Если был оформлен допуск к секретным сведениям</strong></td></tr>
	      <tr>
		<td width="300" height="25" >По линии какой организации и в каком году</td>
		<td><input type="text" tabindex="1" id="secret_access_info" name="secret_access_info" value="{secret_access_info}" class="f_input" maxlength="70"  onkeyup='return fieldToUpperCase(this);'></td>
              </tr>
	      <tr>
	        <td><br/></td>
	      </tr>
	      <tr><td colspan="2" ><strong>Если есть договорные обязательства, препятствующие выезду</strong></td></tr>
	      <tr>
		<td width="300" height="25" >По линии какой организации и в каком году</td>
		<td><input type="text" tabindex="1" id="obligations_info" name="obligations_info" value="{obligations_info}" class="f_input"
			    maxlength="70" onkeyup='return fieldToUpperCase(this);'></td>
              </tr>
	      <tr>
	        <td><br/></td>
	      </tr>
              <tr>
		<td width="300" height="25" >Нахождение на воинской (альтернативной) службе</td>
		<td height="25">
                  <select name="military_status" value="{military_status}" id="military_status" tabindex="1" class="f_select" style="height:20px;width:303px;">
                    <option value="Нет" {military_status_1_selected}>Нет</option>
                    <option value="Да" {military_status_2_selected}>Да</option>
                  </select>
		</td>
              </tr>
              <tr>
		<td width="300" height="25" >Осуждены (привлечены в качестве обвиняемого) ли Вы</td>
		<td>
                  <select name="criminal_status" value="{criminal_status}" id="criminal_status" tabindex="1" class="f_select" style="height:20px;width:303px;">
                    <option value="Нет" {criminal_status_1_selected}>Нет</option>
                    <option value="Да" {criminal_status_2_selected}>Да</option>
                  </select>
		</td>
              </tr>
              <tr>
		<td width="300" height="25"  >Не уклоняетесь ли Вы от исполнения судебных обязательств</td>
		<td>
                  <select name="judicial_obligations" value="{judicial_obligations}" id="judicial_obligations" tabindex="1" class="f_select" style="height:20px;width:303px;">
                    <option value="Нет" {judicial_obligations_1_selected}>Нет</option>
                    <option value="Да" {judicial_obligations_2_selected}>Да</option>
                  </select>
		</td>
              </tr>
	      <tr>
	        <td><br/></td>
	      </tr>
	      <tr><td colspan="2" ><strong>Реквизиты имеющегося заграничного паспорта (если есть)</strong></td></tr>
              <tr>
		<td width="300" height="25" >Серия</td>
		<td><input type="text" tabindex="1" id="person_old_passport_ser" name="person_old_passport_ser" value="{person_old_passport_ser}" class="f_input" maxlength="4"  onkeyup='return fieldToUpperCase(this);'></td>
              </tr>
              <tr>
		<td width="300" height="25" >Номер</td>
		<td><input type="text" tabindex="1" id="person_old_passport_num" name="person_old_passport_num" value="{person_old_passport_num}" class="f_input" maxlength="6"  onkeyup='return fieldToUpperCase(this);'></td>
              </tr>
              <tr>
		<td width="300" height="25" >Дата выдачи</td>
		<td><input type="text" tabindex="1" id="person_old_passport_date" name="person_old_passport_date" value="{person_old_passport_date}" class="f_input" maxlength="10"  onkeyup='return fieldToUpperCase(this);'></div>
		</td>
              </tr>
              <tr>
		<td width="300" height="25" >Кем выдан</td>
		<td><input type="text" tabindex="1" id="person_old_passport_org" name="person_old_passport_org" value="{person_old_passport_org}" class="f_input" maxlength="100"  onkeyup='return fieldToUpperCase(this);'></td>
              </tr>
	      <tr>
	        <td><br/></td>
	      </tr>
	      <tr>
	        <td colspan="2">
		  <table style="width:100px;" border="1" cellspacing="0" cellpadding="0">
		    <tr>
		      <td id="tbl_row">
			<table id="job_tbl" style="width:590px;table-layout: fixed;" border="0"  cellspacing="0" cellpadding="0">
			  <tr cellpadding="0">
			    <td colspan="2" class="f_input" style="width:144px;"><center><strong>Месяц и год</strong></center></td>
			    <td colspan="2" class="f_input" style="width:423px;"></td>
			    <td class="f_input" style="width:17px;"></td>
			  </tr>
			  <tr>
			    <td class="f_input" style="width:70px;padding: 1px 1px 1px 1px;" ><center><strong>поступ.</strong></center></td>
			    <td class="f_input" style="width:71px;padding: 1px 1px 1px 1px;"><center><strong>увольн.</strong></center></td>
			    <td class="f_input" style="width:204px;padding: 1px 1px 1px 1px;"><center><strong>Место работы и должность</strong></center></td>
			    <td class="f_input" style="width:203px;padding: 1px 1px 1px 1px;"><center><strong>Адрес предприятия</strong></center></td>
			    <td class="f_input" style="width:17px;padding: 1px 1px 1px 1px;"></td>
			  </tr>
			</table>
		      </td>
		    </tr>
		    <tr id="btn_row">
		      <td colspan="2" width="286">
			<img src="templates/{skin}/dleimages/plus_fav.gif" 
			     align="left" alt="Добавить строку" onclick="addRowToJobTable('{skin}');"/>
			&nbsp;<span onclick="addRowToJobTable('{skin}');">Добавить строку</span>
		      </td> 
		    </tr>
		  </table>
		</td>
	      </tr>
	      <tr>
	        <td><br/></td>
	      </tr>
	    </table>
	  </td>
	</tr>
        <tr>
          <td width="130" height="25">&nbsp;</td>
          <td >Если нужно отправить по e-mail укажите адрес&nbsp;<input name="email_addr" value="{email_addr}" type="text" class="f_input"/></td>
        </tr>
	<tr>
          <td width="130" height="25">&nbsp;</td>
	  <td>
	    <table>
	      <tr>
		<td ><input type="radio" value="1" {pdf_checked} name="pdf_or_jpeg"/>Форма PDF</td>
		<td ><input type="radio" value="2" {jpeg_checked} name="pdf_or_jpeg"/>Изображение(JPEG)</td>
	      </tr>
	    </table>
	  </td>
        <tr>
          <td width="130" height="25">&nbsp;</td>
          <!--td><input name="send_btn" type="image" style="width:80px; height:20px; cursor:hand" 
		     src="{THEME}/images/dlet_bttn_submit.gif" alt="Отправить PDF" /></td-->
	  <td><table>
	    <tr>
              <td ><input name="send_jpeg" type="submit" class="bbcodes_poll" value="Печать" /></td>
              <!--td><input name="send_jpeg" type="image" class="bbcodes" alt="Отправить PDF" /></td>	       
              <td><a id="send_jpeg_btn">Отправить JPEG</a></td-->	      
	    </tr>
	  </table></td>
        </tr>
      </table>
    </td>
    <td width="20" align="right" valign="top" class="abl33"><img src="{THEME}/images/spacer.gif" width="20" height="1" alt="" /></td>
  </tr>
  <tr>
    <td width="20" align="left" valign="top"><img src="{THEME}/images/dlet_abl31.gif" width="20" height="5" alt="" /></td>
    <td><img src="{THEME}/images/spacer.gif" width="1" height="5" alt="" /></td>
    <td width="20" align="right" valign="top"><img src="{THEME}/images/dlet_abl33.gif" width="20" height="5" alt="" /></td>
  </tr>
  <tr>
    <td width="20" align="left" valign="top"><img src="{THEME}/images/dlet_abl41.gif" width="20" height="40" alt="" /></td>
    <td class="abl42">&nbsp;</td>
    <td width="20" align="right" valign="top"><img src="{THEME}/images/dlet_abl43.gif" width="20" height="40" alt="" /></td>
  </tr>
</table>
<br />

<script type="text/javascript">

$(function()
{

  $('#person_birthday').datePicker({
    startDate: '01.01.1900',
    endDate: '31.12.2200',
    createButton:false,
    clickInput:true
  });
  $('#person_birthday').attr('style','text-align:center;');

  $('#person_passport_date').datePicker({
    startDate: '01.01.1900',
    endDate: '31.12.2200',
    createButton:false,
    clickInput:true
  });
  $('#person_passport_date').attr('style','text-align:center;');

  $('#person_old_passport_date').datePicker({
    startDate: '01.01.1900',
    endDate: '31.12.2200',
    createButton:false,
    clickInput:true
  });
  $('#person_old_passport_date').attr('style','text-align:center;');

  $.ui.dialog.defaults.bgiframe = true;

  $('#dialog').dialog({
    autoOpen: {jpeg_autoload}
  });
  $('#send_jpeg_btn').click(function() {
    $('#dialog').dialog('open');
  });
  $('#dialog').dialog('option', 'width', 590);
  $('#dialog').dialog('option', 'position', ['top', 'center']);

  $('#job_free_period_dialog').dialog({
    autoOpen: false,
    buttons: {
      "Отмена": function() {
        $(this).dialog("close");
      },
      "Oк": function() {
var idx = $('#job_free_period_dialog').attr('name').substr(1);
$('#job_name_' + idx).val('ВРЕМЕННО НЕ РАБОТАЛ');
$('#job_address_' + idx).val($('#job_free_period_address').val());
$(this).dialog("close");
      }
    }
  });
  $('#job_free_period_dialog').dialog('option', 'width', 400);
  $('#job_free_period_dialog').dialog('option', 'height', 140);
  $('#job_free_period_dialog').dialog('option', 'position', ['top', 'center']);

  // восстановление значений полей таблицы работ после сабмита
  var job_tbl_data = [{job_tbl_rows}];
  for(var i = 0; i < job_tbl_data.length / 4; i++) {
  	addRowToJobTable();
	$('#job_date_from_' + i).val(job_tbl_data[i * 4]);
	$('#job_date_to_'   + i).val(job_tbl_data[i * 4 + 1]);
	$('#job_name_'      + i).val(job_tbl_data[i * 4 + 2]);
	$('#job_address_'   + i).val(job_tbl_data[i * 4 + 3]);
  }

});

</script>

<div id="dialog" title="Заявление о выдаче загранпаспорта нового поколения" >
  {jpeg_form_html}
</div>

<div id="job_free_period_dialog" title="" >
  <input style="width:365px;" id="job_free_period_address" type="text" class="f_input"/>
</div>

