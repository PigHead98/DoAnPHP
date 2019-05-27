<?php  //signup
	//ma hoa md5
	function Md5_pass($data){
		$data = md5($data);
		return $data;
	}
	
	$pass = Md5_pass($_POST['password']);//ma hoa md5

	if(!preg_match("/^([A-Za-zÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚÝàáâãèéêìíòóôõùúýĂăĐđĨĩŨũƠơƯưẠ-ỹ]){2,6}$/" ,$_POST['f_name'], $matchs))//ten chứa chữ cái Hoa,Thường và 2-6 ký tự
		{
			$err =  $_POST['f_name'].". Tên bạn vừa nhập không đúng định dạng " ;
			require('index.php');
		}
	else if(!preg_match("/^([A-Za-z]){2,6}$/" ,$_POST['l_name'], $matchs))
		{
			$err =  $_POST['l_name'].". Tên bạn vừa nhập không đúng định dạng " ;
			require('index.php');
		}		
	else if(!preg_match("/^([A-Z])([\w_\.!@#$%^&*()]+){9,255}$/" ,$_POST['password'], $matchs))// \w là gồm chữ cái và số
		{
			$err =  "Mật khẩu bạn vừa nhập không đúng định dạng <br> 
			(gồm chữ in hoa, chữ thường, có ít nhất 1 kí tự đặc biệt và ngắn nhất là 6 kí tự) " ;
			require('index.php');
		}
	else if(!preg_match("/^(0){1}([0-9]){9,10}$/" ,$_POST['mobile'], $matchs))// cần 1 số 0 đứng đầu và độ dai hợp lệ 10-11 số
		{
			$err =  "Số điện thoại vừa nhập không đúng định dạng " ;
			require('index.php');
		}
	else if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) //hàm check mail của php
		{
			$err = "Email không hợp lệ";
			require('index.php');	
		}
	else {
		
		$con = mysqli_connect("localhost", "root", "","");
			if (mysqli_connect_errno())
			  {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			  }

			mysqli_query($con,"SET NAME 'utf8'");
			mysqli_select_db($con,"onlineshopping");
			$sql = "INSERT INTO user_info(`first_name`, `last_name`, `email`, `password`, `mobile`, `Address1`, `Address2`)
					VALUES ('$_POST[f_name]', '$_POST[l_name]', '$_POST[email]','$pass', '$_POST[mobile]', '$_POST[address1]', '$_POST[address2]')";

			if (!mysqli_query($con,$sql)) {
				exit ("Error: " . mysqli_error($con));
			}
			else 
			{
				
					echo 
						"Tạo tài khoản thành công <br>
					<div class='row'>
		            <div class='col-md-2'></div>
		            <div class='col-md-8'>
		                <div class='panel panel-primary'>
		                    <div class='panel-heading'>Signup Form</div>
		                    <div class='panel-body'>
		                        <form method='post' action='edit.php'>
		                            <div class='row'>
		                                <div class='col-md-6'>
		                                    <label for='f_name'>First name: $_POST[f_name]</label><br>
		                                    <input type='text' id='f_name' name='f_name' class='form-control'>
		                                </div>
		                                <div class='col-md-6'>
		                                    <label for='f_name'>Last Name: $_POST[l_name]</label><br>
		                                    <input type='text' id='l_name' name='l_name' class='form-control'>
		                                </div>
		                            </div>

		                            <div class='row'>
		                                <div class='col-md-6'>
		                                    <label for='email'>Email: $_POST[email]</label><br>
		                                    <input type='text' id='email' name='email' class='form-control' value =$_POST[email] >
		                                </div>
		                                <div class='col-md-6'>
		                                    <label for='password'>Password: $_POST[password]</label><br>
		                                    <input type='text' id='password' name='password' class='form-control'>
		                                </div>
		                            </div>

		                            <div class='row'>
		                                <div class='col-md-6'>
		                                    <label for='mobile'>Mobile: $_POST[mobile]</label><br>
		                                    <input type='text' id='mobile' name='mobile' class='form-control'>
		                                </div>
		                                <div class='col-md-6'></div>
		                            </div>

		                            <div class='row'>
		                                <div class='col-md-12'>
		                                    <label for='address1'>Address #1: $_POST[address1]</label><br>
		                                    <input type='textarea' id='address1' name='address1' class='form-control'>
		                                </div>
		                            </div>

		                            <div class='row'>
		                                <div class='col-md-12'>
		                                    <label for='address2'>Address #2: $_POST[address2]</label><br>
		                                    <input type='textarea' id='address2' name='address2' class='form-control'>
		                                </div>
		                            </div>

		                            <br><br>
		                            <div class='col-md-12'>
		                                <input type='submit' class='btn btn-primary' value='Edit' name='Edit' id='edit_btn'>
		                            </div>

		                    </div>
		                </div>
		                </form>
		                <div class='panel-footer'></div>
		            </div>
		        </div>
		        <div class='col-md-2'></div>
		    </div>
		    </div>
					"

			;
				
				

			mysqli_close($con);
		}
	}
	
?>