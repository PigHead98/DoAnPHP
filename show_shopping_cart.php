<?php
	function Show_shopping_cart($idcart,$con)
	{
		$customer_order = array();
		$result = mysqli_query($con,"select * from customer_order where tr_id = $idcart");//js onclick
		while($row = mysqli_fetch_array($result)){
				$customer_order[$row['id']] = array('name' => $row['p_name'],
													'price' => $row['p_price'],
													'qty' => $row['p_qty'],
													'p_id' => $row['pid']);
			}
		return $customer_order;
	}
	function Show_shopping_img($id,$con){
		$result = mysqli_query($con,"select * from products where product_id = $id");
		$row = mysqli_fetch_array($result);
		return $row['product_image'];
	}
?>