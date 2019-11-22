<?php
if(isset($_POST['submit'])){
	$name=$_POST['name'];
	$qnt=$_POST['qnt'];
	$exp=$_POST['exp'];
	session_start();
	$id = $_SESSION['userId'];
	include('conn.php');
	$sql1="INSERT INTO `products` (`id`, `name`, `quant`, `price`, `owner`) VALUES (NULL, '$name', '$qnt', '$exp', '$id');";
	$result=$db->query($sql1) or die('error: '.$db->error);
	$_SESSION['message']='Product added successfully!';
		header("location:../addveg.php");    
}
	

?>