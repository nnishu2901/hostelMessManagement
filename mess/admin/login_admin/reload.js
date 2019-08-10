$(document).ready(function() {
	var a=0; //for worker_name
	var b=0; //for phno
	var c=0; //for address
	var d=0; //for valid captcha
	var ak=0;
	var bk=0;		//phno keyup
	var ck=0;		//address keyup

	$('#submit').click(function() {
		if(a!=1 || b!=1 || c!=1 || d!=1){
			$(this).attr('disabled','disabled');
		}else{
		}
	});

	var wnameErr='specify name';
	var phnoErr='Number must have 10 digits only';
	var addressErr='Specify valid address';
	var captchaErr='Invalid captcha';
	
	$('#wname').focusout(function() { ak=1; if(a==0) $('#wname').css('border','1px solid red').css('background-color','#dcdcdc');else $('#wname').css('border','inset').css('background-color','white');});	
	$('#phno').focusout(function() { bk=1; if(b==0) $('#phno').css('border','1px solid red').css('background-color','#dcdcdc');else $('#phno').css('border','inset').css('background-color','white');});
	$('#address').focusout(function() { ck=1; if(c==0) $('#address').css('border','1px solid red').css('background-color','#dcdcdc');else $('#address').css('border','inset').css('background-color','white');});
	
	$('#wname').focusin(function() { $('#wname').css('border','inset').css('background-color','white');});
	$('#phno').focusin(function() { $('#phno').css('border','inset').css('background-color','white');});
	$('#address').focusin(function() { $('#address').css('border','inset').css('background-color','white');});
	
	$('#wname').keyup(function() {
        var name = $('#wname').val();
		name=jQuery.trim(name);
		if(name.length<=0) {
			wnameErr='specify worker name';
			$('#not').text(wnameErr);
			a=0;
		}
		else {
			nameErr='';
			$('#not').text(wnameErr);
			a=1;
		}
		if(a==1 && b==1 && c==1 && d==1 )
			$('#submit').removeAttr('disabled');
		else
			$('#submit').attr('disabled','disabled');
			
		if($('#submit').is(":disabled")) {
			if(a==0 && ak==1){
					$('#not').text(wnameErr);
			}else if(b==0 && bk==1){
				$('#not').text(phnoErr);	
			}else if(c==0 && ck==1){
				$('#not').text(addressErr);	
			}												  
		}
    });	
	$('#phno').keyup(function() {
		var p = /[0-9]{10}$/;
		var name = $('#phno').val();
		if(!name.match(p)) {
			b=0;
			phnoErr='Number must have 10 digits only';
			$('#not').text(phnoErr);
		}
		else {
			b=1;
			phnoErr='';
			$('#not').text(phnoErr);
			}
		if(a==1 && b==1 && c==1 && d==1 )
			$('#submit').removeAttr('disabled');
		else
			$('#submit').attr('disabled','disabled');
		
		if($('#submit').is(":disabled")) {
			if(a==0 && ak==1){
					$('#not').text(wnameErr);
			}
			else if(b==0 && bk==1){
				$('#not').text(phnoErr);	
			}
			else if(c==0 && ck==1){
				$('#not').text(addressErr);	
			}												  
		}
	});
	
	
	$('#address').keyup(function() {
        var name = $('#address').val();
		name=jQuery.trim(name);
		if(name.length<=0) {
			addressErr='specify valid address';
			$('#not').text(addressErr);
			c=0;
		}
		else {
			addressErr='';
			$('#not').text(addressErr);
			c=1;
			}
		if(a==1 && b==1 && c==1 && d==1)
			$('#submit').removeAttr('disabled');
		else
			$('#submit').attr('disabled','disabled');	
		if($('#submit').is(":disabled")) {
			if(a==0 && ak==1){
					$('#not').text(wnameErr);
			}else if(b==0 && bk==1){
				$('#not').text(phnoErr);	
			}else if(c==0 && ck==1){
				$('#not').text(addressErr);	
			}												  
		}
    });			
	$('#captcha_code').keyup(function() {
		var captcha = $("#captcha_code").val();
		if(captcha.length == 5){
			$.ajax({  
				type: "POST",  
				url: "add_worker.php",  
				data: "captcha2="+ captcha,  
				success: function(msg){
					$("#not").ajaxComplete(function(event, request, settings){
						if(msg == 'OK'){
							$('#not_captcha').html('<img src="accepted.png" align="absmiddle" /> <font color="Green"> Correct </font> ');
							d=1;
							if(a==1 && b==1 &&  c==1 && d==1)
								$('#submit').removeAttr('disabled');
							else
								$('#submit').attr('disabled','disabled');
							if($('#submit').is(":disabled")) {
								if(a==0 && ak==1){
										$('#not').text(wnameErr);
								}
								else if(b==0 && bk==1){
									$('#not').text(phnoErr);	
								}
								else if(c==0 && ck==1){
									$('#not').text(addressErr);	
								}												  
							}			
						}else{ 
							d=0;
							if(a==1 && b==1 &&  c==1 && d==1)
								$('#submit').removeAttr('disabled');
							else
								$('#submit').attr('disabled','disabled');
								
							if($('#submit').is(":disabled")) {
								if(a==0 && ak==1){
										$('#not').text(wnameErr);
								}
								else if(b==0 && bk==1){
									$('#not').text(phnoErr);	
								}
								else if(c==0 && ck==1){
									$('#not').text(adressErr);	
								}												  
							}
							$('#not_captcha').html('<img src="wrong.png" align="absmiddle" /> <font color="red"> Incorrect </font> ');
						}
					});
				}
			});
		}else {
			d=0;
			$('#submit').attr('disabled','disabled');
			$('#not_captcha').text('copy the digits from the image');	
		}									  
	});
	$('#cap').click(function() {
			d=0;
			$('#submit').attr('disabled','disabled');
	});
	
});

