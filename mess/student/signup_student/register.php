<?php
	require '../../common/connect.inc.php';
	$name=$uid=$no='';
	session_start();
	if(isset($_POST['name']) && isset($_POST['uid']) && isset($_POST['no']) && isset($_POST['captcha'])) {
		$name=$_POST['name'];
		$id=$_POST['uid'];
		$no=$_POST['no'];
		$mail=$id.'@mnit.ac.in';
		$time_=date('Y-m-d H:i:s');
		$fees=mysql_query('select default_student_fees from internal');
		$fees=mysql_result($fees,0,'default_student_fees');
		$query=mysql_query("INSERT INTO student VALUES('$id','$name','','$mail','$no','$fees','$time_','0')");
		require "../login_student/forgot_pwd/classes/class.phpmailer.php"; // include the class name
		$KEY = "humbarbaadhai"; //something really long long long long long and secret
		$time = time();
		$hash = md5( $id . $time . $KEY);
		$url = "localhost/mess/student/signup_student/verify_deactivate.php?id=".$id.'&timestamp='.$time.'&hash='.$hash;
		$pmail = new PHPMailer(); // create a new object
		$pmail->IsSMTP(); // enable SMTP
		$pmail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
		$pmail->SMTPAuth = true; // authentication enabled
		$pmail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
		$pmail->Host = "smtp.gmail.com";
		$pmail->Port = 465; // or 587
		$pmail->IsHTML(true);
		$pmail->Username = "2013UCP1089@mnit.ac.in";
		$pmail->Password = "veer@1008";
		$pmail->AddReplyTo("2013UCP1089@mnit.ac.in", "admin"); //reply-to address
		$pmail->SetFrom("2013UCP1089@mnit.ac.in", "messcouncil.com"); //From address of the mail
		$pmail->Subject = "MESS COUNCIL Verify Account";
		$siteurl='localhost/mess/index.php';
		$pmail->MsgHTML("<b>Hi ".$name.",<br /> An account has been created from your institute user id for hostel mess on<b><a href=\"$siteurl\" style=\"color:orange; font-size:20px; \" > messcouncil.com </a></b>.Please click the following link to verify your account and set the new password. ( If this is not your activity please deactivate your account by clicking on same link). This link will be expired after 30 hours and your account will be automatically deactivated.<br/><br/> <a href=\"$url\" style=\"font-size:20px; font-weight:bold;\">Verify / Deactivate Account.</a>");
		$pmail->AddAddress($mail);
		//$mail->AddAttachment("images/asif18-logo.png"); //Attach a file here if any or comment this line,
		 if(!$pmail->Send()){
			$_SESSION['msg']='Mailer Error:'.$pmail->ErrorInfo;
		}else{
			$_SESSION['msg']='Verification mail has been sent to your email id. Please verify your account to login.';
		}
	}else {
		$_SESSION['msg']='Invalid Access.';
	}
	header('Location: ../login_student/redirect.php');
	?>