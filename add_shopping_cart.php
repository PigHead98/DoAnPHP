<?php
function add_shopping_cart($uid = "2",$pid,$p_name = "a",$p_price,$p_qty ="1")
{
	if (!isset($_COOKIE['tr_id'])) {
		setcookie("tr_id",Time(),time()+604800);
	}
	else
	{
		$con = mysqli_connect("localhost","root","","");
			if (mysqli_connect_errno())
				  {
				  echo "Failed to connect to MySQL: " . mysqli_connect_error();
				  }		
			mysqli_select_db($con,"onlineshopping");
			mysqli_query($con,"SET NAME 'utf8'");
			if(check_product($pid,$_COOKIE['tr_id']) == 0)
			{
				// die("check ok");
				$sql = "INSERT INTO `customer_order` 
					(`uid`,`pid`,`p_name`,`p_price`,`p_qty`,`p_status`,`tr_id`) 
					VALUES 
					(".$uid.",".$pid.",".$p_name.",".$p_price.",".$p_qty.",'no',".$_COOKIE['tr_id'].")";
				
					if(!mysqli_query($con,$sql))
					{ 
						//var_dump($sql);
						exit ("Error: " . mysqli_error($con));
					}

				else {

				echo '<script type="text/javascript">
					alert("them thanh cong");
				</script>';	
				 
				mysqli_close($con); header("Location:/trangchu/index.php ");//require('index.php');
				}
			}
			else
			{
				// die("check not ok");
				$result = mysqli_query($con,"select * from customer_order where pid = $pid");
				$row = mysqli_fetch_array($result);
				$qty = $row['p_qty'] + 1;
				$sql = " UPDATE `customer_order` SET `p_qty`=$qty WHERE pid = $pid ";
				if(!mysqli_query($con,$sql))
					{ 
						exit ("Error: " . mysqli_error($con));
					}

				else {

				echo '<script type="text/javascript">
					alert("them thanh cong");
				</script>';	mysqli_close($con); header("Location:/trangchu/index.php ");//require('index.php');
				}
			}
		}
}	
function check_product($id,$tr_id)
{
	$con = mysqli_connect("localhost","root","","");
		if (mysqli_connect_errno())
			  {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			  }		
		mysqli_select_db($con,"onlineshopping");
		mysqli_query($con,"SET NAME 'utf8'");
		$result = mysqli_query($con,"select * from customer_order where pid = $id and tr_id = $tr_id");//js onclick
		if(mysqli_num_rows($result)!=0)
		{	
			mysqli_close($con);
			return 1;
		}
		else{
		mysqli_close($con);
		return 0;}
	}
	
?>