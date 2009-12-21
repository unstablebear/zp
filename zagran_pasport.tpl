<script type="text/JavaScript">
  function addRow(r, first_row_id, max_count) {
  var root = r.parentNode.parentNode;//the root
  root = root.getElementsByTagName('tr')[0];//the rows' collection
  root = root.getElementsByTagName('td')[0];//the rows' collection
  root = root.getElementsByTagName('table')[0];//the rows' collection

  var allRows = root.getElementsByTagName('tr');//the rows' collection
  if (allRows.length < max_count) {
    var first_row = document.getElementById(first_row_id);
    var first_inp = first_row.getElementsByTagName('input');
    var cRow = first_row.cloneNode(true)//the clone of the 1st row
    var cInp = cRow.getElementsByTagName('input');//the inputs' collection of the 1st row
    for(var i=0;i < cInp.length;i++) {
	  	  cInp[i].setAttribute('name',first_inp[i].getAttribute('name')+'_'+(allRows.length+1))
		  cInp[i].value = '';

		  }
    var cSel = cRow.getElementsByTagName('a')[0];
    cSel.setAttribute('name',cSel.getAttribute('name')+'_'+(allRows.length+1));//change the selecet's name
    root = root.getElementsByTagName('tbody')[0];
    root.appendChild(cRow);//appends the cloned row as a new row
  }
}

function deleteRow(r, first_row_id) {
  var root = r.parentNode.parentNode.parentNode.parentNode;//the root
  root = root.getElementsByTagName('tbody')[0];
  var allRows = root.getElementsByTagName('tr');

  if(allRows.length > 3)
  {					      
    root.removeChild(r.parentNode.parentNode);
  
    var first_row = document.getElementById(first_row_id);
    var first_inp = first_row.getElementsByTagName('input');
  
    var fl = false;							
    for(var j = 0; j < allRows.length; j++) {
      if(allRows[j] == first_row) {
        fl = true;
      }
      if(fl) {
        var cInp = allRows[j].getElementsByTagName('input');
  
        for(var i=0;i < cInp.length;i++) {
  	 	  cInp[i].setAttribute('name',first_inp[i].getAttribute('name')+'_'+j)
  		  cInp[i].value = '';
        }
      }
    }							
  }
}

</script>

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
	    <table width="600" border="0" cellspacing="0" cellpadding="0">
	      <tr>
		<td>Ф.И.О. (полностью в именительном падеже)</td>
		<td><input type="text" tabindex="1" maxlength="35" name="person_name" class="f_input" /></td>
	      </tr>
	      <tr>
	        <td><br/></td>
	      </tr>
	      <tr><td colspan="2"><strong>Если ранее имели другие фамилии</strong></td></tr>
	      <tr>
		<td width="300" height="25">Фамилия, когда меняли и где</td>
		<td><input type="text" tabindex="1" id="person_name_old" name="person_name_old" class="f_input" maxlength="35" ></td>
	      </tr>
	      <tr>
	        <td><br/></td>
	      </tr>
              <tr>
		<td width="300" height="25">Дата рождения</td>
		<td><input type="text" tabindex="1" id="person_birthday" name="person_birthday" class="f_input"  maxlength="10" ></td>
              </tr>
              <tr>
		<td width="300" height="25">Пол<td>
		  <select name="person_sex" id="person_sex" tabindex="1" class="f_select" style="height:20px;width:303px;">
		    <option value="муж" >Мужской</option>
                    <option value="жен" >Женский</option>
		  </select>
              </tr>
	      <tr>
		<td width="300" height="25">Место рождения</td>
		<td><input type="text" tabindex="1" id="person_birth_address" name="person_birth_address" class="f_input" maxlength="70" ></td>
	      </tr>
	      <tr>
		<td width="300" height="25">Место жительства (регистрации)</td>
		<td><input type="text" tabindex="1" id="person_address" name="person_address" class="f_input" maxlength="70" ></td>
	      </tr>
              <tr>
		<td width="300" height="25">Гражданство</td>
		<td><input type="text" tabindex="1" id="person_citizenship" name="person_citizenship" class="f_input" maxlength="30" ></td>
              </tr>
	      <tr>
	        <td><br/></td>
	      </tr>
	      <tr><td colspan="2"><strong>Если одновременно имеете гражданство другого государства</strong></td></tr>
	      <tr>
		<td width="300" height="25">Государство</td>
		<td><input type="text" tabindex="1" id="person_citizenship_other" name="person_citizenship_other" class="f_input" maxlength="30" ></td>
              </tr>
	      <tr>
	        <td><br/></td>
	      </tr>
	      <tr><td colspan="2"><strong>Реквизиты паспорта гражданина РФ</strong></td></tr>
	      <tr>
		<td width="300" height="25">Серия</td>
		<td><input type="text" tabindex="1" id="person_passport_ser" name="person_passport_ser" class="f_input" maxlength="4" ></td>
              </tr>
              <tr>
		<td width="300" height="25">Номер</td>
		<td><input type="text" tabindex="1" id="person_passport_num" name="person_passport_num" class="f_input" maxlength="6" ></td>
              </tr>
              <tr>
		<td width="300" height="25">Дата выдачи</td>
		<td><input type="text" tabindex="1" id="person_passport_date" name="person_passport_date" class="f_input" maxlength="10" ></td>
              </tr>
              <tr>
		<td width="300" height="25">Кем выдан</td>
		<td><input type="text" tabindex="1" id="person_passport_org" name="person_passport_org" class="f_input" maxlength="100" ></td>
              </tr>
	      <tr>
	        <td><br/></td>
	      </tr>
	      <tr><td colspan="2"><strong>Если цель получения - постоянное проживание</strong></td></tr>
	      <tr>
		<td width="300" height="25">Страна</td>
		<td><input type="text" tabindex="1" id="purpose_country" name="purpose_country" class="f_input" maxlength="30"></td>
              </tr>
	      <tr>
	        <td><br/></td>
	      </tr>
              <tr>
		<td width="300" height="25">Получение паспорта</td>
		<td>
                  <select name="type_status" id="type_status" tabindex="1" class="f_select" style="height:20px;width:303px;">
		    <option value="первичное" >первичное</option>
		    <option value="взамен использованного" >взамен использованного</option>
		    <option value="взамен испорченного" >взамен испорченного</option>
		    <option value="взамен утраченного" >взамен утраченного</option>
                  </select>
		</td>
              </tr>
	      <tr>
	        <td><br/></td>
	      </tr>
	      <tr><td colspan="2"><strong>Если был оформлен допуск к секретным сведениям</strong></td></tr>
	      <tr>
		<td width="300" height="25">По линии какой организации и в каком году</td>
		<td><input type="text" tabindex="1" id="secret_access_info" name="secret_access_info" class="f_input" maxlength="70"></td>
              </tr>
	      <tr>
	        <td><br/></td>
	      </tr>
	      <tr><td colspan="2"><strong>Если есть договорные обязательства, препятствующие выездуx</strong></td></tr>
	      <tr>
		<td width="300" height="25">По линии какой организации и в каком году</td>
		<td><input type="text" tabindex="1" id="obligations_info" name="obligations_info" class="f_input" maxlength="70"></td>
              </tr>
	      <tr>
	        <td><br/></td>
	      </tr>
              <tr>
		<td width="300" height="25">Нахождение на воинской (альтернативной) службе</td>
		<td height="25">
                  <select name="military_status" id="military_status" tabindex="1" class="f_select" style="height:20px;width:303px;">
                    <option value="Нет">Нет</option>
                    <option value="Да">Да</option>
                  </select>
		</td>
              </tr>
              <tr>
		<td width="300" height="25">Осуждены (привлечены в качестве обвиняемого) ли Вы</td>
		<td>
                  <select name="criminal_status" id="criminal_status" tabindex="1" class="f_select" style="height:20px;width:303px;">
                    <option value="Нет">Нет</option>
                    <option value="Да">Да</option>
                  </select>
		</td>
              </tr>
	      <tr>
	        <td><br/></td>
	      </tr>
	      <tr><td colspan="2"><strong>Реквизиты имеющегося заграничного паспорта (если есть)</strong></td></tr>
              <tr>
		<td width="300" height="25">Серия</td>
		<td><input type="text" tabindex="1" id="person_old_passport_ser" name="person_old_passport_ser" class="f_input" maxlength="4" ></td>
              </tr>
              <tr>
		<td width="300" height="25">Номер</td>
		<td><input type="text" tabindex="1" id="person_old_passport_num" name="person_old_passport_num" class="f_input" maxlength="6" ></td>
              </tr>
              <tr>
		<td width="300" height="25">Дата выдачи</td>
		<td><input type="text" tabindex="1" id="person_old_passport_date" name="person_old_passport_date" class="f_input" maxlength="10" ></td>
              </tr>
              <tr>
		<td width="300" height="25">Кем выдан</td>
		<td><input type="text" tabindex="1" id="person_old_passport_org" name="person_old_passport_org" class="f_input" maxlength="100" ></td>
              </tr>
	      <tr>
	        <td><br/></td>
	      </tr>
	      <tr>
	        <td colspan="2">
		  <table width="100%"  border="1" cellspacing="0" cellpadding="0">
		    <tr>
		      <td id="tbl_row">
			<table id="job_tbl" width="100%" border="0"  cellspacing="0" cellpadding="0">
			  <tr>
			    <td colspan="2" class="f_input" style="width:120px;"><center><strong>Месяц и год</strong></center></td>
			    <td colspan="2" class="f_input" style="width:240px;"></td>
			    <td colspan="2" class="f_input" style="width:240px;"></td>
			  </tr>
			  <tr>
			    <td class="f_input"><center><strong>поступ.</strong></center></td>
			    <td class="f_input"><center><strong>увольн.</strong></center></td>
			    <td class="f_input"><center><strong>Место работы и должность</strong></center></td>
			    <td class="f_input"><center><strong>Адрес предприятия</strong></center></td>
			    <td class="f_input"></td>
			    <td ></td>
			  </tr>
			  <tr id="job_tbl_row">
			    <td width="191"><input type="text" name="job_date_from" class="f_input" style="width:60px;"/></td>
			    <td width="191"><input type="text" name="job_date_to" class="f_input" style="width:60px;"/></td> 
			    <td width="191"><input type="text" name="job_name" class="f_input" style="width:225px;"/></td>
			    <td width="191"><input type="text" name="job_address" class="f_input" style="width:225px;"/></td> 
			    <td width="20" class="abl221" style="width:20px;">
			      <input name="button" type="button" value="" onclick="deleteRow(this, 'job_tbl_row')" style="width:20px;">
			    </td>
			    <td width="0">
			      <a/>
			    </td>
			  </tr>
			</table>
		      </td>
		    </tr>
		    <tr id="btn_row">
		      <td colspan="2" width="286">
			<input name="button" type="button" value="" onclick="addRow(this.parentNode.parentNode, 'job_tbl_row', 14)">
		      </td> 
		    </tr>
		  </table>
		</td>
	      </tr>
	      <tr>
		<td><br/></td>
	      </tr>
	      <tr>
	        <td colspan="2">
		  <table width="100%"  border="1" cellspacing="0" cellpadding="0">
		    <tr>
		      <td id="tbl_row">
			<table id="child_tbl" width="100%" border="0"  cellspacing="0" cellpadding="0">
			  <tr>
			    <td colspan="2" class="f_input" style="width:550px;"><center><strong>Сведения о детях</strong></center></td>
			    <td colspan="2" class="f_input" style="width:50px;"></td>
			  </tr>
			  <tr>
			    <td class="f_input"><center><strong>Ф.И.О. ребенка</strong></center></td>
			    <td class="f_input"><center><strong>Число, месяц, год и место рождения</strong></center></td>
			    <td class="f_input"></td>
			    <td ></td>
			  </tr>
			  <tr id="child_tbl_row">
			    <td width="191"><input type="text" name="child_name" class="f_input" style="width:275px;"/></td>
			    <td width="191"><input type="text" name="child_birthday" class="f_input" style="width:275px;"/></td> 
			    <td width="20" class="abl221" style="width:20px;">
			      <input name="button" type="button" value="-" onclick="deleteRow(this, 'child_tbl_row')">
			    </td>
			    <td width="0">
			      <a/>
			    </td>
			  </tr>
			</table>
		      </td>
		    </tr>
		    <tr id="btn_row">
		      <td colspan="2" width="286">
			<input name="button" type="button" value="+" onclick="addRow(this.parentNode.parentNode, 'child_tbl_row', 8)">
		      </td> 
		    </tr>
		  </table>
		</td>
	      </tr>

	    </table>
	  </td>
	</tr>
        <tr>
          <td width="130" height="25">&nbsp;</td>
          <td><input name="send_btn" type="image" style="width:80px; height:20px; cursor:hand" 
		     src="{THEME}/images/dlet_bttn_submit.gif" alt="Отправить" /></td>
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

