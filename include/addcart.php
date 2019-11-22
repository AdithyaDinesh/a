<?php
if(isset($_POST['submit'])){
	session_start();
	$product_id=$_POST['id'];
	$customer_id=$_SESSION['userId'];
	$price=$_POST['price'];
	$quant=$_POST['quant'];
	$p = $price * $quant;
	$id = $_SESSION['userId'];
	include('conn.php');
	$sql1="SELECT quant FROM products WHERE id = $product_id";
	$result=$db->query($sql1) or die('error: '.$db->error);
	$row = $result->fetch_assoc();
	$updateQ = $row['quant'] - $quant;
	$sql1="INSERT INTO `cart` (`id`, `product_id`, `customer_id`, `quantity`, `price`) VALUES (NULL, '$product_id', '$customer_id', '$quant', '$p')";
	$result=$db->query($sql1) or die('error: '.$db->error);
	
	$sql1="UPDATE products SET quant = $updateQ WHERE id = $product_id";
	$result=$db->query($sql1) or die('error: '.$db->error);

		header("location:../index.php");    
}
	

?>