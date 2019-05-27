<div class="navbar navbar-default navbar-fixed-top" id="topnav">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="index.php" class="navbar-brand">OnlineShopping</a>
			</div>
			<form  method="get" action="#">
			<ul class="nav navbar-nav">
				<li style="width:300px;left:10px;top:10px;"><input type="text" class="form-control" id="search" name="search">
				</li>
				<li style="top:10px;left:20px;"><button class="btn btn-primary" id="search_btn" name="" type="submit"><span
							class='glyphicon glyphicon-search'></span></button></li>
			</ul>
			</form>
			<ul class="nav navbar-nav navbar-right">
				<li id='shoppingcart'><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
							class="glyphicon glyphicon-shopping-cart"></span>Cart <span class="badge"></span> </a>
					<div class="dropdown-menu" style="width: 500px;">
						<div class="panel panel-success">
							<div class="panel-heading">
								<div class="row">
									<!-- <div class="col-md-3">S. No.</div> -->
									<div class="col-md-3">Product Image</div>
									<div class="col-md-3">Product Name</div>
									<div class="col-md-3">Product Price</div>									
									<div class="col-md-3" >Product qty</div>
								</div>
							</div>
							<div class="panel-body">
								<?php
								if (isset($_COOKIE['tr_id'])) {
									include 'show_shopping_cart.php';
								$customer_order = Show_shopping_cart($_COOKIE['tr_id'],$con);
								foreach ($customer_order as $id => $value) {
									$img = Show_shopping_img($value['p_id'],$con);
									 echo '<div class="row"  style="text-align: center">
									 	<div class="col-md-3">
									 	<img style="width:50px" src="assets/prod_images/'.$img.'">
									 	</div>
										<div class="col-md-3">'.$value['name'].'</div>
										<div class="col-md-3">'.$value['price'].'</div>
										<div class="col-md-3">'.$value['qty'].'</div>
										</div>';
								}
								}
								
								// $i = 0;
								// foreach ($_SESSION as $id => $item)

								// 		if (isset($_GET['id'])&&isset($_SESSION[$_GET['id']])) {
								// 		echo '<div class="col-md-3">'.$i++.'</div>
								// 		<div class="col-md-3">
								// 		<img style="width:50px" src="assets/prod_images/'.$row["product_image"].'">
								// 		</div>
								// 		<div class="col-md-3">'.$item['name'].'</div>
								// 		<div class="col-md-3">'.$item['price'].'</div>';# code...	# code...
								// 		}
						
								?>	
								
								
									
							</div>
							<div class="panel-footer" style="height: 40px">
								<a href="cart.php" class="btn btn-success btn-xs" style="float:left;">Xem Giỏ Hàng</a>
								<a href="Del_cart.php" class="btn btn-danger btn-xs" style="float:right;">Xóa Giỏ Hàng</a>								
							</div>
						</div>
					</div>
				</li>
				<?php 
                if (isset($err)) {
                    echo $err.'<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
							class="glyphicon glyphicon-user"></span>Sign In</a>
					<ul class="dropdown-menu">
						<form method="post" action="login_controller.php" style="width: 300px;">
						<div class="panel panel-primary" >
							<div class="panel-heading">Login</div>
							<div class="panel-heading">
								<label for="email">Email</label>
								<input type="email" class="form-control" id="email" name="email_login" placeholder="satyammast@gmail.com">
								<label for="email">Password</label>
								<input type="password" class="form-control" id="password" name="pass_login" placeholder="123">
								<p><br></p>
								<a href="#" style="color: white;list-style-type: none;">Forgot Password?</a>
								<input type="submit" class="btn btn-success" style="float: right;bottom:12px;" id="login" value="Login" name="login" >
							</div>
							<div class="panel-footer" id="e_msg"></div>
						</div>
					</form>
					</ul>

				<li><a href="login/index.php">Sign Up</a></li>';
                }				
                else if(isset($_COOKIE['status'])) echo "Xin chao ".$_COOKIE['name']." ".$_COOKIE['status'];
                else{
                	echo '<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
							class="glyphicon glyphicon-user"></span>Sign In</a>
					<ul class="dropdown-menu">
						<form method="post" action="login_controller.php" style="width: 300px;">
						<div class="panel panel-primary" >
							<div class="panel-heading">Login</div>
							<div class="panel-heading">
								<label for="email">Email</label>
								<input type="email" class="form-control" id="email" name="email_login" placeholder="satyammast@gmail.com">
								<label for="email">Password</label>
								<input type="password" class="form-control" id="password" name="pass_login" placeholder="123">
								<p><br></p>
								<a href="#" style="color: white;list-style-type: none;">Forgot Password?</a>
								<input type="submit" class="btn btn-success" style="float: right;bottom:12px;" id="login" value="Login" name="login" >
							</div>
							<div class="panel-footer" id="e_msg"></div>
						</div>
					</form>
					</ul>

				<li><a href="login/index.php">Sign Up</a></li>';}
                ?>
			</ul>
		</div>
	</div>
	<br><br><br>
                
				
	<!-- Slider Begins -->

	<div class="one-time">
		<div><img src="assets/images/car1.jpg"></div>
		<div><img src="assets/images/car2.jpg"></div>
		<div><img src="assets/images/car3.jpg"></div>
	</div>