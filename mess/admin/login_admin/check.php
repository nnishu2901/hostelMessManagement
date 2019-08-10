<?php
	if(isset($_POST['pwd'])){
		if($_POST['pwd']!=''){
			$admin_pwd='wearetheadmins';
			$verify_pwd=$_POST['pwd'];
			session_start();
			if($verify_pwd==$admin_pwd){
				$_SESSION['loggedin']=1;
				header('Location: profile.php');
			}
			else{
				$_SESSION['msg']='Invalid Credentials';
				header('Location: redirect.php');
				die();
			}
		}else{
			header('Location: index.php');
		}
	}else{
		header('Location: ../../index.php');
	}
?>