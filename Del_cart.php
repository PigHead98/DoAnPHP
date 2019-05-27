<?php
function Del_shopping_cart($idcart)
	{
		$con = mysqli_connect("localhost","root","","");
		if (mysqli_connect_errno())
			  {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			  }		
		mysqli_select_db($con,"onlineshopping");
		mysqli_query($con,"SET NAME 'utf8'");
		$sql = "DELETE FROM `customer_order` WHERE tr_id = $idcart";//js onclick
		if(!mysqli_query($con,$sql))
				{ 
					//var_dump($sql);
					exit ("Error: " . mysqli_error($con));
				}

			else {
			mysqli_close($con); header("Location:/trangchu/index.php ");//require('index.php');
			}
	}
	if(isset($_COOKIE['tr_id']))
	{
		Del_shopping_cart($_COOKIE['tr_id']);
		setcookie("tr_id",time()-604800);
	}
	else header("Location:/trangchu/index.php ");
	?>