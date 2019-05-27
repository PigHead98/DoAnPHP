<?php
$con = mysqli_connect("localhost", "root", "","");
			if (mysqli_connect_errno())
			  {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			  }

			mysqli_query($con,"SET NAME 'utf8'");
			mysqli_select_db($con,"doan");
			$i = 1;
			if(isset($_GET["email"])){
			$result = mysqli_query($con,"Select * from thongtin where Email = '".$_GET['email']."'");
			}
			else $result = mysqli_query($con,"Select * from thongtin ");

			echo "Danh sach user";
			while ($row = mysqli_fetch_array($result)) {

					echo '<h2>'.$i.'</h2>
					First Name: '.$row['First Name'].'<br>   
					Last Name: '.$row['Last Name'].'<br>  
					Email: '.$row['Email'].'  <br>
					password: '.$row['Password'].'  <br>
					Mobile: '.$row['Mobile'].'  <br>
					Address1:  '.$row['Address1'].'<br>
					Address2: '.$row['Address2'].'<br>
					';
					$i++;

				}
				echo '<form method="get" action="">
						Email
                                    <input type="text" id="email"name="email">
						<input type="submit" value="search">
					</form>';
// 									$sql = mysqli_query($con,"DELETE from thongtin where Email = '".$row['Email']."'"); 

				mysqli_close($con);

?>