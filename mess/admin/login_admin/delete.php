<?php
	require 'checkifloggedin.php';
	require '../../common/connect.inc.php';
	if(isset($_POST['wid'])){
		$wid_=$_POST['wid'];
		if(!empty($wid_)){
			$query=mysql_query("delete from worker where wid='$wid_'");
			if(mysql_num_rows($query)==1)
				$_SESSION['msg']='Worker with worker id '.$wid_.' has been deleted.';
			else
				$_SESSION['msg']="Worker with worker id ".$wid_." doesn\'t exists.";
		}else{
			$_SESSION['msg']='Please fill all fields';
		}
	}else{
		$_SESSION['msg']='Invalid Access.';
	}
	header('Location: redirect.php');
?>