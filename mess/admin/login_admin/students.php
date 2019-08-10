<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>STUDENTS INFO</title>
<link rel="stylesheet" type="text/css" href="../../common/vdo_style.css" />
<script  type="text/javascript" src="../../common/jquery.js"></script>

<style>
* {
	box-sizing:border-box;
}
#reg { 
	background:url(../../common/bg2.jpg) no-repeat right bottom;
	background-size:cover;
	height:300px;
	width:518px;
	border-radius:10px;
	margin-left:auto;
	margin-right:auto;
	margin-top:10%;
	margin-bottom:auto;
	box-shadow:7px 7px 7px black;
}
#inner {
	height:80px;
	background:black;
	opacity:0.6;
	border-radius:10px 10px 0 0;
	margin-bottom:15px;
}
#inner p {
	color:#FFFFFF;
	font-size:26px;
	font-weight:bold;
	font-family:"comic Sans MS";
	padding:20px 20px 20px 30px;
	text-shadow:2px 2px 1px;
}

#outer input {
	height:50px;
	border-radius:5px;
	border:inset;
	background-color:#dcdcdc;
	margin-left:200px;
	margin-top:5px;
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
		<div id="outer" style="display:inline; padding:10px;">
			<div id="p1" style="padding:10px;">
			<a href="view_all_students.php" style="text-decoration:none"><input type="button" value="View Students" style="background:-webkit-linear-gradient(#b8b8b8,black);" /></a>
			</div><br />
			<div id="p2" style="padding:10px;">
			<a href="clear_all_students.php" style="text-decoration:none"><input type="button" value="Clear Student Account" style="background:-webkit-linear-gradient(#b8b8b8,black);" /></a>
			</div><br />
			<div id="p3" style="padding:10px;">
			<a href="add_money.php" style="text-decoration:none"><input type="button" value="Add Money" style="background:-webkit-linear-gradient(#b8b8b8,black);" /></a>
			</div><br />
			<div id="p4" style="padding:10px;"><a href="profile.php" style="text-decoration:none;">
					<input  type="button" value="Back" name="back" style="background:-webkit-linear-gradient(#b8b8b8,black);" />
			</a></div><br />
		</div>
	</div>
</div>
</body>
</html>
