function trimJobDateVal(t)
{
	if(t.value.length > 7)
		t.value = t.value.substr(3, 8);
}


function addRowToJobTable(skin) {
   
	var newRow = document.getElementById("job_tbl").insertRow(-1);
	var idx = newRow.rowIndex - 2;

	var oCell = newRow.insertCell(-1);
	oCell.innerHTML = '<div class="date_input_6"><input type="text" id="job_date_from_' + idx + '" name="job_date_from_' + idx  + '" class="f_input" style="width:70px;text-align:center;padding: 1px 1px 1px 1px;border: 1;" onkeyup="return fieldToUpperCase(this);" onchange="trimJobDateVal(this);checkForFreePeriod(' + idx + ');"/></div>';
	$('#job_date_from_' + idx).datePicker({
			startDate: '01.01.1900',
				endDate: '31.12.2200',
				createButton:false,
				clickInput:true
				});

	//	$('#job_date_from_' + idx).attr('onchange', 'trimJobDateVal(this);');
	//checkForFreePeriod(' + idx + ');');

	oCell = newRow.insertCell(-1);
	oCell.innerHTML = '<div class="date_input_6"><input type="text" id="job_date_to_' + idx + '" name="job_date_to_' + idx  + '" class="f_input" style="width:71px;text-align:center;padding: 1px 1px 1px 1px;border: 1;" onkeyup="return fieldToUpperCase(this);" onchange="trimJobDateVal(this);"/></div>';
	$('#job_date_to_' + idx).datePicker({
			startDate: '01.01.1900',
				endDate: '31.12.2200',
				createButton:false,
				clickInput:true
				});
	//	$('#job_date_to_' + idx).attr('onchange', 'trimJobDateVal(this);');

	oCell = newRow.insertCell(-1);
	oCell.innerHTML = '<input type="text" name="job_name_' + idx  + '" id="job_name_' + idx  + '" class="f_input" style="width:210px;padding: 1px 1px 1px 1px;border: 1;" onkeyup="return fieldToUpperCase(this);"/>';   


	oCell = newRow.insertCell(-1);
	oCell.innerHTML = '<input type="text" name="job_address_' + idx  + '" id="job_address_' + idx  + '" class="f_input" style="width:209px;padding: 1px 1px 1px 1px;border: 1;" onkeyup="return fieldToUpperCase(this);"/>';   

	oCell = newRow.insertCell(-1);

	oCell.className = "f_input";
	oCell.innerHTML = '<img class="delete" src="templates/' + skin + '/dleimages/minus_fav.gif" alt="уд." style="width:16px;padding: 0px 0px;border: 1;" onclick="removeRow(this, 0);" />';   

	if(idx == 0) {
		var today = new Date();
		today.setFullYear(today.getFullYear() - 10);
		var tdy = (today.getMonth() + 1) + '.' + today.getFullYear()
			if(tdy.length < 7)
				tdy = '0' + tdy;
		$('#job_date_from_0').val(tdy);
	}

}

function checkForFreePeriod(idx)
{
	var last_period_end = $('#job_date_to_' + (idx - 1)).val();
	var new_period_start = $('#job_date_from_' + idx).val();
	var lpe_month = last_period_end.substr(0,2);
	var lpe_year = last_period_end.substr(3);
	var nps_month = new_period_start.substr(0,2);
	var nps_year = new_period_start.substr(3);

	var was_a_free_period = false
	if(nps_year - lpe_year == 0 && nps_month - lpe_month > 1)
	{
		was_a_free_period = true;
	}
	else if(nps_year - lpe_year == 1 && (nps_month + 11 > lpe_month)) {
		was_a_free_period = true;
	}
	else if(nps_year - lpe_year > 1)  
	{
		was_a_free_period = true;
	} 
	else if((nps_year - lpe_year == 0 && nps_month - lpe_month < 0) || (nps_year < lpe_year)) 
	{
		alert("Ќеверный диапазон! ƒата поступлени€ на работу более ранн€€ чем дата последнего увольнени€!");
		$('#job_date_from_' + idx).val('');
		return;
	}
	if(was_a_free_period)
	{
		$('#job_date_from_' + idx).val(last_period_end);
		$('#job_date_to_' + idx).val(new_period_start);
		$('#ui-dialog-title-job_free_period_dialog').html('”кажите где вы проживали в период с ' + 
								  last_period_end + ' по ' + new_period_start);
		$('#job_free_period_dialog').attr('name', 'n' + idx);
		$('#job_free_period_dialog').dialog('open');
	}
	//	alert(lpe_month + ' ' + nps_month + ' ' + (nps_month - lpe_month) + ' ' + lpe_year + ' ' + nps_year);
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
	f.value = f.value.toUpperCase();
}

function IsValidDate(Day,Mn,Yr){
	var DateVal = Mn + "/" + Day + "/" + Yr;
	var dt = new Date(DateVal);

	if(dt.getDate()!=Day){
		alert('Invalid Date');
		return(false);
        }
	else if(dt.getMonth()!=Mn-1){
		//this is for the purpose JavaScript starts the month from 0

		alert('Invalid Date');
		return(false);
        }
	else if(dt.getFullYear()!=Yr){
		alert('Invalid Date');
		return(false);
        }
        
	return(true);
}
