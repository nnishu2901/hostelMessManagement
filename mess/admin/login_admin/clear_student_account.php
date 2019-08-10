<?php
	require '../../common/connect.inc.php';
	require 'checkifloggedin.php';
	if(isset($_POST['pwd']) && isset($_SESSION['student'])){
		$pwd=md5($_POST['pwd']);
		$sid=$_SESSION['student'];
			$query=mysql_query("Select password,amount from student where id='$sid' ");
			$qcheck=mysql_num_rows($query);
			if($qcheck!=1){
				$_SESSION['msg']="This account doesn\'t exists in database anymore";
				header('Location: redirect.php');
				die();
			}
			$qpwd=mysql_result($query,0,'password');
			$qamount=mysql_result($query,0,'amount');
			if($pwd==$qpwd){
				$q=mysql_query("delete from student where id='$sid'");
				if($q){
					$_SESSION['msg']='Account with id '.$sid.' has been successfully cleared and paid off an amount of Rs.'.$qamount ;
				}else{
					$_SESSION['msg']='Deletion query failed';
				}
			}else{
				$_SESSION['msg']='Incorrect Password.';
			}	
	}else{
		$_SESSION['msg']='Invalid Access.';
	}
	header('Location: redirect.php');
?>