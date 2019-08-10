<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../../../common/vdo_style.css" />
<title>Reset Password !!</title>
<script  type="text/javascript" src="../../../common/jquery.js"></script>
<script  type="text/javascript" src="forgot_jQuery.js"></script>
<style>
* {
 box-sizing:border-box;
}
#reg { 
 background:url(../../../common/bg2.jpg) no-repeat right bottom;
 background-size:cover;
 height:300px;
 width:518px;
 border-radius:10px;
 margin: auto;
 position: absolute;
 top: 0; left: 0; bottom: 0; right: 0;
 box-shadow:7px 7px 7px black;
}
#inner {
 height:80px;
 background:black;
 opacity:0.6;
 border-radius:10px 10px 0 0;
 margin-bottom:10px;
 margin-top:-30px;
 padding:0px;
}
#inner p {
 color:#FFFFFF;
 font-size:26px;
 font-weight:bold;
 font-family:"comic Sans MS";
 padding:20px 20px 20px 30px;
 text-shadow:2px 2px 1px;
}
label {
 padding:40px;
 color:black;
 font-weight:bolder;
 font-size:18px;
 font-variant:small-caps;
 position:relative;
 top:9px;
 text-shadow:1px 1px 1px #666666;
}

#outer input {
 height:25px;
 border-radius:2px;
 border:inset;
 background-color:#dcdcdc;
 margin-right:45px;
 margin-top:3px;
 float:right;
 font-family:"comic Sans MS";
 font-size:14px;
 cursor:pointer;
}
hr {
	color:#FFCCCC;
	width:90%;
	margin-top:25px;
}
#outer input:focus {
 background-color:#FFFFFF;
}
#outer input:after {
 clear:both;
}
#center input {
 width:auto;
 height:30px;
 display:block;
 margin-left:auto;
 margin-right:auto;
 font-size:18px;
 color:white;
 box-shadow:7px 7px 7px black; 
 cursor:pointer;
 font-family:"Comic Sans MS";
 padding:0px 30px 0px;
 border-radius:5px;
 background:-webkit-linear-gradient(#135CC9,#003871);
}
 #submit:disabled{
	opacity:0.3; 
 }
 #submit:enabled{
	opacity:1.0; 
 }
</style>
</head>
<body>
 
 <video autoplay loop id="bgvid" controls>
 <source src="../../../common/vdo7.mp4" type="video/mp4">
 can't play
 </video>
<?php
$KEY = "humbarbaadhai";
@$hash = $_GET['hash'];
@$user_id = $_GET['id'];
@$timestamp = $_GET['timestamp'];
$url = "reset_pwd.php?id=".$user_id.'&timestamp='.$timestamp.'&hash='.$hash;
session_start();
if ($hash == md5( $user_id . $timestamp . $KEY )){
    if ( time() - $timestamp > 108000 ){ // thirty hour
		$_SESSION['msg']='This password reset link had been expired.';
    }else{
		require '../../../common/connect.inc.php';
		if(isset($_POST['pwd']) && isset($_POST['cpwd'])){
			$pwd=$_POST['pwd'];
			if(!empty($pwd) && !empty($_POST['cpwd'])){
				$pwd=md5($pwd);
				$query=mysql_query("UPDATE student SET password='$pwd' WHERE id='$user_id'");
				$_SESSION['msg']='Congratulations !! Your password is updated successfully.';
			}else{
				$_SESSION['msg']='Content Unavailable';
			}
		}else{
?>
			 <div id="reg">
                 <div id="inner">
                  <p>Reset Password !!</p> 
                 </div>
                 
                 <div id="outer">
                 <div id="not" style="position:relative;left:6%;color:red;font-weight:bold;margin-bottom:5px;margin-top:5px;"></div>
                  <form action="<?php echo $url;?>" method="post" autocomplete="off">
                    <label>New Password</label><input type="password" id="pwd" name="pwd" maxlength="20" size="28"/><hr />
                    <label>Confirm Password </label><input type="password" id="cpwd" name="cpwd" maxlength="20" size="28" /><br /><br /><br />
                   </div> 
                  <div id="center">
                   <input type="submit" id="submit"  value="submit" style="background:-webkit-linear-gradient(grey,black);"  disabled/><br /><br />
                  </form>
                   
                  </div>
            </div>
            
<?php
			die();
		}
 	}
}else{
	$_SESSION['msg']='Invalid parameters.';
}
header('Location: ../redirect.php');
?>
</body>
</html>