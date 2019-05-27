<?php

	function login($email, $pwd)
	{
		$host = 'localhost';
		$username = 'root';
		$pass =  '';
		$db = 'onlineshopping';

		$conn = mysqli_connect($host,$username,$pass);
		mysqli_select_db($conn,$db);
		if(!$conn)
			die("k the ket noi").mysqli_connect_error();
		$email = mysqli_real_escape_string($conn,$email);
		$sql = "select * from user_info where email = '".$email."' and password ='".$pwd."'";
		$run_query = mysqli_query($conn,$sql);
		if(mysqli_num_rows($run_query)==1)
		{	

			$row=mysqli_fetch_array($run_query);//tách dòng
			$_SESSION['login']['status']="da dang nhap";
			$_SESSION['login']['email']=$row['email'];
			$_SESSION['login']['password']=$row['password'];
			mysqli_close($conn);
			return 1;
		}
		else{
		mysqli_close($conn);
		return 0;}
	}
	function logout(){
		session_start();
		session_destroy();
		setcookie("status","",time()-3600);
		require('index.php');	
	}
	function showInfo($email)
	{
		$user_info =array();
		
				$user_info = array('fname' => $row['first_name'],
													'lname' => $row['last_name'],
													'email' => $row['email'],
													'password' => $row['password'],
													'mobile' => $row['mobile'],
													'Address1' => $row['Address1'],
													'Address2' => $row['Address2'],
												);
			
			return $user_info;
	}
	//echo login("satyammast@gmail.com","3814d460c26c2dbab2d80294d2cc9882");
?>