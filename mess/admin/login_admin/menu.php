<?php 
require '../../common/connect.inc.php';
	/*require 'checkifloggedin.php';
	require '../../common/connect.inc.php';
	$sname=$_SESSION['sname'];
	$sid=$_SESSION['sid'];
	$query=mysql_query("select amount from student where id='$sid'");
	$amount=mysql_result($query,0,'amount');
	$_SESSION['amount']=$amount;
	if(isset($_SESSION['count']))
		unset($_SESSION['count']);	*/
?>


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Menu !!</title>
<link rel="stylesheet" type="text/css" href="../../common/vdo_style.css" />

<style>
* {
 box-sizing:border-box;
}
#reg { 
 background:url(../../common/bg2.jpg) no-repeat right bottom;
 background-size:cover;
 height:280px;
 width:500px;
 border-radius:10px;
   margin: auto;
  position: absolute;
  top: 0; left: 0; bottom: 0; right: 0;
 box-shadow:7px 7px 7px black;
 
}

#outer input {
 height:40px;
 border:inset;
 background-color:#dcdcdc;
 margin-left:240px;
 margin-top:8px;
 font-family:"comic Sans MS";
 font-size:30px;
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
 background:-webkit-linear-gradient(#135CC9,#003871);
}
#_upper{
 height:80px;
 background:black;
 opacity:0.6;
 border-radius:10px 10px 0 0;
 margin-bottom:95%;
 padding:0px;
 top:0%;
	
}
#_upper p{
 color:#FFFFFF;
 font-size:26px;
 font-weight:bold;
 font-family:"comic Sans MS";
 padding:20px 20px 20px 30px;
 text-shadow:2px 2px 1px;
}

ul#favorite li{	
		text-decoration:none;
		background-color:black;
		display:inline;
		border-radius:20px 20px 20px 20px;
		text-shadow:2px 2px 1px;
		height:80px;
		 background:black;
		 opacity:0.6;
		 margin-bottom:95%;
		 padding:0px;
		 top:0%;
		 color:#FFFFFF;
		 font-size:26px;
		 font-weight:bold;
		 font-family:"comic Sans MS";
		 padding:20px 20px 20px 30px;
		 padding:10px 80px;
}

</style>
</head>


<body>

<video autoplay loop id="bgvid" controls>
<source src="../../common/vdo7.mp4" type="video/mp4">
can't play
</video>
<!--<div id ="_upper" >
		<p>id: <?php echo $sid;?>    name: <?php echo $sname;?>amount: <?php echo $amount;?></p>
<div >
	<ul id="favorite">
		<li>Id: <?php echo "\t".$sid; ?> </li> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<li> Name: <?php echo "\t".$sname ;?> </li> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<li>Amount: <?php echo "\t".$amount;?> </li> &nbsp;&nbsp;
	</ul>
</div>-->

<div id="reg">
	<div id="center">
	<div id="outer" style="display:inline; padding:10px;">
		<div id="p1" style="padding:8px;">
		<a href="view_menu.php" style="text-decoration:none"><input type="button" value="View Menu" style="background:-webkit-linear-gradient(#b8b8b8,black);" /></a><br />
		</div>
		<div id="p2" style="padding:8px;">
		<a href="update_menu.php" style="text-decoration:none"><input type="button" value="Update Menu" style="background:-webkit-linear-gradient(#b8b8b8,black);" /></a><br />
		</div>
		<div id="p3" style="padding:8px;">
		<a href="profile.php" style="text-decoration:none"><input type="button" value="Back" style="background:-webkit-linear-gradient(#b8b8b8,black);" /></a><br />
		</div>
	</div>
	</div>
</div>

</body>
</html>
