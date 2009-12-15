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
		<td><input type="text" tabindex="1" maxlength="25" name="person_name" class="f_input" /></td>
	      </tr>
	      <tr>
	        <td><br/></td>
	      </tr>
	      <tr><td colspan="2"><strong>Если ранее имели другие фамилии</strong></td></tr>
	      <tr>
		<td width="300" height="25">Фамилия, когда меняли и где</td>
		<td><input type="text" tabindex="1" id="person_name_old" name="person_name_old" class="f_input"></td>
	      </tr>
	      <tr>
	        <td><br/></td>
	      </tr>
              <tr>
		<td width="300" height="25">Дата рождения</td>
		<td><input type="text" tabindex="1" id="person_birthday" name="person_birthday" class="f_input"></td>
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
		<td><input type="text" tabindex="1" id="person_birth_address" name="person_birth_address" class="f_input"></td>
	      </tr>
	      <tr>
		<td width="300" height="25">Место жительства (регистрации)</td>
		<td><input type="text" tabindex="1" id="person_address" name="person_address" class="f_input"></td>
	      </tr>
              <tr>
		<td width="300" height="25">Гражданство</td>
		<td><input type="text" tabindex="1" id="person_citizenship" name="person_citizenship" class="f_input"></td>
              </tr>
	      <tr>
	        <td><br/></td>
	      </tr>
	      <tr><td colspan="2"><strong>Если одновременно имеете гражданство другого государства</strong></td></tr>
	      <tr>
		<td width="300" height="25">Государство</td>
		<td><input type="text" tabindex="1" id="person_citizenship_other" name="person_citizenship_other" class="f_input"></td>
              </tr>
	      <tr>
	        <td><br/></td>
	      </tr>
	      <tr><td colspan="2"><strong>Реквизиты паспорта гражданина РФ</strong></td></tr>
	      <tr>
		<td width="300" height="25">Серия</td>
		<td><input type="text" tabindex="1" id="person_passport_ser" name="person_passport_ser" class="f_input"></td>
              </tr>
              <tr>
		<td width="300" height="25">Номер</td>
		<td><input type="text" tabindex="1" id="person_passport_num" name="person_passport_num" class="f_input"></td>
              </tr>
              <tr>
		<td width="300" height="25">Дата выдачи</td>
		<td><input type="text" tabindex="1" id="person_passport_date" name="person_passport_date" class="f_input"></td>
              </tr>
              <tr>
		<td width="300" height="25">Кем выдан</td>
		<td><input type="text" tabindex="1" id="person_passport_org" name="person_passport_org" class="f_input"></td>
              </tr>
	      <tr>
	        <td><br/></td>
	      </tr>
	      <tr><td colspan="2"><strong>Если цель получения - постоянное проживание</strong></td></tr>
	      <tr>
		<td width="300" height="25">Страна</td>
		<td><input type="text" tabindex="1" id="purpose_country" name="purpose_country" class="f_input"></td>
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
		<td><input type="text" tabindex="1" id="secret_access_info" name="secret_access_info" class="f_input"></td>
              </tr>
	      <tr>
	        <td><br/></td>
	      </tr>
	      <tr><td colspan="2"><strong>Если есть договорные обязательства, препятствующие выездуx</strong></td></tr>
	      <tr>
		<td width="300" height="25">По линии какой организации и в каком году</td>
		<td><input type="text" tabindex="1" id="obligations_info" name="obligations_info" class="f_input"></td>
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
		<td><input type="text" tabindex="1" id="person_old_passport_ser" name="person_old_passport_ser" class="f_input"></td>
              </tr>
              <tr>
		<td width="300" height="25">Номер</td>
		<td><input type="text" tabindex="1" id="person_old_passport_num" name="person_old_passport_num" class="f_input"></td>
              </tr>
              <tr>
		<td width="300" height="25">Дата выдачи</td>
		<td><input type="text" tabindex="1" id="person_old_passport_date" name="person_old_passport_date" class="f_input"></td>
              </tr>
              <tr>
		<td width="300" height="25">Кем выдан</td>
		<td><input type="text" tabindex="1" id="person_old_passport_org" name="person_old_passport_org" class="f_input"></td>
              </tr>
	      <tr>
	        <td><br/></td>
	      </tr>
	    </table>
	  </td>
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
