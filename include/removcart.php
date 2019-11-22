<?php
	$cart_id=$_POST['cart_id'];
	$product_id=$_POST['product_id'];
	$quantity=$_POST['quantity'];
	session_start();
	include('conn.php');


	$sql1="SELECT quant FROM products WHERE id = $product_id";
	$result=$db->query($sql1) or die('error: '.$db->error);
	$row = $result->fetch_assoc();
	// echo "string";
	$updateQ = (($quantity==0) ? 1 : $quantity ) + $row['quant'];
	// echo $updateQ;
	// exit;

	$sql1="DELETE FROM `cart` WHERE `cart`.`id` = $cart_id";
	$result=$db->query($sql1) or die('error: '.$db->error);
	
	$sql1="UPDATE products SET quant = $updateQ WHERE id = $product_id";
	$result=$db->query($sql1) or die('error: '.$db->error);
		header("location:../index.php");    

	

?>