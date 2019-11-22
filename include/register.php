<?php
if(isset($_POST['submit'])){
	$name=$_POST['name'];
	$mob_no=$_POST['mob_no'];
	$age=$_POST['age'];
	$user_type=$_POST['user_type'];
	$e=$_POST['email'];
	$p=md5($_POST['password']);
	session_start();
	include('conn.php');
	$sql1="INSERT INTO `users` (`id`, `email`, `password`, `name`, `age`, `mobile`, `gender`) VALUES (NULL, '$e', '$p', '$name', '$age', '$mob_no', '$user_type');";
	$result=$db->query($sql1) or die('error: '.$db->error);
	$_SESSION['message']='User added successfully!';
		header("location:../register.php");    
}
	

?>