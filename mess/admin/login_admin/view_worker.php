<?php 
	require 'checkifloggedin.php';
	require '../../common/connect.inc.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Workers list</title>
<link rel="stylesheet" type="text/css" href="../../common/vdo_style.css" />

<style>
* {
 box-sizing:border-box;
}
#reg { 
 background:url(../../common/bg2.jpg) no-repeat right bottom;
 background-size:cover;
 height:160px;
 width:900px;
 border-radius:10px;
 margin: auto;
 position:relative;
 top: 20px;
 left: 0; bottom: 0; right: 0;
 box-shadow:7px 7px 7px black;
}

#outer input {
 height:60px;
 border:inset;
 background-color:#dcdcdc;
 margin-left:240px;
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
 padding:0px 30px 0px;
 border-radius:5px;
 background:-webkit-linear-gradient(gray,black);
}
#p{
	top:5px;
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
table{
	position:relative;
	top:20px;
	width:90%;
	text-align:center;
	margin-left:auto;
	margin-right:auto;
	border-collapse: collapse;
}
td,th {
    font-size: 1em;
    border: 1px solid black;
	background-color:#cccccc;
}

th {
    font-size: 1.1em;
    text-align:center;
    background-color:#6699FF;
	opacity:0.7;
 	color:white;
	height:30px;
}
			table#t1 tr:nth-child(even){background-color:gray;}

		
</style>
</head>
<script>
	function inc() {
		var el=document.getElementById('reg');
		var height = el.offsetHeight;
    	var newHeight = height + 35;
    	if(newHeight>=window.innerHeight) {
			el.style.position='relative';
		}else {
			el.style.position='absolute';
		}
		el.style.height = newHeight + 'px';
		
	}
</script>

<body>

<video autoplay loop id="bgvid" controls>
<source src="../../common/vdo7.mp4" type="video/mp4">
can't play
</video>

<div id="reg">		
<div id="center">
	<div id="outer" style="display:inline; ">
		<div id="p1" style="padding:8px;">
			<table id="t1"><caption style="font-size:25px; bottom:5px;"><b>Workers List</b></caption>
			
			<tr style="font-size:20px">
				<th width="30">wid</th>
				<th>name</th>
				<th>phone</th>
				<th width="250">address</th>
				<th >type</th>
				<th width="20">wages</th>
				<th width="10" >available</th>
			</tr>
			<?php
				$query=mysql_query('select * from worker order by wid');
				$count=mysql_num_rows($query);
				for($i=0;$i<$count;$i++) {
					$wid=mysql_result($query,$i,'wid');
					$wname=mysql_result($query,$i,'wname');
					$phno=mysql_result($query,$i,'phno');
					$address=mysql_result($query,$i,'address');
					$type=mysql_result($query,$i,'type');
					$wages=mysql_result($query,$i,'wages');
					$available=mysql_result($query,$i,'available');
			?>
					<tr style="font-size:20px">
						<td width="30"><?php echo $wid;?></td>
						<td><?php echo $wname;?></td>
						<td><?php echo $phno;?></td>
						<td width="250"><?php echo $address;?></td>
						<td ><?php echo $type;?></td>
						<td width="20"><?php echo $wages;?></td>
						<td width="10" ><?php echo $available;?></td>
					</tr>
			<?php
					echo "<script>inc();</script>";
				}
			?>
			</table><br/><br /><br/>
				<a href="clear_wages.php" style="text-decoration:none">
					<input  type="button" value="Clear Wages of all workers" name="back" /><br/>
				</a>
				<a href="worker.php" style="text-decoration:none">
					<input  type="button" value="Back" name="back" />
				</a>
		</div>
	</div>
	</div>
</div>
</body>
</html>

