<?php 
	require 'checkifloggedin.php';
	require '../../common/connect.inc.php';
	$sname=$_SESSION['sname'];
	$sid=$_SESSION['sid'];
	$query=mysql_query("select amount from student where id='$sid'");
	$amount=mysql_result($query,0,'amount');
	$_SESSION['amount']=$amount;
	if(isset($_SESSION['count']))
		unset($_SESSION['count']);
	if(isset($_SESSION['canbook']))
		unset($_SESSION['canbook']);	
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $sname; ?> !!</title>
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
 margin-top:8px;
 cursor:pointer;
 width:auto;
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

ul#favorite li{	
		text-decoration:none;
		display:inline;
		border-radius:20px 20px 20px 20px;
		text-shadow:2px 2px 1px;
		height:80px;
		background:black;
		opacity:0.6;
		margin-bottom:95%;
		color:white;
		font-size:26px;
		font-weight:bold;
		font-family:"comic Sans MS";
		padding:10px 80px;
}

</style>
</head>
<body>
<video autoplay loop id="bgvid" controls>
<source src="../../common/vdo7.mp4" type="video/mp4">
can't play
</video>

<div >
	<ul id="favorite">
		<li>Id: <?php echo "\t".$sid; ?> </li> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<li> Name: <?php echo "\t".$sname ;?> </li> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<li>Amount: <?php echo "\t".$amount;?> </li> &nbsp;&nbsp;
	</ul>
</div>

<div id="reg">
	<div id="center">
		<div id="outer" style="display:inline; padding:10px;">
		<?php
			$query=mysql_query("select booked from student where id='$sid'");
			$booked=mysql_result($query,0,'booked');
			$hour=date('H');
			if($booked==0 && !($hour==22 || $hour==23)) { 
				$_SESSION['canbook']=1;
		?>
			<div id="p1" style="padding:8px;">
			<a href="tomorrow.php" style="text-decoration:none"><input type="button" value="Order for tomorrow" style="background:-webkit-linear-gradient(grey,black);" /></a><br />
			</div>
		<?php
			}else {
		?>
			<style>
				#reg { 
					 background:url(../../common/bg2.jpg) no-repeat right bottom;
					 background-size:cover;
					 height:200px;
					 width:500px;
					 border-radius:10px;
					 margin: auto;
					 position: absolute;
					 top: 0; left: 0; bottom: 0; right: 0;
					 box-shadow:7px 7px 7px black;
					}
			</style>
		<?php
			}
		?>
			<div id="p2" style="padding:8px;">
			<a href="view_menu.php" style="text-decoration:none"><input type="button" value="View Menu" style="background:-webkit-linear-gradient(grey,black);" /></a><br />
			</div>
			<div id="p3" style="padding:8px;">
			<a href="logout.php" style="text-decoration:none"><input type="button" value="Logout" style="background:-webkit-linear-gradient(grey,black);" /></a><br />
			</div>
		</div>
	</div>
</div>

</body>
</html>
