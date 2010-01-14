
<script type="text/javascript">

  function addRowToJobTable() {
   
    var newRow = document.getElementById("job_tbl").insertRow(-1);
    var idx = newRow.rowIndex - 2;

    var oCell = newRow.insertCell(-1);
    oCell.innerHTML = '<div class="date_input_6"><input type="text" id="job_date_from_' + idx + '" name="job_date_from_' + idx  + '" class="f_input" style="width:70px;text-align:center;padding: 1px 1px 1px 1px;border: 1;" onkeyup="return fieldToUpperCase(this);"/></div>';
    $('#job_date_from_' + idx).mask("99.9999", {placeholder:" "});
    
    
    oCell = newRow.insertCell(-1);
    oCell.innerHTML = '<div class="date_input_6"><input type="text" id="job_date_to_' + idx + '" name="job_date_to_' + idx  + '" class="f_input" style="width:71px;text-align:center;padding: 1px 1px 1px 1px;border: 1;" onkeyup="return fieldToUpperCase(this);"/></div>';
    $('#job_date_to_' + idx).mask("99.9999", {placeholder:" "});

    
    oCell = newRow.insertCell(-1);
    oCell.innerHTML = '<input type="text" name="job_name_' + idx  + '" id="job_name_' + idx  + '" class="f_input" style="width:210px;padding: 1px 1px 1px 1px;border: 1;" onkeyup="return fieldToUpperCase(this);"/>';   


    oCell = newRow.insertCell(-1);
    oCell.innerHTML = '<input type="text" name="job_address_' + idx  + '" id="job_address_' + idx  + '" class="f_input" style="width:209px;padding: 1px 1px 1px 1px;border: 1;" onkeyup="return fieldToUpperCase(this);"/>';   


    oCell = newRow.insertCell(-1);

    oCell.className = "f_input";
    oCell.innerHTML = '<img class="delete" src="templates/{skin}/dleimages/minus_fav.gif" alt="��." style="width:16px;padding: 0px 0px;border: 1;" onclick="removeRow(this, 0);" />';   


    if(idx == 0) {
      var today = new Date();
      today.setFullYear(today.getFullYear() - 10);
      $('#job_date_from_0').val((today.getMonth() + 1) + '.' + today.getFullYear());
    }
  }

  function removeRow(src, tbl_name_idx) {
    var tbl_name = '';
    if(tbl_name_idx == 0) {
      tbl_name = 'job_tbl';
    } else {
      tbl_name = 'child_tbl';
    }
    var oRow = src.parentNode.parentNode;  
    var allRows = oRow.parentNode.getElementsByTagName('tr');     
    document.getElementById(tbl_name).deleteRow(oRow.rowIndex);
    var idx = 0;
    for(var i = 0; i < allRows.length; i++) {
       var cInp = allRows[i].getElementsByTagName('input');
       if(cInp.length > 0) {
         for(var j = 0; j < cInp.length; j++) {
	     var i_name = cInp[j].getAttribute('name');
	     cInp[j].setAttribute('name', i_name.substr(0, i_name.lastIndexOf('_')) + '_' + idx);
         }
	 idx++;
       }
     }
   }

  function fieldToUpperCase(f) {
//    alert("1");
    f.value = f.value.toUpperCase();
  }

</script>

<div id="dialog" title="��������� � ������ �������������� ������ ���������" >
  {jpeg_form_html}
</div>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="20" align="left" valign="top"><img src="{THEME}/images/dlet_abl01.gif" width="20" height="30" alt="" /></td>
    <td align="left" valign="top" class="abl02"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="abl121">
	<tr>
	  <td width="40" height="30"><img src="{THEME}/images/spacer.gif" width="40" height="1" alt="" /></td>
	  <td align="left" class="ntitle">��������� � ������ ��������������</td>
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
		<td >�.�.�. (��������� � ������������ ������)</td>
		<td><input type="text" tabindex="1" maxlength="35" name="person_name" class="f_input" value="{person_name}" onkeyup="fieldToUpperCase(this);"/></td>
	      </tr>
	      <tr>
	        <td><br/></td>
	      </tr>
	      <tr><td colspan="2" ><strong>���� ����� ����� ������ �������</strong></td></tr>
	      <tr>
		<td width="300" height="25" >�������, ����� ������ � ���</td>
		<td><input type="text" tabindex="1" id="person_name_old" name="person_name_old" value="{person_name_old}" class="f_input"
			   maxlength="35" onkeyup='return fieldToUpperCase(this);'></td>
	      </tr>
	      <tr>
	        <td><br/></td>
	      </tr>
              <tr>
		<td width="300" height="25" >���� ��������</td>
		<td><input type="text" tabindex="1" id="person_birthday" name="person_birthday" value="{person_birthday}" class="f_input" maxlength="10" onkeyup='return fieldToUpperCase(this);' ></td>
              </tr>
              <tr>
		<td width="300" height="25" >���<td>
		  <select name="person_sex" value="{person_sex}" id="person_sex" tabindex="1" class="f_select" style="height:20px;width:303px;">
		    <option value="���" {person_msex_selected}>�������</option>
                    <option value="���" {person_fsex_selected}>�������</option>
		  </select>
              </tr>
	      <tr>
		<td width="300" height="25" >����� ��������</td>
		<td><input type="text" tabindex="1" id="person_birth_address" name="person_birth_address" value="{person_birth_address}" class="f_input" maxlength="70" onkeyup='return fieldToUpperCase(this);'></td>
	      </tr>
	      <tr>
		<td width="300" height="25" >����� ���������� (�����������)</td>
		<td><input type="text" tabindex="1" id="person_address" name="person_address" value="{person_address}" class="f_input"
			    maxlength="70"  onkeyup='return fieldToUpperCase(this);'></td>
	      </tr>
              <tr>
		<td width="300" height="25" >�����������</td>
		<td><input type="text" tabindex="1" id="person_citizenship" name="person_citizenship" value="{person_citizenship}" class="f_input" maxlength="30" onkeyup='return fieldToUpperCase(this);' ></td>
              </tr>
	      <tr>
	        <td><br/></td>
	      </tr>
	      <tr><td colspan="2" ><strong>���� ������������ ������ ����������� ������� �����������</strong></td></tr>
	      <tr>
		<td width="300" height="25" >�����������</td>
		<td><input type="text" tabindex="1" id="person_citizenship_other" name="person_citizenship_other" value="{person_citizenship_other}" class="f_input" maxlength="30"  onkeyup='return fieldToUpperCase(this);'></td>
              </tr>
	      <tr>
	        <td><br/></td>
	      </tr>
	      <tr><td colspan="2" ><strong>��������� �������� ���������� ��</strong></td></tr>
	      <tr>
		<td width="300" height="25" >�����</td>
		<td><input type="text" tabindex="1" id="person_passport_ser" name="person_passport_ser" value="{person_passport_ser}" class="f_input" maxlength="4"  onkeyup='return fieldToUpperCase(this);'></td>
              </tr>
              <tr>
		<td width="300" height="25" >�����</td>
		<td><input type="text" tabindex="1" id="person_passport_num" name="person_passport_num" value="{person_passport_num}" class="f_input" maxlength="6"  onkeyup='return fieldToUpperCase(this);'></td>
              </tr>
              <tr>
		<td width="300" height="25" >���� ������</td>
		<td><input type="text" tabindex="1" id="person_passport_date" name="person_passport_date" value="{person_passport_date}" class="f_input" maxlength="10"  onkeyup='return fieldToUpperCase(this);'></td>
              </tr>
              <tr>
		<td width="300" height="25" >��� �����</td>
		<td><input type="text" tabindex="1" id="person_passport_org" name="person_passport_org" value="{person_passport_org}" class="f_input" maxlength="100" onkeyup='return fieldToUpperCase(this);' ></td>
              </tr>
	      <tr>
	        <td><br/></td>
	      </tr>
	      <tr><td colspan="2" ><strong>���� ���� ��������� - ���������� ����������</strong></td></tr>
	      <tr>
		<td width="300" height="25" >������</td>
		<td><input type="text" tabindex="1" id="purpose_country" name="purpose_country" value="{purpose_country}" class="f_input"
			    maxlength="30" onkeyup='return fieldToUpperCase(this);'></td>
              </tr>
	      <tr>
	        <td><br/></td>
	      </tr>
              <tr>
		<td width="300" height="25" >��������� ��������</td>
		<td>
                  <select name="type_status" value="{type_status}" id="type_status" tabindex="1" class="f_select" style="height:20px;width:303px;">
		    <option value="���������" {type_status_1_selected}>���������</option>
		    <option value="������ ���������������" {type_status_2_selected}>������ ���������������</option>
		    <option value="������ ������������" {type_status_3_selected}>������ ������������</option>
		    <option value="������ �����������" {type_status_4_selected}>������ �����������</option>
                  </select>
		</td>
              </tr>
	      <tr>
	        <td><br/></td>
	      </tr>
	      <tr><td colspan="2" ><strong>���� ��� �������� ������ � ��������� ���������</strong></td></tr>
	      <tr>
		<td width="300" height="25" >�� ����� ����� ����������� � � ����� ����</td>
		<td><input type="text" tabindex="1" id="secret_access_info" name="secret_access_info" value="{secret_access_info}" class="f_input" maxlength="70"  onkeyup='return fieldToUpperCase(this);'></td>
              </tr>
	      <tr>
	        <td><br/></td>
	      </tr>
	      <tr><td colspan="2" ><strong>���� ���� ���������� �������������, �������������� ������</strong></td></tr>
	      <tr>
		<td width="300" height="25" >�� ����� ����� ����������� � � ����� ����</td>
		<td><input type="text" tabindex="1" id="obligations_info" name="obligations_info" value="{obligations_info}" class="f_input"
			    maxlength="70" onkeyup='return fieldToUpperCase(this);'></td>
              </tr>
	      <tr>
	        <td><br/></td>
	      </tr>
              <tr>
		<td width="300" height="25" >���������� �� �������� (��������������) ������</td>
		<td height="25">
                  <select name="military_status" value="{military_status}" id="military_status" tabindex="1" class="f_select" style="height:20px;width:303px;">
                    <option value="���" {military_status_1_selected}>���</option>
                    <option value="��" {military_status_2_selected}>��</option>
                  </select>
		</td>
              </tr>
              <tr>
		<td width="300" height="25" >�������� (���������� � �������� �����������) �� ��</td>
		<td>
                  <select name="criminal_status" value="{criminal_status}" id="criminal_status" tabindex="1" class="f_select" style="height:20px;width:303px;">
                    <option value="���" {criminal_status_1_selected}>���</option>
                    <option value="��" {criminal_status_2_selected}>��</option>
                  </select>
		</td>
              </tr>
              <tr>
		<td width="300" height="25"  >�� ����������� �� �� �� ���������� �������� ������������</td>
		<td>
                  <select name="judicial_obligations" value="{judicial_obligations}" id="judicial_obligations" tabindex="1" class="f_select" style="height:20px;width:303px;">
                    <option value="���" {judicial_obligations_1_selected}>���</option>
                    <option value="��" {judicial_obligations_2_selected}>��</option>
                  </select>
		</td>
              </tr>
	      <tr>
	        <td><br/></td>
	      </tr>
	      <tr><td colspan="2" ><strong>��������� ���������� ������������ �������� (���� ����)</strong></td></tr>
              <tr>
		<td width="300" height="25" >�����</td>
		<td><input type="text" tabindex="1" id="person_old_passport_ser" name="person_old_passport_ser" value="{person_old_passport_ser}" class="f_input" maxlength="4"  onkeyup='return fieldToUpperCase(this);'></td>
              </tr>
              <tr>
		<td width="300" height="25" >�����</td>
		<td><input type="text" tabindex="1" id="person_old_passport_num" name="person_old_passport_num" value="{person_old_passport_num}" class="f_input" maxlength="6"  onkeyup='return fieldToUpperCase(this);'></td>
              </tr>
              <tr>
		<td width="300" height="25" >���� ������</td>
		<td><input type="text" tabindex="1" id="person_old_passport_date" name="person_old_passport_date" value="{person_old_passport_date}" class="f_input" maxlength="10"  onkeyup='return fieldToUpperCase(this);'></div>
		</td>
              </tr>
              <tr>
		<td width="300" height="25" >��� �����</td>
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
			    <td colspan="2" class="f_input" style="width:144px;"><center><strong>����� � ���</strong></center></td>
			    <td colspan="2" class="f_input" style="width:423px;"></td>
			    <td class="f_input" style="width:17px;"></td>
			  </tr>
			  <tr>
			    <td class="f_input" style="width:70px;padding: 1px 1px 1px 1px;" ><center><strong>������.</strong></center></td>
			    <td class="f_input" style="width:71px;padding: 1px 1px 1px 1px;"><center><strong>������.</strong></center></td>
			    <td class="f_input" style="width:204px;padding: 1px 1px 1px 1px;"><center><strong>����� ������ � ���������</strong></center></td>
			    <td class="f_input" style="width:203px;padding: 1px 1px 1px 1px;"><center><strong>����� �����������</strong></center></td>
			    <td class="f_input" style="width:17px;padding: 1px 1px 1px 1px;"></td>
			  </tr>
			</table>
		      </td>
		    </tr>
		    <tr id="btn_row">
		      <td colspan="2" width="286">
			<img src="templates/{skin}/dleimages/plus_fav.gif" 
			     align="left" alt="�������� ������" onclick="addRowToJobTable();"/>
			&nbsp;<span onclick="addRowToJobTable();">�������� ������</span>
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
          <td >���� ����� ��������� �� e-mail ������� �����&nbsp;<input name="email_addr" value="{email_addr}" type="text" class="f_input"/></td>
        </tr>
	<tr>
          <td width="130" height="25">&nbsp;</td>
	  <td>
	    <table>
	      <tr>
		<td ><input type="radio" value="1" checked="{pdf_checked}" name="pdf_or_jpeg"/>����� PDF</td>
		<td ><input type="radio" value="2" checked="{jpeg_checked}" name="pdf_or_jpeg"/>�����������(JPEG)</td>
	      </tr>
	    </table>
	  </td>
        <tr>
          <td width="130" height="25">&nbsp;</td>
          <!--td><input name="send_btn" type="image" style="width:80px; height:20px; cursor:hand" 
		     src="{THEME}/images/dlet_bttn_submit.gif" alt="��������� PDF" /></td-->
	  <td><table>
	    <tr>
              <td style="width: 100px; height:25px;"><input style="width: 100px; height: 25px;" name="send_jpeg" type="image" class="bbcodes_poll" alt="��������� PDF" /></td>	       
              <!--td><input name="send_jpeg" type="image" class="bbcodes" alt="��������� PDF" /></td>	       
              <td><a id="send_jpeg_btn">��������� JPEG</a></td-->	      
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

/*  $('#person_birthday').datePicker({
    startDate: '01.01.1900',
    endDate: '31.12.2200',
    createButton:false,
    clickInput:true
  });*/
  $('#person_birthday').attr('style','text-align:center;');

/*  $('#person_passport_date').datePicker({
    startDate: '01.01.1900',
    endDate: '31.12.2200',
    createButton:false,
    clickInput:true
  });*/
  $('#person_passport_date').attr('style','text-align:center;');

/*  $('#person_old_passport_date').datePicker({
    startDate: '01.01.1900',
    endDate: '31.12.2200',
    createButton:false,
    clickInput:true
  });*/
  $('#person_old_passport_date').attr('style','text-align:center;');

//  $('.f_input').attr('onkeyup', 
//'alert("1");');
//'fieldToUpperCase(this);');
//'javascript:this.value=this.value.touppercase()');
//  $('#job_tbl .f_input').attr('onKeyUp','');

  $.ui.dialog.defaults.bgiframe = true;
  $('#dialog').dialog({
    autoOpen: {jpeg_autoload}
  });
  $('#send_jpeg_btn').click(function() {
    $('#dialog').dialog('open');
  });
  $('#dialog').dialog('option', 'width', 570);
  $('#dialog').dialog('option', 'position', ['top', 'center']);

  var job_tbl_data = [{job_tbl_rows}];
  for(var i = 0; i < job_tbl_data.length / 4; i++) {
  	addRowToJobTable();
//	alert('#job_name_'      + i);
	$('#job_date_from_' + i).val(job_tbl_data[i * 4]);
	$('#job_date_to_'   + i).val(job_tbl_data[i * 4 + 1]);
	$('#job_name_'      + i).val(job_tbl_data[i * 4 + 2]);
	$('#job_address_'   + i).val(job_tbl_data[i * 4 + 3]);
  }

});

</script>

