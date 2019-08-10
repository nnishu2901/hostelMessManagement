<?php
	require '../../common/connect.inc.php';
	require 'checkifloggedin.php';
	if(isset($_POST['pwd']) && isset($_POST['student'])){
		$pwd=md5($_POST['pwd']);
		$sid=$_POST['student'];
			$query=mysql_query("Select password,amount from student where id='$sid'");
			$qcheck=mysql_num_rows($query);
			if($qcheck!=1){
				$_SESSION['msg']="This account doesn\'t exists in database any more.";
				header('Location: redirect.php');
			}
			$qpwd=mysql_result($query,0,'password');
			$qamount=mysql_result($query,0,'amount');
			if($pwd==$qpwd){
				$_SESSION['student']=$sid;
				
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Enter Amount to be added!!</title>
<link rel="stylesheet" type="text/css" href="../../common/vdo_style.css" />

<style>
* {
 box-sizing:border-box;
}
#reg { 
 background:url(../../common/bg2.jpg) no-repeat right bottom;
 background-size:cover;
 height:270px;
 width:525px;
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
 margin-top:25px;
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
  <p >Amount To Be Added !!</p> 
 </div>
  <div id="outer">
  <form action="amount.php" method="post" autocomplete="off">
    <br /><label>Amount : </label><input type="text" id="fees" name="fees_added" maxlength="11" size="30"/>
   </div> <br/>
   
  <div id="center">
   <br /><input type="submit" id="submit"  value="Update Amount" style="background:-webkit-linear-gradient(grey,black);"/><br />
  </div>
  </form>
  
</div>
</body>
</html>
		
<?php
			}else{
				$_SESSION['msg']='Incorrect Password.';
				header('Location: redirect.php');
			}	
	}else{
		$_SESSION['msg']='Invalid Access.';
		header('Location: redirect.php');
	}
	
?>