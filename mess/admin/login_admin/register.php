<?php
	require 'checkifloggedin.php';
	require '../../common/connect.inc.php';
	$name=$address=$phno='';
		if(isset($_POST['wname']) && isset($_POST['address']) && isset($_POST['phno']) && isset($_POST['captcha']) ) {
		$name=$_POST['wname'];
		$address=$_POST['address'];
		$phno=$_POST['phno'];
		$wtype=$_POST['type_select'];
		$query=mysql_query("INSERT INTO worker VALUES ('NULL','$name','$phno','$address','$wtype','0.00','0')");
		header('Location: worker.php');
	}else {
		$_SESSION['msg']='Invalid credentials.';
		header('Location: redirect.php');
	}
?>