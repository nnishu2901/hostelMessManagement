<?php
require '../../common/connect.inc.php';
require 'checkifloggedin.php';
if(isset($_POST['wid'])){
	$wid=$_POST['wid'];
	if(!empty($wid)){
		$q=mysql_query("select * from worker where wid='$wid'");
		$q=mysql_num_rows($q);
		if($q==1){
			if(isset($_POST['present'])) {
				$query=mysql_query("update worker set available='1' where wid='$wid'");
				$_SESSION['msg']="Worker with worker id ".$wid." has been successfully marked present.";
			}else if(isset($_POST['absent'])) {
				$query=mysql_query("update worker set available='0' where wid='$wid'");
				$_SESSION['msg']="Worker with worker id ".$wid." has been successfully marked absent.";
			}else{
				$_SESSION['msg']='You submitted an unwanted response';
			}
		}else{
			$_SESSION['msg']='Worker with worker id '.$wid." doesn\'t exist";
		}
	}else{
		$_SESSION['msg']='Please fill all fields.';
	}
}else{
	$_SESSION['msg']='Invalid Access.';
}
header('Location: redirect.php');
?>