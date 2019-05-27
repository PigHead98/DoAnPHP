
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
                    <div class="panel-heading">Checkout Form</div>
                    <div class="panel-body">
                        <form method="post" action="Update.php?action=1">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="f_name">Name</label>
                                    <input type="text" id="f_name" name="f_name" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="address1">Address #1</label>
                                    <input type="textarea" id="address1" name="address1" class="form-control">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="email">Email</label>
                                    <input type="text" id="email" name="email" class="form-control">
                                </div>
                               <div class="col-md-6">
                                    <label for="mobile">Mobile</label>
                                    <input type="text" id="mobile" name="mobile" class="form-control">
                                </div>
                            </div>

                            

                            

                            <br><br>
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-primary" value="Thanh toán" name="thanhtoan" id="thanhtoan_btn">
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