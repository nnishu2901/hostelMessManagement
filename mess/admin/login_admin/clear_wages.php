<?php 
	require 'checkifloggedin.php';
	require '../../common/connect.inc.php';
	$_SESSION['msg']='Sorry, I pressed the clear button by mistake !!';
	$_SESSION['link']='sure_clear_wages.php';
	$_SESSION['value']='No, I want to clear all wages';
	header('Location: redirect.php');
?>