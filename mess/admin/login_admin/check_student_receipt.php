<?php
require '../../common/connect.inc.php';
require 'checkifloggedin.php';
if(isset($_POST['pwd']) && isset($_SESSION['student'])) {
	 $uid=$_SESSION['student'];
	 $pwd=$_POST['pwd'];
	 if(!empty($pwd)) {
		  $pwd=md5($pwd);
		  $query_run=mysql_query("SELECT * FROM student WHERE id='$uid'");
		  if(@mysql_num_rows($query_run)== 1) {
			   $row=mysql_fetch_assoc($query_run);
			   if($pwd==$row['password']){
					header("Location: update_receipt.php");
					die();
			   }else {
					$_SESSION['msg']='Incorrect password !!';
			   }
		  }else {
		   $_SESSION['msg']='Ooops... This user id doesn\'t exist';
		  }
	 }else {
	  $_SESSION['msg']='Please fill all fields';
	 }
}else {
	$_SESSION['msg']='Invalid Access';
} 
header('Location: redirect.php');
?>