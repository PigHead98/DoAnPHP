<?php //ketnoi db
	session_start();
		$con = mysqli_connect("localhost","root","","");
		if (mysqli_connect_errno())
			  {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			  }		
		mysqli_select_db($con,"onlineshopping");
		mysqli_query($con,"SET NAME 'utf8'");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>OnlineShopping</title>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap-3.3.6-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div class="navbar navbar-default navbar-fixed-top" id="topnav">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="index.php" class="navbar-brand">OnlineShopping</a>
			</div>


		</div>
	</div>
	<p><br><br></p>
	<p><br><br></p>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
			<div class="row">
				<div class="col-md-12" id="cart_msg"></div>
			</div>
				<div class="panel panel-primary text-center">
					<div class="panel-heading">Cart Checkout</div>
					<div class="panel-body"></div>
					<div class="row">
						<div class="col-md-2"><b>Action</b></div>
						<div class="col-md-2"><b>Product Image</b></div>
						<div class="col-md-2"><b>Product Name</b></div>
						<div class="col-md-2"><b>Product Price</b></div>
						<div class="col-md-2"><b>Quantity</b></div>
						<div class="col-md-2"><b>Price in $</b></div>
					</div>
					<br><br>
					<div id='cartdetail'> <!-- tim cach lay value qty san pham-->
						<?php
						
								if (isset($_COOKIE['tr_id'])) {
									include 'show_shopping_cart.php';
								$customer_order = Show_shopping_cart($_COOKIE['tr_id'],$con);
									$rs ='<div id="cartdetail">';
									$Tongtien = 0;
								foreach ($customer_order as $id => $value) {
									$img = Show_shopping_img($value['p_id'],$con);
									$Tongtien += $value['price'] * $value['qty'];

									 $rs.= '
					<div class="row">
						<div class="col-md-2"><a href="Del_item.php?idItem='.$value["p_id"].'" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
						<a href="Update.php?action=2" class="btn btn-success update_qty"><span class="glyphicon glyphicon-ok-sign" ></span></a>
						<input type="hidden" class="update_id" value="'.$value["p_id"].'" >
						</div>
						<div class="col-md-2"><img src="assets/prod_images/'.$img.'" width="60px" height="60px"></div>
						<div class="col-md-2">'.$value['name'].'</div>
						<div class="col-md-2">'.$value['price'].'</div>
						<div class="col-md-2"><input class="form-control qty" type="text" size="10px" id="id_qty" name="qty" 
						value="'.$value['qty'].'"></div>
						<div class="col-md-2"><input class="form-control" type="text" size="10px" 
						value="'.number_format($value['price'] * $value['qty']).'"></div>
					</div>
										';
								} $rs.='</div>
													<div class="row">
														<div class="col-md-8"></div>
														<div class="col-md-4">
															<b>Total: '.$Tongtien.'</b>
														</div>
													</div>';
													echo $rs; 
													//  echo '<li>num: '.$_COOKIE['num'].'</li>
													// <li>id: '.$_COOKIE['id_update'].'</li>
													// ';
								}?>
					
					
					<div class="panel-footer">

					</div>
				</div>
				<a href="index.php" class="btn btn-success btn-lg pull-left" style="float:left; margin: 5px;">Tiếp Tục Mua Hàng</a>
				<a href="checkout.php" class="btn btn-success btn-lg pull-right" style="float:left; margin: 5px;">Checkout</a>				
				<a href="Del_cart.php" class='btn btn-danger btn-lg pull-right' style="float:right; margin: 5px;;">Xóa Tất Cả</a>

			</div>

			<div class="col-md-2"></div>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
	<script src="assets/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
	<script src="main.js"></script>
	<script src="cart.js"></script>	
</body>
<div class="foot"><footer>
<p>CDTH17B</p>
</footer></div>
<style> .foot{text-align: center;}
</style>
</html>
<?php
	include 'func.php';
	 Disconnect($con);
?>