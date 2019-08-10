<?php

// This is a sample code in case you wish to check the username from a mysql db table

if(isset($_POST['uid']))
{
		$uid = $_POST['uid'];
		
		include("../../common/connect.inc.php");
		
		$sql_check = mysql_query("SELECT id FROM student WHERE id='$uid'");
		
		if(mysql_num_rows($sql_check))
		{
		echo '<img src="wrong.png" align="absmiddle" style="margin-right:5px;"/><font color="red">This user id is already registered.</font>';
		}
		else
		{
		echo 'OK';
		}

}else {

}

?>