<?php
	session_start();
	if(!isset($_SESSION['sname'])|| !isset($_SESSION['amount']) || !isset($_SESSION['sid'])){
		header('Location: ../../index.php');
	}
?>