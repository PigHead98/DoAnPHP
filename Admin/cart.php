<?php
include 'classdb.php';
	$db = new functionDB();
	$q = "SELECT * FROM `user_info`";
	

	//xoa
	if(isset($_GET['idUser']))
	{
	$db->Del_user($_GET['idUser']);
	}	
			

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>UserInfo</title>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap-3.3.6-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div class="navbar navbar-default navbar-fixed-top" id="topnav">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="#" class="navbar-brand">OnlineShopping</a>
			</div>
			<form  method="get" action="#">
			<ul class="nav navbar-nav">
				<li style="width:300px;left:10px;top:10px;"><input type="text" class="form-control" id="search" name="search">
				</li>
				<li style="top:10px;left:20px;"><button class="btn btn-primary" id="search_btn" name="" type="submit"><span
							class='glyphicon glyphicon-search'></span></button></li>
			</ul>
			</form>

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
					<div class="panel-heading">User Checkout</div>
					<div class="panel-body"></div>
					<div class="row">
						<div class="col-md-2"><b>Action</b></div>
						<div class="col-md-2"><b>Image</b></div>
						<div class="col-md-2"><b>FName</b></div>
						<div class="col-md-2"><b>LName</b></div>
						<div class="col-md-2"><b>Email</b></div>
						<div class="col-md-2"><b>Mobi</b></div>

					</div>
					<br><br>
					<div id='cartdetail'> <!-- tim cach lay value qty san pham-->
								<?php
								if(isset($_GET["search"])){
									$search = "SELECT * FROM `user_info` where 
									                first_name like '%".$_GET['search']."%' or
									                last_name like '%".$_GET['search']."%' or
									                email like '%".$_GET['search']."%' or
									                mobile like '%".$_GET['search']."%' ";													
					            	$db->Search($search);
					            }
					            else
									$db->LayDaTa($q);
								?>
					
					
					<div class="panel-footer">

					</div>
				</div>
				
					
				<a href="Del_cart.php" class='btn btn-danger btn-lg pull-right' style="float:right; margin: 5px;;">Xóa Tất Cả</a>

			</div>

			<div class="col-md-2"></div>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
	<script src="assets/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
	<script src="main.js"></script>
</body>
<div class="foot"><footer>
<p>CDTH17B DAO TRUONG AN</p>
</footer></div>
<style> .foot{text-align: center;}
</style>
</html>
