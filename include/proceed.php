<?php
	include('conn.php');
	session_start();
	$id = $_SESSION['userId'];
	$sql1="UPDATE cart SET status = 1 WHERE customer_id = $id";
	$result=$db->query($sql1) or die('error: '.$db->error);
		header("location:../index.php");    

	

?>