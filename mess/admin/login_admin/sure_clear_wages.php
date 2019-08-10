<?php 
	require 'checkifloggedin.php';
	require '../../common/connect.inc.php';
	$query=mysql_query("update worker set wages='0.00' where available=1");
	$_SESSION['msg']='All presently available workers are paid off... And their salary is reset to zero..';
	header('Location: redirect.php');
?>