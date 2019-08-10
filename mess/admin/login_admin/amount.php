<?php
	require '../../common/connect.inc.php';
	require 'checkifloggedin.php';
	if(isset($_SESSION['student']) && isset($_POST['fees_added'])){
		$sid=$_SESSION['student'];
		$query=mysql_query("select amount from student where id='$sid'");
		$qexists=mysql_num_rows($query);
		if($qexists!=1){
			$_SESSION['msg']="This user account doesn\'t exists anymore";
			header('Location: redirect.php');
		}
		$fees=mysql_result($query,0,'amount');
		$fees=$fees+$_POST['fees_added'];
		$q=mysql_query("update student set amount='$fees' where id='$sid'");
		if($q){
			$_SESSION['msg']='Amount has been successfully added';
			header('Location: redirect.php');
		}
		else{
			$_SESSION['msg']='Try Again Sorry.';
			header('Location: redirect.php');
		}
	}else{
		$_SESSION['msg']='Invalid Access.';
		header('Location: redirect.php');
	}
?>