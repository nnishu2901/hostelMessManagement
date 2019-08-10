<?php
	session_start();
	unset($_SESSION['sname']);
	unset($_SESSION['sid']);
	unset($_SESSION['amount']);
	header("Location: index.php");
?>