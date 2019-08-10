<?php
	require '../../common/connect.inc.php';
	session_start();
	if(isset($_POST['pwd']) && isset($_POST['uid'])){
		$uid=$_POST['uid'];
		$pwd=$_POST['pwd'];
		if( !empty($uid) && !empty($pwd)){
			$pwd=md5($pwd);
			$query_run=mysql_query("SELECT * FROM student WHERE id='$uid'");
			if(mysql_num_rows($query_run)== 1) {
			   $row=mysql_fetch_assoc($query_run);
			   if($pwd==$row['password']){
					$_SESSION['sid']=$uid;
					$_SESSION['amount']=$row['amount'];
					$_SESSION['sname']=$row['name'];
					header("Location: profile.php");
					die();
			   }else {
				   $_SESSION['msg']='Incorrect password !!';
			   }
			}else {
			   $_SESSION['msg']="Ooops... This user id doesn\'t exist";
			}
		}else {
		  $_SESSION['msg']='Please fill all fields';
		 }
	}else{
		$_SESSION['msg']='Invalid Access.';
	} 
	unset($_POST['uid']);
	unset($_POST['pwd']);
	header('Location: redirect.php');
	die();
?>