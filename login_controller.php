<?php 
       include "func.php";
        if(login($_POST["email_login"],$_POST["pass_login"]) == 1)
        { 
            setcookie("status",'<a href = "logout_controller.php"> logout</a>',time()+3600);
       redicrect("index.php","./");
        }            
	    else {
            $err = "mat khau hoac tai khoan khong dung, vui long kiem tra lai";
            require('index.php');   
	           }
	
	?>