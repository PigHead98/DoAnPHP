<?php
function Del_shopping_cart($idItem)
	{
		$con = mysqli_connect("localhost","root","","");
		if (mysqli_connect_errno())
			  {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			  }		
		mysqli_select_db($con,"onlineshopping");
		mysqli_query($con,"SET NAME 'utf8'");
		$sql = "DELETE FROM `customer_order` WHERE pid = $idItem";//js onclick
		if(!mysqli_query($con,$sql))
				{ 
					var_dump($sql);
					exit ("Error: " . mysqli_error($con));
				}

			else {
			mysqli_close($con);
			echo '<script type="text/javascript">
					alert("xoa thanh cong");
				</script>';
			 header("Location:/trangchu/cart.php ");//require('index.php');
			}
	}
	
	Del_shopping_cart($_GET['idItem']);
	?>