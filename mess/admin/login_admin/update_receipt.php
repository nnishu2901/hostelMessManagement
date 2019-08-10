<?php
	require 'checkifloggedin.php';
	require '../../common/connect.inc.php';
	if(isset($_SESSION['student']))
		unset($_SESSION['student']);
	else {
		$_SESSION['msg']='Log in to continue';
		header('Location: redirect.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Update receipt !!</title>
<link rel="stylesheet" type="text/css" href="../../common/vdo_style.css" />
<style>
* {
 box-sizing:border-box;
}
#reg { 
	background:url(../../common/bg2.jpg) no-repeat right bottom;
	background-size:cover;
	height:605px;
	width:640px;
	border-radius:10px;
	margin: auto;
	position: relative;
	top: 20px; left: 0; bottom: 0; right: 0;
	box-shadow:7px 7px 7px black;
	overflow:visible;
}
#submit:enabled {
 width:auto;
 height:40px;
 display:block;
 margin-left:auto;
 margin-right:auto;
 font-size:18px;
 color:white;
 box-shadow:7px 7px 7px black; 
 cursor:pointer;
 font-family:"Comic Sans MS";
 padding:0px 25px 0px;
 border-radius:5px;
 background:-webkit-linear-gradient(grey,black);
}
#submit:disabled {
 width:auto;
 height:40px;
 display:block;
 margin-left:auto;
 margin-right:auto;
 opacity:0.4;
 font-size:18px;
 color:white;
 box-shadow:7px 7px 7px black; 
 cursor:pointer;
 font-family:"Comic Sans MS";
 padding:0px 25px 0px;
 border-radius:5px;
 background:-webkit-linear-gradient(grey,black);
}
</style>
</head>
<body>
<video autoplay loop id="bgvid" controls>
<source src="../../common/vdo7.mp4" type="video/mp4">
can't play
</video>
<div id="reg">
<div id="center">
<form id="qty" method="POST" style="margin-left:50px" action="after_update_receipt.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<div style="font-size:18px;font-family:Georgia;color:#576470"><b><i>Your Receipt --></i></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<textarea style="margin-left:-30px" rows="12"  cols="50" name='original' value='' readonly><?php readfile("../../receipt/".$_SESSION['receipt'].".txt");?></textarea>
		<br /></div><br /><br />
		<div style="font-size:18px;font-family:Georgia;color:#576470">
	<textarea style="margin-left:-30px" rows="12"  cols="50" name='updated' value=''><?php readfile("../../receipt/".$_SESSION['receipt'].".txt");?></textarea>
		<b><i><--Updated Receipt</i></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br /></div><br /><br />
	<div style="font-size:18px;font-family:Georgia;color:#576470"><b><i><label>Password : </label></b></i>&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" id="pwd" name="pwd" maxlength="20" size="30" onkeyUp="if(this.value=='iamadmin') document.getElementById('submit').disabled=false; else document.getElementById('submit').disabled=true;" /><br />
	</div>
	<input type="submit" id="submit" style="margin-top:20px"value="Update" disabled/> 
</form>
</div>
</div>
</body>
</html>
