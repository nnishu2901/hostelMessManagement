<?php 
	require 'checkifloggedin.php';

	require '../../common/connect.inc.php';
?>


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Update Menu !!</title>
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
	height:420px;
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


</style>
</head>


<body>

<video autoplay loop id="bgvid" controls>
<source src="../../common/vdo7.mp4" type="video/mp4">
can't play
</video>


<div id="reg">
	<div id="center">
		
		<form id="qty" method="POST" style="margin-left:40px" action="after_update.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<div style="font-size:26px;font-family:Georgia;color:#576470"><b><i>Select Day &nbsp; :</i></b>
			<select id="dropmenu"  style="font-size:20px;font-family:monotype corsiva" style="width:100px;" name="day">
				  <option  value="Monday">Monday</option>
				  <option value="Tuesday">Tuesday</option>
				  <option value="Wednesday">Wednesday</option>
				  <option value="Thursday">Thursday</option>
				  <option value="Friday">Friday</option>
				  <option value="Saturday">Saturday</option>
  				  <option value="Sunday">Sunday</option>

				</select></div><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<div style="font-size:26px;font-family:Georgia;color:#576470"><b><i>Select Meal :</i></b>
			
				<select id="dropmenu1" style="font-size:24px;font-family:monotype corsiva" style="width:100px;" name='time'>
				  <option value="breakfast">Breakfast</option>
				  <option value="lunch">Lunch</option>
				  <option value="dinner">Dinner</option>
				  
				</select></div>
				<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<div style="font-size:26px;font-family:Georgia;color:#576470"><b><i>Enter Updated Menu :</i></b>
			<br/><br/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<textarea style="margin-left:-30px; font-family:comic sans MS;" rows="3"  cols="60" name='update_' value='update_'></textarea>
			    <br /></div>
		<input type="submit" style="margin-top:20px"value="Update" /> 
		<a href="menu.php" style="text-decoration:none;display:block;margin-top:20px;">
					<input  type="button" value="Back" name="back" />
		</a>
		</form>
	</div>
</div>
</body>
</html>
