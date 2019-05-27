<?php 
       include "func.php";

        if(login($_POST["email_login"],$_POST["pass_login"]) == 1)
        { 
            setcookie("status","da dang nhap",time()+3600);
            
        echo 

            ' <h3>'.$_SESSION['login']['email'] .'<br> '.$_SESSION['login']['password'].'</h3>
            <a href = "logout_controller.php">logout</a>';

           
                echo'
                                <form method="post" action="edit.php">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="f_name">First name:</label><br>
                                            <input type="text" id="f_name" name="f_name" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="f_name">Last Name:</label><br>
                                            <input type="text" id="l_name" name="l_name" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="email">Email:</label><br>
                                            <input type="text" id="email" name="email" class="form-control" value ='.$_SESSION['login']['email'] .' >
                                        </div>
                                        <div class="col-md-6">
                                            <label for="password">Password: </label><br>
                                            <input type="text" id="password" name="password" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="mobile">Mobile:</label><br>
                                            <input type="text" id="mobile" name="mobile" class="form-control">
                                        </div>
                                        <div class="col-md-6"></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="address1">Address #1:</label><br>
                                            <input type="textarea" id="address1" name="address1" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="address2">Address #2:</label><br>
                                            <input type="textarea" id="address2" name="address2" class="form-control">
                                        </div>
                                    </div>

                                    <br><br>
                                    <div class="col-md-12">
                                        <input type="submit" class="btn btn-primary" value="Edit" name="Edit" id="edit_btn">
                                    </div>

                            </div>
                        </div>
                        </form>
                       
            ';
             
        }            
	    else {
            $err = "mat khau hoac tai khoan khong dung, vui long kiem tra lai";
            require('index.php');   
	           }
	
	?>