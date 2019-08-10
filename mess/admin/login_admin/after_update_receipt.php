<?php
	require 'checkifloggedin.php';
	require '../../common/connect.inc.php';
	if(isset($_POST['updated'])) {
		$updated=$_POST['updated'];
		if(isset($_SESSION['receipt'])) {		
			$receipt=$_SESSION['receipt'];
			$file=fopen("../../receipt/".$receipt.".txt","w");
			fwrite($file,$updated);
			unset($_SESSION['receipt']);
			$_SESSION['msg']=$receipt." has been updated";
			header('Location: redirect.php');
		}else {
			$_SESSION['msg']='Invalid Access';
			header('Location: redirect.php');
		}
	}else {
		$_SESSION['msg']='Invalid Access';
		header('Location: redirect.php');
	}
?>