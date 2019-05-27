<?php
class functionDB
{
	private $dsn = 'mysql:host=localhost;dbname=onlineshopping';
	private $username = 'root';
	private $pass = '';
	private $db;
	private $options = array(
								PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
								PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION	
							);

	public function __construct()//$dsn,$username,$pass
    {
        // $this->dsn = $dsn;
        // $this->username = $username;
        // $this->pass = $pass;
        $this->db = new PDO($this->dsn,$this->username,$this->pass,$this->options);

    }

    public function LayDaTa($q)
    {
		$result = $this->db->query($q);
		$rs ='<div id="cartdetail">';
		foreach ($result as $key => $user) {

			 $rs.= '
					<div class="row">
					<div class="col-md-2"><a href="cart.php?idUser='.$user["user_id"].'" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
					<a href="Update.php" class="btn btn-success"><span class="glyphicon glyphicon-ok-sign"></span></a>
					</div>
					<div class="col-md-2"><img src="assets/prod_images/'.$user["user_id"].'" width="60px" height="60px"></div>
					<div class="col-md-2">'.$user['first_name'].'</div>
					<div class="col-md-2">'.$user['last_name'].'</div>
					<div class="col-md-2"><input class="form-control" type="text" size="10px" name="qty" 
					value="'.$user['email'].'"></div>
					<div class="col-md-2"><input class="form-control" type="text" size="10px" 
					value="'.$user['mobile'].'"></div>
					</div>
				';
		} 
		$rs.='</div>';
							
							echo $rs;
    }

	public function Del_user($id)
	{
		$result = $this->db->prepare('DELETE FROM `user_info` WHERE user_id = '.$id);
		$result->execute();
	}

	public function Search($q)
	{
		$result = $this->db->query($q);
		$rs ='<div id="cartdetail">';
		foreach ($result as $key => $user) {

			 $rs.= '
					<div class="row">
					<div class="col-md-2"><a href="cart.php?idUser='.$user["user_id"].'" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
					<a href="Update.php" class="btn btn-success"><span class="glyphicon glyphicon-ok-sign"></span></a>
					</div>
					<div class="col-md-2"><img src="assets/prod_images/'.$user["user_id"].'" width="60px" height="60px"></div>
					<div class="col-md-2">'.$user['first_name'].'</div>
					<div class="col-md-2">'.$user['last_name'].'</div>
					<div class="col-md-2"><input class="form-control" type="text" size="10px" name="qty" 
					value="'.$user['email'].'"></div>
					<div class="col-md-2"><input class="form-control" type="text" size="10px" 
					value="'.$user['mobile'].'"></div>
					</div>
				';
		} 
		$rs.='</div>';
							
							echo $rs;
	}
}
?>