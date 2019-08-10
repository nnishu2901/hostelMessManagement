<?php
	require "../../common/connect.inc.php";
	$KEY = "humbarbaadhai";
	@$hash = $_GET['hash'];
	@$user_id = $_GET['id'];
	@$timestamp = $_GET['timestamp'];
	if ($hash == md5( $user_id . $timestamp . $KEY )){
    if ( time() - $timestamp > 108000 ){
        die('Sorry , This link is expired.');
    }else{
		$query_dlt=mysql_query("DELETE FROM student WHERE id='$user_id'");
		header('Location: ../../index.php');
	}
}else{
     die('Inavlid Credentials.');
}
	
?>