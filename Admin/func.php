	<?php
	
	if($_POST["username"]== "admin@gmail.com" && $_POST["password"] == "123")
		{
			
			header("Location:/trangchu/admin/cart.php ");
			

		}
	else
	{
		header("Location:/trangchu/admin/login.php ");
	}

	?>