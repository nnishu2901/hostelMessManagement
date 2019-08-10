<?php
	require 'checkifloggedin.php';
	$sname=$_SESSION['sname'];
	$sid=$_SESSION['sid'];
	$amount=$_SESSION['amount'];
	require '../../common/connect.inc.php';
	if(!isset($_POST['bnum']) || !isset($_POST['lnum']) || !isset($_POST['dnum'])) {
		$_SESSION['msg']='Invalid Access';
		header('Location: redirect.php');
		die();
	}else {
		if(isset($_SESSION['canbook']))
			unset($_SESSION['canbook']);
		$bnum=$_POST['bnum'];
		$lnum=$_POST['lnum'];
		$dnum=$_POST['dnum'];
		$total=$amount-$_POST['hidden'];
		$query=mysql_query("select * from booking where category='total'");
		$row=mysql_fetch_assoc($query);
		$bnum_=$bnum+$row['breakfast'];
		$lnum_=$lnum+$row['lunch'];
		$dnum_=$dnum+$row['dinner'];
		mysql_query("update booking set breakfast='$bnum_', lunch='$lnum_',dinner='$dnum_' where category='total'");
		mysql_query("update student set amount='$total' where id='$sid'");
		mysql_query("update student set booked='1' where id='$sid'");
		$query=mysql_query("select receipt_count from internal");
		$count=mysql_result($query,0,'receipt_count');
		if($count==0) {
			$files = glob('../../receipt/*'); // get all file names
			foreach($files as $file){ // iterate files
				if(is_file($file))
					unlink($file); // delete file
			}
		}
		$file=fopen("../../receipt/receipt".$count.".txt","w");
		$next=$count+1;
		mysql_query("update internal set receipt_count='$next'");
		$now=date('Y-m-d H:i:s');
		$for=date('Y-m-d',time()+86400);
		fwrite($file,"receipt id:receipt".$count."\r\nstudent id : ".$sid."\r\n"."booked at : ".$now."\r\n"."booked for : ".$for."\r\n\r\n"."breakfast : ".$bnum."\r\n"
				."lunch : ".$lnum."\r\ndinner : ".$dnum."\r\n\r\ntotal amount : ".$_POST['hidden']);
		fclose($file);
		$_SESSION['msg']="Order successfully booked with receipt id : receipt".$count."   Please download";
		$_SESSION['link']='print.php';
		$_SESSION['value']='Download';
		$_SESSION['count']=$count;
		header('Location: redirect.php');
	}
?>