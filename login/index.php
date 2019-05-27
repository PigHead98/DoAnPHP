
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Amaclone</title>
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-3.3.6-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <div class="navbar navbar-default navbar-fixed-top" id="topnav">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="index.php" class="navbar-brand">Online Shopping</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
				<li id='shoppingcart'><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>Cart <span class="badge">0</span>	</a>
					<div class="dropdown-menu" style="width: 400px;">
						<div class="panel panel-success">
							<div class="panel-heading">
								<div class="row">
									<div class="col-md-3">S. No.</div>
									<div class="col-md-3">Product Image</div>
									<div class="col-md-3">Product Name</div>
									<div class="col-md-3">Price in $</div>
								</div>
							</div>
							<div class="panel-body"></div>
							<div class="panel-footer"></div>
						</div>
					</div>
				</li>
                <?php 
                if(isset($_COOKIE['status'])) echo $_COOKIE['status'];

                ?>
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>Sign In</a>
					<ul class="dropdown-menu">
					<form method="post" action="login_controller.php" style="width: 300px;">
						<div class="panel panel-primary" >
							<div class="panel-heading">Login</div>
							<div class="panel-heading">
								<label for="email">Email</label>
								<input type="email" class="form-control" id="email" name="email_login">
								<label for="email">Password</label>
								<input type="password" class="form-control" id="password" name="pass_login">
								<p><br></p>
								<a href="#" style="color: white;list-style-type: none;">Forgot Password?</a>
								<input type="submit" class="btn btn-success" style="float: right;bottom:12px;" id="login" value="Login" name="login" >
							</div>
							<div class="panel-footer" id="e_msg"></div>
						</div>
					</form>
				</ul>
                </li>
				<li><a href="register_view.php">Sign Up</a></li>
			</ul>

        </div>
    </div>
    <p><br><br></p>
    <p><br><br></p> 
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8" id="err_msg">
            	
            <?php 
			if(isset($err))
				echo "<div class='bg-err'><p><b>".$err."</b></p></div>";
			?>
            	
            </div>
            <div class="col-md-2"></div>
        </div>

		
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">Signup Form</div>
                    <div class="panel-body">
                        <form method="post" action="customer_registration.php">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="f_name">First Name</label>
                                    <input type="text" id="f_name" name="f_name" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="f_name">Last Name</label>
                                    <input type="text" id="l_name" name="l_name" class="form-control">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="email">Email</label>
                                    <input type="text" id="email" name="email" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="password">Password</label>
                                    <input type="password" id="password" name="password" class="form-control">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="mobile">Mobile</label>
                                    <input type="text" id="mobile" name="mobile" class="form-control">
                                </div>
                                <div class="col-md-6"></div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label for="address1">Address #1</label>
                                    <input type="textarea" id="address1" name="address1" class="form-control">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label for="address2">Address #2</label>
                                    <input type="textarea" id="address2" name="address2" class="form-control">
                                </div>
                            </div>

                            <br><br>
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-primary" value="Signup" name="signup" id="signup_btn">
                            </div>

                    </div>
                </div>
                </form>
                <div class="panel-footer"></div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
    <script src="assets/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    <script src="main.js"></script>
</body>
<div class="foot">
    <footer>
        <p> Medium Project <a href="https://google.com/">PHP Web Programming</a></p>
        <p><b>Your name</b></p>
        <p> Kmin and Code-project</p>
    </footer>
</div>
<style>
    .bg-err {
        background: pink;
        padding: 5px;
        border-radius: 7px;
        text-align: center;
        margin-bottom: 3px;
        opacity: 0.8;
        color: rgba(0, 0, 0, 0.7);
    }
    .foot {
        text-align: center;
    }
</style>

</html>