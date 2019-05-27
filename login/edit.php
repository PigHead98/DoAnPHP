<?php
$fname = $_POST["f_name"];
$lname = $_POST["l_name"];
$pas = $_POST["password"];
$mobile = $_POST["mobile"];
$add1 = $_POST["address1"];
$add2 =  $_POST["address2"];
$con = mysqli_connect("localhost", "root", "","");
			if (mysqli_connect_errno())
			  {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			  }

			mysqli_query($con,"SET NAME 'utf8'");
			mysqli_select_db($con,"onlineshopping");
			$sql = 'UPDATE user_info set 
			`first_name` = "'.$fname.'",
			`last_name` = "'.$lname.'", 

			`password` = "'.$pas.'", 
			`mobile` = "'.$mobile.'", 
			`Address1` = "'.$add1.'", 
			`Address2` = "'.$add2.'"
			where email ="'.$_POST["email"].'"';
			//var_dump($sql);
			if (!mysqli_query($con,$sql)) {
				exit ("Error: " . mysqli_error($con));
			}
			else 
				{
					mysqli_close($con);
					echo "thanh cong";
				}
?>