<?php
	require '../../common/connect.inc.php';
	if(isset($_POST['captcha2'])) {
		session_start();
		if($_POST['captcha2'] != $_SESSION['digit']){ 
			echo 'Invalid captcha';
		}else {
			echo 'OK';
		}
		die();
		session_destroy();
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Student Register</title>
<link rel="stylesheet" type="text/css" href="../../common/vdo_style.css" />
<script  type="text/javascript" src="../../common/jquery.js"></script>
<script  type="text/javascript" src="reload.js"></script>
<script src="settings.js" type="text/javascript"></script>
<style>
* {
	box-sizing:border-box;
}
#reg { 
	background:url(../../common/bg2.jpg) no-repeat right bottom;
	background-size:cover;
	height:450px;
	width:518px;
	border-radius:10px;
	margin-left:auto;
	margin-right:auto;
	margin-top:4%;
	margin-bottom:auto;
	box-shadow:7px 7px 7px black;
}
#inner {
	height:80px;
	background:black;
	opacity:0.6;
	border-radius:10px 10px 0 0;
	margin-bottom:8px;
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
#outer input:focus {
	background-color:#FFFFFF;
}
#outer input:after {
	clear:both;
}

hr {
	color:#FFCCCC;
	width:90%;
	margin-top:25px;
}
input[type="submit"]:disabled {
	width:130px;
	height:30px;
	display:block;
	margin-left:auto;
	margin-right:auto;
	font-size:18px;
	color:white;
	box-shadow:7px 7px 7px black;	
	background-color:black;
	opacity:0.3;
	cursor:pointer;
}
input[type="submit"]:enabled {
	width:130px;
	height:30px;
	display:block;
	margin-left:auto;
	margin-right:auto;
	font-size:18px;
	color:white;
	box-shadow:7px 7px 7px black;	
	background-color:black;
	opacity:0.7;
	cursor:pointer;
}
#hoverdiv {
	display:none;
	background-color:#cad5e7;
	color:#000000;
	position:absolute;
	font-size:18px;
	padding:2px;
	border:1px solid black;
}
</style>
</head>
<body>
<video autoplay loop id="bgvid" controls>
<source src="../../common/vdo7.mp4" type="video/mp4">
can't play
</video>
<div id="reg">
	<div id="inner">
		<p>Sign Up</p>	
	</div>
	<div id="outer">
		<div id="not" style="position:relative;left:6%;color:red;font-weight:bold;margin-bottom:8px;"></div>
		<form action="register.php" method="post" autocomplete="off">
			<label>Name </label><input type="text" id="name" name="name" maxlength="20" size="30" autofocus/><hr />
			<label>User Id </label><input type="text" id="uid" name="uid" class="hover" maxlength="20" hovertext="Give your institute ID" size="30" onKeyUp="this.value = this.value.replace(/[^a-z\d]+/, '')" /><br /><br />
			<span id="status"  style="height:2px; display:block; text-align:center; color:#003871; font-weight:bold; position:relative; left:9%;">Give Unique user id. </span> <hr />
			<label>Contact-number </label><input type="text" class="hover" id="no"  hovertext="so that we can contact you" maxlength="10" name="no" size="30"/>
			<div id="hoverdiv"></div>
	</div><br />      
	<div style="text-align:center;">
			<p><img id="captcha" src="captcha.php" width="160" height="45" border="1" alt="captcha">
			<a href="#" onClick="
			  document.getElementById('captcha').src = 'captcha.php?' + Math.random();
			  document.getElementById('captcha_code').value = '';
			  document.getElementById('not_captcha').innerHTML = 'copy the digits from the image';
			  return false;
			"><img src="refresh.png" id="cap" height="40" width="40" style="vertical-align:auto;margin-left:10px;"/></a></small></p>
			<p><input id="captcha_code" type="text" name="captcha" size="6" maxlength="5" onKeyUp="this.value = this.value.replace(/[^\d]+/g, '');" /><span id="not_captcha" style="padding:15px;color:#003871; font-weight:bold;">copy the digits from the image</span></p>	
			<input type="submit" id="submit" value="submit"  disabled="disabled" />
		</form>
	</div>
</div>
</body>
<script  type="text/javascript" src="hover.js"></script>
	<script type="text/javascript">
      $( function () {     
		twitter.screenNameKeyUp();
		$('#user_screen_name').focus();
      });
</script>
</html>
