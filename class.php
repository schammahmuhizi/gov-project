<?php 

	class database{

		public $conn = null;
		public function __construct($server,$acc,$pass,$dbname){
			$this->conn=mysqli_connect($server,$acc,$pass,$dbname) or die("Connection failed!!");
		}

		public function login($userinfo){
			if(isset($userinfo['admin_email'])){
				$email = $userinfo['admin_email'];
				$pwd = md5($userinfo['admin_pwd']);
				$q = "SELECT * FROM admin_table WHERE admin_email = '$email' AND admin_pwd = '$pwd' ";
				$run = mysqli_query($this->conn,$q);

				if($run !== false && mysqli_num_rows($run) > 0){

					while($row = mysqli_fetch_assoc($run)){
						$_SESSION['admin'] = $row['admin_id'];
					}
					if(	isset($_SESSION['admin']))
					header("location:homePage.php");
				}
				else{
					echo "<script>alert('Incorrect email or password!! Access Denied!!');</script>";
				}
			}

			if(isset($userinfo['station_email'])){
				$email = $userinfo['station_email'];
				$pwd = md5($userinfo['station_pwd']);
				$q = "SELECT * FROM station_table WHERE station_email = '$email' AND station_pwd = '$pwd' ";
				$run = mysqli_query($this->conn,$q);

				if($run !== false && mysqli_num_rows($run) > 0){

					while($row = mysqli_fetch_assoc($run)){
						if($row['station_status'] == 1){
							$_SESSION['station'] = $row['station_id'];
							$_SESSION['status'] = $row['station_status'];
						}
						else{
							echo "<script>alert('Your account has been locked!! For more information please contact the admin.');</script>";
						}
						
					}
					if(	isset($_SESSION['station']) AND isset($_SESSION['status']))
					header("location:homePage.php");
				}
				else{
					echo "<script>alert('Incorrect email or password!! Access Denied!!');</script>";
				}
			}
		}

		public function executeQuery($query){
			return mysqli_query($this->conn,$query);
		}

		public function string($field){
			return mysqli_real_escape_string($this->conn,$field);
		}

		public function AdminSession($query){
			$run = mysqli_query($this->conn,$query);
			if($run && mysqli_num_rows($run) > 0){
				while($row = mysqli_fetch_assoc($run)){
					$_SESSION['admin'] = $row['admin_id'];
				}
			}
		}

		public function saveCard($data){
			$card_number = $data[''];
			$card_owner = $data[''];
			$card_owner_bday = $data[''];
			$station_id = $data[''];
			$sql = "INSERT INTO card_table VALUES('','$card_number','$card_owner','$card_owner_bday,'$station_id')";
			return mysqli_query();
		}
	}

 ?>