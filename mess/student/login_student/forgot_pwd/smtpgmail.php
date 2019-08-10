<?php
require '../../../common/connect.inc.php';
session_start();
if(isset($_POST['uid'])){
	$uid=$_POST['uid'];
	if(!empty($uid)){
		$email=$uid.'@mnit.ac.in';
		$query=mysql_query("SELECT id FROM student WHERE mail='$email'");
		if(mysql_num_rows($query) ==1 ){
					require "classes/class.phpmailer.php"; // include the class name
					$KEY = "humbarbaadhai"; //something really long long long long long and secret
					$user=mysql_fetch_assoc($query);
					$time = time();
					$hash = md5( $user['id'] . $time . $KEY);
					$url = "localhost/mess/student/login_student/forgot_pwd/reset_pwd.php?id=".$user['id'].'&timestamp='.$time.'&hash='.$hash;
					//send_email($email, 'reset password email from xxx.com', ' Please click the following link to reset password'. $url);			
					$mail = new PHPMailer(); // create a new object
					$mail->IsSMTP(); // enable SMTP
					$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
					$mail->SMTPAuth = true; // authentication enabled
					$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
					$mail->Host = "smtp.gmail.com";
					$mail->Port = 465; // or 587
					$mail->IsHTML(true);
					$mail->Username = "2013ucp1089@mnit.ac.in";
					$mail->Password = "veer@1008";
					$mail->AddReplyTo("2013ucp1089@mnit.ac.in", "admin"); //reply-to address
  					$mail->SetFrom("2013ucp1089@mnit.ac.in", "messcouncil.com"); //From address of the mail
					$mail->Subject = "Reset Password";
					$mail->MsgHTML("<b>Hi, please click the following link to reset your password. The link will expire automatically in 30 hours.<br/><br/> <a href=\"$url\" style=\"font-size:20px; font-weight:bold;\">Reset Password</a>");
					$mail->AddAddress($email);
					//$mail->AddAttachment("images/asif18-logo.png"); //Attach a file here if any or comment this line,
					 if(!$mail->Send()){						
						$_SESSION['msg']='Mailer Error:' .$mail->ErrorInfo;
					}
					else{
						$_SESSION['msg']='Your password reset details have been sent to your ' .$email. ' mail id.';
					}
		}else{
				$_SESSION['msg']='This mail id is not registered';
		}
	}else{
		$_SESSION['msg']='Please fill all the entries';
	}
}else{
	$_SESSION['msg']='Invalid Access';
}
header('Location: ../redirect.php');
?>