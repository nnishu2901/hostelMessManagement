
<?php 
	require 'checkifloggedin.php';
	require '../../common/connect.inc.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>View Menu !!</title>
<link rel="stylesheet" type="text/css" href="../../common/vdo_style.css" />

<style>
* {
 box-sizing:border-box;
}
#reg { 
 background:url(../../common/bg2.jpg) no-repeat right bottom;
 background-size:cover;
 height:535px;
 width:800px;
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
#_upper{
 height:80px;
 background:black;
 opacity:0.6;
 border-radius:10px 10px 0 0;
 margin-bottom:95%;
 padding:0px;
 top:0%;
	
}
#p{
	top:5px;
}
form#backmenu input{
		text-decoration:none;
		background-color:black;
		display:inline;
		border-radius:20px 20px 20px 20px;
		text-shadow:2px 2px 1px;
		height:60px;
		 background:black;
		 opacity:0.8;
		 top:0%;
		 color:#FFFFFF;
		 font-size:26px;
		 font-weight:bold;
		 font-family:"comic Sans MS";  
		text-align:center;
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
table,th,tr,td{
				text-align:center;
				border: 2px solid black;
				padding:5px;
				border-collapse:collapse;
				border-spacing:50px;
			}
			table#t1 tr:nth-child(even){background-color:gray;}

		
</style>
</head>


<body>

<video autoplay loop id="bgvid" controls>
<source src="../../common/vdo7.mp4" type="video/mp4">
can't play
</video>
<!--<div id ="_upper" >
		<p>id: <?php echo $sid;?>    name: <?php echo $sname;?>amount: <?php echo $amount;?></p>-->


<div id="reg">
		
<div id="center">
	<div id="outer" style="display:inline; padding:10px;">
		<div id="p1" style="padding:8px;">
			<table id="t1"><caption style="font-size:30px; bottom:5px;"><b>Mess Menu</b></caption>
			<tr style="font-size:20px">
				<th>Day</th>
				<th>Breakfast</th>
				<th>Lunch</th>
				<th >Dinner</th>			
			</tr>
			<tr>
				<td>Monday</td>	
				<?php $query=mysql_query("select * from menu where day='Monday'");$row=mysql_fetch_assoc($query);?>
				<td><?php echo $row['breakfast'];?></td>
				<td><?php echo $row['lunch'];?></td>	
				<td><?php echo $row['dinner'];?></td>							
			</tr>
			<tr>
				<td>Tuesday</td>
				<?php $query=mysql_query("select * from menu where day='Tuesday'");$row=mysql_fetch_assoc($query);?>
				<td><?php echo $row['breakfast'];?></td>
				<td><?php echo $row['lunch'];?></td>	
				<td><?php echo $row['dinner'];?></td>							
			</tr>
			<tr>
				<td>Wednesday</td>
				<?php $query=mysql_query("select * from menu where day='Wednesday'");$row=mysql_fetch_assoc($query);?>
				<td><?php echo $row['breakfast'];?></td>
				<td><?php echo $row['lunch'];?></td>	
				<td><?php echo $row['dinner'];?></td>					
			</tr>
			<tr>
				<td>Thursday</td>
				<?php $query=mysql_query("select * from menu where day='Thursday'");$row=mysql_fetch_assoc($query);?>
				<td><?php echo $row['breakfast'];?></td>
				<td><?php echo $row['lunch'];?></td>	
				<td><?php echo $row['dinner'];?></td>							
			</tr>
			<tr>
				<td>Friday</td>	
				<?php $query=mysql_query("select * from menu where day='Friday'");$row=mysql_fetch_assoc($query);?>
				<td><?php echo $row['breakfast'];?></td>
				<td><?php echo $row['lunch'];?></td>	
				<td><?php echo $row['dinner'];?></td>						
			</tr>
			<tr>
				<td>Saturday</td>	
				<?php $query=mysql_query("select * from menu where day='Saturday'");$row=mysql_fetch_assoc($query);?>
				<td><?php echo $row['breakfast'];?></td>
				<td><?php echo $row['lunch'];?></td>	
				<td><?php echo $row['dinner'];?></td>					
			</tr>
			<tr>
				<td>Sunday</td>		
				<?php $query=mysql_query("select * from menu where day='Sunday'");$row=mysql_fetch_assoc($query);?>
				<td><?php echo $row['breakfast'];?></td>
				<td><?php echo $row['lunch'];?></td>	
				<td><?php echo $row['dinner'];?></td>				
			</tr>
		</table>
		<br/>
				<a href="menu.php" style="text-decoration:none">
					<input  type="button" value="Back" name="back" />
				</a>
		</div>
	</div>
	</div>
</div>

</body>
</html>
