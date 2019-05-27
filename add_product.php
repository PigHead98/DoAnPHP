<?php
include 'add_shopping_cart.php';
	$con = mysqli_connect("localhost","root","","");
		if (mysqli_connect_errno())
			  {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			  }		
		mysqli_select_db($con,"onlineshopping");
		mysqli_query($con,"SET NAME 'utf8'");
	$result = mysqli_query($con,"select * from products where product_id = ".$_GET['id']."");//js onclick
	$row = mysqli_fetch_array($result);
	// add_shopping_cart(2,1,"'dads'",5000,1);
	$name = "'".$row['product_title']."'";
 	mysqli_close($con); 
 	add_shopping_cart(2,$_GET['id'],$name,$row['product_price'],1);	

?>