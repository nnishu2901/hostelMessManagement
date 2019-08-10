// JavaScript Document

$(document).ready(function() {
	var a=0; //for name
	var b=0; //for uid
	var e=0; //for ph number
	var f=0; //for valid captcha
	var g=0; //for available user id
	var ak=0;
	var bk=0;
	var ek=0;		

	$('#submit').click(function() {
								if(a!=1 || b!=1 || e!=1 || f!=1 || g!=1){
									$(this).attr('disabled','disabled');
								}
								else{
								}
								});

	var nameErr='specify name';
	var unameErr='specify user id';
	var noErr='Number must have 10 digits only';
	var captchaErr='Invalid captcha';
	
	$('#name').focusout(function() { ak=1; if(a==0) $('#name').css('border','1px solid red').css('background-color','#dcdcdc');else $('#name').css('border','inset').css('background-color','white');});	
	$('#uid').focusout(function() { bk=1; if(b==0) $('#uid').css('border','1px solid red').css('background-color','#dcdcdc');else $('#uid').css('border','inset').css('background-color','white');});
	$('#no').focusout(function() { ek=1; if(e==0) $('#no').css('border','1px solid red').css('background-color','#dcdcdc');else $('#no').css('border','inset').css('background-color','white');});
	
	$('#name').focusin(function() { $('#name').css('border','inset').css('background-color','white');});
	$('#uid').focusin(function() { $('#uid').css('border','inset').css('background-color','white');});
	$('#no').focusin(function() { $('#no').css('border','inset').css('background-color','white');});
	
	$('#name').keyup(function() {
		//ak=1;
        var name = $('#name').val();
		name=jQuery.trim(name);
		if(name.length<=0) {
			nameErr='specify name';
			$('#not').text(nameErr);
			a=0;
		}
		else {
			nameErr='';
			$('#not').text(nameErr);
			a=1;
			}
		if(a==1 && b==1 && e==1 && f==1 && g==1)
			$('#submit').removeAttr('disabled');
		else
			$('#submit').attr('disabled','disabled');
			
		if($('#submit').is(":disabled")) {
			if(a==0 && ak==1){
					$('#not').text(nameErr);
			}else if(b==0 && bk==1){
				$('#not').text(unameErr);	
			}else if(e==0 && ek==1){
				$('#not').text(noErr);	
			}												  
	}
    });
	$('#uid').keyup(function() {
		var name = $('#uid').val();
		var p=/^20[0-9]{2}[a-z]{3}[0-9]{4}$/;
		//var p=/^[A-Za-z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
		if(!name.match(p) || name.length<=0) {
			unameErr='specify valid User Id';
			$('#not').text(unameErr);
			b=0;
		}
		else {
			unameErr='';
			$('#not').text(unameErr);
			b=1;
		}	
				
		if(b==1) {
				pic1 = new Image(16, 16); 
				pic1.src = "loader.gif";
				
				
				
				var usr = $("#uid").val();
				
				if(usr.length >= 3)
				{
				$("#status").html('<img src="loader.gif" align="absmiddle">&nbsp;Checking availability...');
				
					$.ajax({  
					type: "POST",  
					url: "check.php",  
					data: "uid="+ usr,  
					success: function(msg){  
				   
				   $("#status").ajaxComplete(function(event, request, settings){ 
				
					if(msg == 'OK')
					{ 
						$("#uid").removeClass('object_error'); // if necessary
						$("#uid").addClass("object_ok");
						$(this).html('<img src="accepted.png" align="absmiddle" style="margin-right:5px;" /> <font color="Green"> Available </font> ');
						g=1;
						if(a==1 && b==1 && e==1 && f==1 && g==1)
							$('#submit').removeAttr('disabled');
						else
							$('#submit').attr('disabled','disabled');
							
						if($('#submit').is(":disabled")) {
					if(a==0 && ak==1){
							$('#not').text(nameErr);
					}
					else if(b==0 && bk==1){
						$('#not').text(unameErr);	
					}
					else if(e==0 && ek==1){
						$('#not').text(noErr);	
					}												  
			}			}  
					else  
					{  
						$("#uid").removeClass('object_ok'); // if necessary
						$("#uid").addClass("object_error");
						$(this).html(msg);
						g=0;
						if(a==1 && b==1 && e==1 && f==1 && g==1)
							$('#submit').removeAttr('disabled');
						else
							$('#submit').attr('disabled','disabled');
							
						if($('#submit').is(":disabled")) {
					if(a==0 && ak==1){
							$('#not').text(nameErr);
					}
					else if(b==0 && bk==1){
						$('#not').text(unameErr);	
					}
					else if(e==0 && ek==1){
						$('#not').text(noErr);	
					}												  
			}
					}  
				   
				   });
				
				 } 
				   
				  }); 
				
				}
				else
					{
					$("#status").html('<font color="red">at least <strong>3</strong> characters required.</font>');
					$("#uid").removeClass('object_ok'); // if necessary
					$("#uid").addClass("object_error");
					g=0;
					if(a==1 && b==1 && e==1 && f==1 && g==1)
						$('#submit').removeAttr('disabled');
					else
						$('#submit').attr('disabled','disabled');
						
					if($('#submit').is(":disabled")) {
					if(a==0 && ak==1){
							$('#not').text(nameErr);
					}
					else if(b==0 && bk==1){
						$('#not').text(unameErr);	
					}
					else if(e==0 && ek==1){
						$('#not').text(noErr);	
					}												  
			}
					}	
					
		}else {
			$('#submit').attr('disabled','disabled');
			$('#status').html('Give unique user id as username');	
		}
		
    });
	/*$('#pwd').keyup(function() {
	//	ck=1;
		var name = $('#pwd').val();
		name = jQuery.trim(name);
        var p =/((^[A-Za-z]+[0-9]+)|(^[0-9]+[A-Za-z]+))[0-9A-Za-z]*$/;
		if(!name.match(p) || name.length<8) {
			pwdErr='Password must be alphanumeric,must not contain space and special charcters and min length must be 8';
			$('#not').text(pwdErr);
			c=0;
		}
		else {
			pwdErr='';
			$('#not').text(pwdErr);
			c=1;
		}
		if(dk==1 && $('#pwd').val()!=$('#cpwd').val()) {
			d=0;
			cpwdErr='Passwords don\'t match';
			$('#cpwd').css('border','1px solid red').css('background-color','#dcdcdc');
		}else if(dk==1 && $('#pwd').val()==$('#cpwd').val()){
			d=1;
			cpwdErr='';
			$('#cpwd').css('border','inset').css('background-color','white');		
		}
		if(a==1 && b==1 && c==1 && d==1 && e==1 && f==1 && g==1)
			$('#submit').removeAttr('disabled');
		else
			$('#submit').attr('disabled','disabled');
			
		if($('#submit').is(":disabled")) {
			if(a==0 && ak==1){
					$('#not').text(nameErr);
			}
			else if(b==0 && bk==1){
				$('#not').text(mailErr);	
			}
			else if(c==0 && ck==1){
				$('#not').text(pwdErr);	
			}else if(d==0 && dk==1){
				$('#not').text(cpwdErr);	
			}else if(e==0 && ek==1){
				$('#not').text(noErr);	
			}												  
	}
		
    });
	$('#cpwd').keyup(function() {
	//						  dk=1;
		var cname = $('#cpwd').val();
		cname = jQuery.trim(cname);
		var name = $('#pwd').val();
		name = jQuery.trim(name);
		if(!cname.match(name) || cname.length!=name.length) {
			cpwdErr='Passwords don\'t match';
			$('#not').text(cpwdErr);
			d=0;
		}
		else {
			cpwdErr='';
			$('#not').text(cpwdErr);
			d=1;
		}
		if(a==1 && b==1 && c==1 && d==1 && e==1 && f==1 && g==1)
			$('#submit').removeAttr('disabled');
		else
			$('#submit').attr('disabled','disabled');
			
		if($('#submit').is(":disabled")) {
			if(a==0 && ak==1){
					$('#not').text(nameErr);
			}
			else if(b==0 && bk==1){
				$('#not').text(mailErr);	
			}
			else if(c==0 && ck==1){
				$('#not').text(pwdErr);	
			}else if(d==0 && dk==1){
				$('#not').text(cpwdErr);	
			}else if(e==0 && ek==1){
				$('#not').text(noErr);	
			}												  
	}

    });
	/*
	$('#mail').keyup(function() {
		//					  fk=1;
		var name = $('#mail').val();
		var p=/^[A-Za-z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
		if(!name.match(p) || name.length<=0) {
			mailErr='specify valid email address';
			$('#not').text(mailErr);
			f=0;
		}
		else {
			mailErr='';
			$('#not').text(mailErr);
			f=1;
			}
		if(a==1 && b==1 && c==1 && d==1 && e==1 && f==1 && g==1)
			$('#submit').removeAttr('disabled');
		else
			$('#submit').attr('disabled','disabled');
			
		if($('#submit').is(":disabled")) {
			if(a==0 && ak==1){
					$('#not').text(nameErr);
			}
			else if(b==0 && bk==1){
				$('#not').text(unameErr);	
			}
			else if(c==0 && ck==1){
				$('#not').text(pwdErr);	
			}else if(d==0 && dk==1){
				$('#not').text(cpwdErr);	
			}else if(f==0 && fk==1){
				$('#not').text(mailErr);	
			}else if(e==0 && ek==1){
				$('#not').text(noErr);	
			}												  
	}
	});
	*/
	
	$('#no').keyup(function() {
		//					ek=1;
		var p = /[0-9]{10}$/;
		var name = $('#no').val();
		if(!name.match(p)) {
			e=0;
			noErr='Number must have 10 digits only';
			$('#not').text(noErr);
		}
		else {
			e=1;
			noErr='';
			$('#not').text(noErr);
			}
		if(a==1 && b==1 && e==1 && f==1 && g==1)
			$('#submit').removeAttr('disabled');
		else
			$('#submit').attr('disabled','disabled');
		
		if($('#submit').is(":disabled")) {
			if(a==0 && ak==1){
					$('#not').text(nameErr);
			}
			else if(b==0 && bk==1){
				$('#not').text(unameErr);	
			}
			else if(e==0 && ek==1){
				$('#not').text(noErr);	
			}												  
	}
	});
	if(a==1 && b==1 && e==1 && f==1 && g==1)
			$('#submit').removeAttr('disabled');
		else
			$('#submit').attr('disabled','disabled');
			
	$('#captcha_code').keyup(function() {
		var captcha = $("#captcha_code").val();
	//	$('#not').text(captcha);
		if(captcha.length == 5)
		{
			$.ajax({  
			type: "POST",  
			url: "index.php",  
			data: "captcha2="+ captcha,  
			success: function(msg){  
		   
		   $("#not").ajaxComplete(function(event, request, settings){ 
		
			if(msg == 'OK')
			{ 
			//	$("#mail").removeClass('object_error'); // if necessary
			//	$("#mail").addClass("object_ok");
				$('#not_captcha').html('<img src="accepted.png" align="absmiddle" /> <font color="Green"> Correct </font> ');
				f=1;
				if(a==1 && b==1 &&  e==1 && f==1 && g==1)
					$('#submit').removeAttr('disabled');
				else
					$('#submit').attr('disabled','disabled');
					
				if($('#submit').is(":disabled")) {
			if(a==0 && ak==1){
					$('#not').text(nameErr);
			}
			else if(b==0 && bk==1){
				$('#not').text(unameErr);	
			}
			else if(e==0 && ek==1){
				$('#not').text(noErr);	
			}												  
	}			}  
			else  
			{  
			//	$("#mail").removeClass('object_ok'); // if necessary
			//	$("#mail").addClass("object_error");
				f=0;
				if(a==1 && b==1 &&  e==1 && f==1 && g==1)
					$('#submit').removeAttr('disabled');
				else
					$('#submit').attr('disabled','disabled');
					
				if($('#submit').is(":disabled")) {
			if(a==0 && ak==1){
					$('#not').text(nameErr);
			}
			else if(b==0 && bk==1){
				$('#not').text(unameErr);	
			}
			else if(e==0 && ek==1){
				$('#not').text(noErr);	
			}												  
	}
			$('#not_captcha').html('<img src="wrong.png" align="absmiddle" /> <font color="red"> Incorrect </font> ');
			}  
				   
		   });
		
		 } 
		   
		  }); 
		
		}else {
			f=0;
			$('#submit').attr('disabled','disabled');
			$('#not_captcha').text('copy the digits from the image');	
		}
	/*	else
			{
			$("#not").html('<font color="red">at least <strong>3</strong> characters required.</font>');
			$("#mail").removeClass('object_ok'); // if necessary
			$("#mail").addClass("object_error");
			g=0;
			if(a==1 && b==1 && c==1 && d==1 && e==1 && g==1)
				$('#submit').removeAttr('disabled');
			else
				$('#submit').attr('disabled','disabled');
				
			if($('#submit').is(":disabled")) {
			if(a==0 && ak==1){
					$('#not').text(nameErr);
			}
			else if(b==0 && bk==1){
				$('#not').text(mailErr);	
			}
			else if(c==0 && ck==1){
				$('#not').text(pwdErr);	
			}else if(d==0 && dk==1){
				$('#not').text(cpwdErr);	
			}else if(e==0 && ek==1){
				$('#not').text(noErr);	
			}												  
	}
			}	
			
		}
		*/									  
	});
	$('#cap').click(function() {
			f=0;
			$('#submit').attr('disabled','disabled');
	});
	
});

