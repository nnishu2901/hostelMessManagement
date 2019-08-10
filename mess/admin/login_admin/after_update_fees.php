<?php
	require 'checkifloggedin.php';
	require '../../common/connect.inc.php';
	if(isset($_POST['fees'])){
		$fees=$_POST['fees'];
		if(!empty($fees)){
			$admin_pwd=md5('iamadmin');
			$query=mysql_query("update internal set default_student_fees='$fees' where admin_verify_pwd='$admin_pwd'");
			if($query)
				$_SESSION['msg']='Fees for next semester have been updated successfully.';
			else
				$_SESSION['msg']='Query not executed';
		}else{
			$_SESSION['msg']='Please fill all entries.';
		}
	}else{
		$_SESSION['msg']='Invalid Access.';
	}
	header('Location: redirect.php');
?>