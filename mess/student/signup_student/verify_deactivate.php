<?php
$KEY = "humbarbaadhai";
session_start();
@$hash = $_GET['hash'];
@$user_id = $_GET['id'];
@$timestamp = $_GET['timestamp'];
$verifyurl="../login_student/forgot_pwd/reset_pwd.php?id=".$user_id.'&timestamp='.$timestamp.'&hash='.$hash;
$deactivateurl = "deactivate.php?id=".$user_id.'&timestamp='.$timestamp.'&hash='.$hash;
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<script  type="text/javascript" src="../..common/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="../../common/vdo_style.css" />
<title>Verify/Deactivate Account</title>
<style>
	body{
		font-family:"Comic Sans MS";
	}
	#white-background{
		display:none;
		position:fixed;
		height:100%;
		width:100%;
		opacity:0.5;
		top:0;
		left:0;	
		z-index:90;
		background-color:#fefefe;
	}
	#header{
		background-color:black;
		opacity:0.7;
		font-size:25px;
		color:red;
		font-weight:bold;
		padding: 10px;
		padding-left:20px;
		border-radius:10px 10px 0 0;
	}
	#dlgbox{
		display:none;
		position:fixed;
		width:480px;
		z-index:90;
		border-radius:10px;
		background-color:white;
		border:1px solid #000000;	
		box-shadow:5px 5px 5px black;
	}
	#footer{
		text-align:center;
		padding:15px;
	}
	#body{
		font-weight:bold;
		padding:10px;
		color:black;
		font-size:20px;
		text-align:center;
	}
	.button{
		font-family:"Comic Sans MS";
		background:-webkit-linear-gradient(#135CC9,#003871);
		opacity:0.8;
		box-shadow:2px 2px 2px grey; 
		color:white;	
		border-radius:5px;
		padding:2px 20px;
		height:40px;;
		width:120px;
		font-size:15px;
		cursor:pointer;
	}
	#hoverdiv {
	display:none;
	background-color:#cad5e7;
	color:#000000;
	position:fixed;
	font-size:16px;
	padding:2px;
	border:1px solid black;
	}
	
</style>

</head>

<body>
	
	<div id="white-background">
    </div>
    <video autoplay loop id="bgvid" controls>
<source src="../../common/vdo7.mp4" type="video/mp4">
can't play
</video>
<div id="dlgbox">
    <div id="header" >
        Message
    </div>
    <div id="body">
        <p>Select your choice !!</p>
    </div>
  <div id="footer">
    <a href="<?php echo $verifyurl; ?>"> <input type="button" class="button" hovertext="Your account will be verified successfully. Proceed to Log In." id="button1" value="Verify" ></a>
    <a href="../login/index.php" style="text-decoration:none;"><input type="button" class="button" id="gotit" value="Got It !!"></a>
    <a href="<?php echo $deactivateurl; ?>" style="text-decoration:none;"><input type="button" class="button" hovertext="your account will be automatically deactivated and you will be redirected to our home page."  id="button2" value="Deactivate" ></a>
    <div id="hoverdiv">
    </div>
  </div> 
</div>
    
   <script>
		function show(error){
			var whitebg=document.getElementById('white-background');
			var dlgbox=document.getElementById('dlgbox');
			var bt1= document.getElementById('button1');
			var bt2=document.getElementById('button2');
			var bt3=document.getElementById('gotit');
			document.getElementById('body').innerHTML=error;
			var winheight = window.innerHeight;
			var winwidth = window.innerWidth;
			dlgbox.style.display='block';
			whitebg.style.display='block';
			dlgbox.style.left=(winwidth/2) - (480/2) + "px";
			dlgbox.style.top='100px';	
			bt1.style.display='none';
			bt2.style.display='none';	
			bt3.style.display='inline';
			bt3.style.textAlign='center';
		}
		
		function ok(msg){
			var whitebg=document.getElementById('white-background');
			var dlgbox=document.getElementById('dlgbox');
			var bt1= document.getElementById('button1');
			var bt2=document.getElementById('button2');
			var bt3=document.getElementById('gotit');
			document.getElementById('body').innerHTML=msg;
			var winheight = window.innerHeight;
			var winwidth = window.innerWidth;
			dlgbox.style.display='block';
			whitebg.style.display='block';
			dlgbox.style.left=(winwidth/2) - (480/2) + "px";
			dlgbox.style.top='100px';		
			bt3.style.display='none';
		}
			// JavaScript Document
			$('.button').mousemove(function(e) {
				var htext=$(this).attr('hovertext');
				$('#hoverdiv').text(htext).show();
				$('#hoverdiv').css('top',e.clientY+10).css('left',e.clientX+10);
			}).mouseout(function(e) {
				$('#hoverdiv').hide();
			});
	</script>
</body>
</html>

<?php
	if ($hash == md5( $user_id . $timestamp . $KEY ))
	{
    if ( time() - $timestamp > 108000 ) 
  	  {
		echo "<script>show('Sorry , This link is expired.');</script>";
        die();
    }else{
		echo "<script>ok('Select your choice.');</script>";
	}
}else{
	echo "<script>show('Invalid Parameters.');</script>";
     die();
}
?>
