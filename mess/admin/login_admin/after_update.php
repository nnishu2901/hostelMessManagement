<?php
	require '../../common/connect.inc.php';
	$day= ucfirst($_POST['day']);
	$time= ucfirst($_POST['time']);
	$food=ucfirst($_POST['update_']);
	echo $day,$time,$food;
	$query=mysql_query("update menu set $time='$food' where day='$day'");
	session_start();
	$_SESSION['msg']="Menu for $day $time has been successfully updated.";
	echo $_SESSION['msg'];
		header('Location: redirect.php');
	
?>