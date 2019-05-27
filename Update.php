<?php
$action = $_GET['action'];$number = isset($_POST['number']) ? (int)$_POST['number'] : false;
 setcookie('num',isset($_POST['qty']) ? (int)$_POST['qty'] : false,time()+604800);
 setcookie('id_update',$_POST['id'],time()+604800);

$tr_id = $_COOKIE['tr_id'];
if ($action == 1) {
	include 'Del_cart.php';
	Update_status($tr_id);
	Del_shopping_cart($tr_id);

}
else if ($action==2) {
	Update_qty($_COOKIE['id_update'],$_COOKIE['num'],$tr_id);
	header("Location:/trangchu/index.php ");
}
function Update_status($tr_id)
{
	# code...
	$con = mysqli_connect("localhost","root","","");
			if (mysqli_connect_errno())
				  {
				  echo "Failed to connect to MySQL: " . mysqli_connect_error();
				  }		
			mysqli_select_db($con,"onlineshopping");
			mysqli_query($con,"SET NAME 'utf8'");
				$sql = " UPDATE `customer_order` SET `p_status`='yes' WHERE tr_id = $tr_id ";
				if(!mysqli_query($con,$sql))
					{ 
						exit ("Error: " . mysqli_error($con));
					}

				else {

				header("Location:/trangchu/index.php ");//require('index.php');
				}
}
function Update_qty($pid,$qty,$tr_id)
{
	# code...
	$con = mysqli_connect("localhost","root","","");
			if (mysqli_connect_errno())
				  {
				  echo "Failed to connect to MySQL: " . mysqli_connect_error();
				  }		
			mysqli_select_db($con,"onlineshopping");
			mysqli_query($con,"SET NAME 'utf8'");
				$sql = " UPDATE `customer_order` SET p_qty = $qty WHERE pid = $pid and tr_id = $tr_id";
				if(!mysqli_query($con,$sql))
					{ 
						exit ("Error: " . mysqli_error($con));
					}

				else {
					mysqli_close($con); 
					setcookie('num',$_POST['qty'],time()-604800);
 					setcookie('id_update',$_POST['id'],time()-604800);

					header("Location:/trangchu/index.php ");//require('index.php');

				}
}
	//Update_status($_COOKIE['tr_id']);
?>