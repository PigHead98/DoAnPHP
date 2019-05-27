<?php //ketnoi db
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
	<link rel="stylesheet" type="text/css" href="http://kenwheeler.github.io/slick/slick/slick.css" />
	<link rel="stylesheet" type="text/css" href="http://kenwheeler.github.io/slick/slick/slick-theme.css" />
	<link rel="stylesheet" type="text/css" href="assets/bootstrap-3.3.6-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="styles.css">

</head>

<body>


	<?php include"header_index.php";?>

	<!-- Slider ends -->

	<br>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-2">
				<div id="get_cat"></div>
				<div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h4>Categories</h4></a></li>
					<form  method="get" action="#">
							<?php //xuat cat
						include 'GetTitle_cat.php';
						$Categories = GetTitle_cat($con);
						foreach ($Categories as $name => $product_title) {
							echo '<li ><a href="index.php?cat_title='.$product_title['id'].'">&nbsp;&nbsp;&nbsp;'.$product_title['name'].'</a></li>';# code...
						}
					
					?>
				
					</form>
				</div>
				<div id="get_brand"></div>
				<div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h4>Brands</h4></a></li>
					<form  method="get" action="#">
					<?php //xuat brands
						include 'GetTitle_brand.php';
						$brands = GetTitle_brand($con);
						foreach ($brands as $name => $product_title) {
							echo '<li ><a href="index.php?brands='.$product_title['id'].'">&nbsp;&nbsp;&nbsp;'.$product_title['name'].'</a></li>';# code...
						}
					
					?>
					
					</form>
				</div>
				<div id="get_price"></div>
				<div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h4>Price</h4></a></li>
					<form  method="get" action="#">
					<li><input type="radio" name="Gia" value="1">&nbsp;&nbsp;&nbsp;< 1000d</li>
					<li><input type="radio" name="Gia" value="2">&nbsp;&nbsp;&nbsp;1000d - 10000d</li>
					<li><input type="radio" name="Gia" value="3">&nbsp;&nbsp;&nbsp;> 10000d		</li>		
					<li style="top:10px;left:20px;"><button class="btn btn-primary" id="search_btn" name="" type="submit"><span
							class='glyphicon glyphicon-search'></span></button></li>
					</form>								
				</div>
			</div>
		
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-12" id="cartmsg">

					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading text-center">--Featured Products--
						<div class='pull-right'>
							Sort: &nbsp;&nbsp;&nbsp;<a href="#" id='price_sort'>Price</a> | <a href="#"
								id='pop_sort'>Popularity</a>
						</div>
					</div>
					<div class="panel-body"  id="myTable">
						<div id="get_product"></div>
						<div class="col-md-12">

								<?php
								include 'show_body.php';
								?>
							</div>		
						
					<div class="panel-footer">&copy; 2019</div>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<center>
					<ul class='pagination' id='pageno'>

					</ul>
				</center>
			</div>

			<!-- Modal -->

			<div class="modal fade" id="prod_detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
									aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Product Details</h4>
						</div>
						<div class="modal-body" id='dynamic_content'>
							...
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

						</div>
					</div>
				</div>
			</div>

			<!-- Modal ends-->
		</div>
	</div>




	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
	<script src="assets/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
	<script src="main.js"></script>
</body>

<div class="foot">
	<footer>
		<p>CDTH17B DAO TRUONG AN</p>
	</footer>
</div>
<style>
	.foot {
		text-align: center;
	}
</style>

</html>