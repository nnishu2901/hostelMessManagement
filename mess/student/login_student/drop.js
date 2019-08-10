$(document).ready(function() {
	var bfrate=$('#bfrate').val();
	var lrate=$('#lrate').val();
	var drate=$('#drate').val();
	$("[id^=dropmenu]").live("change", function () { 
		var breakfast=$('#dropmenu').val()*bfrate;
		var lunch=$('#dropmenu1').val()*lrate;
		var dinner=$('#dropmenu2').val()*drate;
		var total=breakfast+lunch+dinner;
		$('#hidden').val(total);
		var amount=$('#amount').val();
		if(amount<total) {
			$('#status').html('You don\'t have enough balance.You can only book upto '+ amount);
			$('#submit').attr('disabled','disabled');
		}else {
			$('#status').html('Your total is '+ total );
			$('#submit').removeAttr('disabled');
		}
	});	
});