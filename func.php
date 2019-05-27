<?php
	

	function Disconnect($con){
		mysqli_close($con);
	}

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
			$_SESSION['login']['status']=true;
			$_SESSION['login']['email']=$row['email'];
			$_SESSION['login']['password']=$row['password'];
			setcookie("name",$row['frist_name'].$row['last_name'],time()+3600);
			mysqli_close($conn);
			return 1;
		}
		else{
		mysqli_close($conn);
		return 0;}
	}
	function redicrect($filename,$dir="../")
	{
		header("Location: ".$dir.$filename);
		//echo '<meta http-equiv="refresh" content="0;url='.$dir.$filename.'" />';
	}
	function logout(){
		session_start();
		session_destroy();
		setcookie("status","",time()-3600);
		setcookie("name","",time()-3600);		
		redicrect("index.php","./");	
	}
	//echo login("satyammast@gmail.com","3814d460c26c2dbab2d80294d2cc9882");
?>