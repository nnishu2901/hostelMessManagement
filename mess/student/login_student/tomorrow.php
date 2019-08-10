<?php 
	require '../../common/connect.inc.php';
	require 'checkifloggedin.php';
	if(!isset($_SESSION['canbook'])) {
		$hour=date('H');
		if($hour==22 || $hour==23)
			$_SESSION['msg']='Booking options closed for now.Please visit the site after 12am';
		else
			$_SESSION['msg']="You have already booked for tomorrow\'s meal";
		header('Location: redirect.php');
	}
	$sname=$_SESSION['sname'];
	$sid=$_SESSION['sid'];
	$amount=$_SESSION['amount'];
	require '../../common/connect.inc.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $sname; ?> !!</title>
<link rel="stylesheet" type="text/css" href="../../common/vdo_style.css" />
<script type="text/javascript" src="../../common/jquery.js"></script>
<script type="text/javascript" src="drop.js"></script>
<style>
* {
 box-sizing:border-box;
}
#reg { 
	background:url(../../common/bg2.jpg) no-repeat right bottom;
	background-size:cover;
	height:320px;
	width:618px;
	border-radius:10px;
	margin: auto;
    position: absolute;
    top: 0; left: 0; bottom: 0; right: 0;
	box-shadow:7px 7px 7px black;
	overflow:visible;
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
 background:-webkit-linear-gradient(grey,black);
}
#center input:disabled {
 opacity:0.3;
}

ul#favorite li{	
		text-decoration:none;
		background-color:black;
		display:inline;
		border-radius:20px 20px 20px 20px;
		text-shadow:2px 2px 1px;
		height:80px;
		opacity:0.6;
		color:white;
		font-size:26px;
		font-weight:bold;
		font-family:"comic Sans MS";
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
#status {
	padding:30px;
	position:relative;
	top:10px;
	font-size:18px;
	color:red;
	font-weight:bold;
	font-family:"Comic Sans MS";
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
		<li>Id: <?php echo $sid; ?> </li> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<li> Name: <?php echo $sname ;?> </li> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<li>Amount: <?php echo $amount;?> </li> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	</ul>
</div>

<div id="reg">
	<div id="center">
		<span id="status" >Your total is 0</span>
		<table> <?php $day=date('l',time()+86400); $query=mysql_query("select * from menu where day='$day'");?>
		<form id="qty" method="POST" action="order.php">
			<input type="hidden" id="hidden" value="0" name="hidden">
			<input type="hidden" id="amount" value="<?php echo $amount;?>" name="hidden_">
			<tr height="50"><th>Breakfast</th><th>Lunch</th><th>Dinner</th></tr>
			<tr height="40" ><td><?php echo mysql_result($query,0,'breakfast');?></td><td><?php echo mysql_result($query,0,'lunch');?></td><td><?php echo mysql_result($query,0,'dinner');?></td></tr>
				<tr height="40" >
					<td>
					<select id="dropmenu" style="width:80px;" name="bnum">
					  <option value="0">0</option>
					  <option value="1">1</option>
					  <option value="2">2</option>
					  <option value="3">3</option>
					  <option value="4">4</option>
					  <option value="5">5</option>
					</select>
					</td>
					<td>
					<select id="dropmenu1" style="width:80px;" name='lnum'>
					  <option value="0">0</option>
					  <option value="1">1</option>
					  <option value="2">2</option>
					  <option value="3">3</option>
					  <option value="4">4</option>
					  <option value="5">5</option>
					</select>
					</td>
					<td>
					<select id="dropmenu2" style="width:80px;" name='dnum'>
					  <option value="0">0</option>
					  <option value="1">1</option>
					  <option value="2">2</option>
					  <option value="3">3</option>
					  <option value="4">4</option>
					  <option value="5">5</option>
					</select>
					</td>
				</tr>
				</table><br /><br />
			<input type="submit" id="submit" value="Book" /> 
		</form>
			<a href="profile.php" style="text-decoration:none;display:block;margin-top:25px;"><input  type="button" value="Back" name="back" /></a>
	</div>
</div>
<?php 
	 $query=mysql_query("select * from booking where category='rate'"); 
	 $breakfast=mysql_result($query,0,'breakfast');
	 $lunch=mysql_result($query,0,'lunch');
	 $dinner=mysql_result($query,0,'dinner');
?>				
<input type="hidden" id="bfrate" value="<?php echo $breakfast; ?>" >
<input type="hidden" id="lrate" value="<?php echo $lunch; ?>" >
<input type="hidden" id="drate" value="<?php echo $dinner; ?>" >
</body>
</html>
