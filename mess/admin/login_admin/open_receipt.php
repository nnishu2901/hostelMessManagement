<?php
require 'checkifloggedin.php';
require '../../common/connect.inc.php';
	if(isset($_POST['rid'])){
		$rid=$_POST['rid'];
		if(empty($rid) && $rid!=0) {
			$_SESSION['msg']='Please fill receipt id';
			header('Location: redirect.php');
		}else {
			$receipt="receipt".$rid;
			if(!is_file("../../receipt/".$receipt.".txt")) {
				$_SESSION['msg']='No such receipt exists';
				header('Location: redirect.php');
			}else{
				unset($_SESSION['msg']);
				$file=fopen("../../receipt/".$receipt.".txt","r");
				fgets($file);
				$id='2';
				while(fgetc($file)!='2'); //to go to the id till '2'013.....
				for($i=1;$i<=10;$i++)
					$id.=fgetc($file);
				fclose($file);
				$_SESSION['student']=$id;
				$_SESSION['receipt']=$receipt;
			}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Student Checkpoint !!</title>
<link rel="stylesheet" type="text/css" href="../../common/vdo_style.css" />

<style>
* {
 box-sizing:border-box;
}
#reg { 
 background:url(../../common/bg2.jpg) no-repeat right bottom;
 background-size:cover;
 height:220px;
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
#outer input:focus {
 background-color:#FFFFFF;
}
#outer input:after {
 clear:both;
}

hr {
 color:#FFCCCC;
 width:90%;
 margin-top:15px;
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
</style>
</head>
<body>
<video autoplay loop id="bgvid" controls>
<source src="../../common/vdo7.mp4" type="video/mp4">
can't play
</video>

<div id="reg">
 <div id="inner">
  <p>Student: Enter your password !!</p> 
 </div>
 
 <div id="outer">
  <form action="check_student_receipt.php" method="post" autocomplete="off">
    <label>Password </label><input type="password" id="pwd" name="pwd" class="hover" maxlength="20" size="30" /><br /><br /><br />
   </div> 
  <div id="center">
   <input type="submit" id="submit"  value="Login" style="background:-webkit-linear-gradient(grey,black);"  /><br /><br />
  </form>
  
  </div>
</div>
</body>
</html>

<?php
		}
	}else {
		$_SESSION['msg']='Invalid Access';
		header('Location: redirect.php');
	}
?>