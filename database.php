<?php 
	
	session_start();	
	require 'class.php';
	$db = new database('localhost','root','','police_project');
	if(isset($_POST['admin_login_btn'])){
		$userinfo['admin_email'] = $db->string($_POST['admin_email']);
		$userinfo['admin_pwd'] = $db->string($_POST['admin_pwd']);
		$db->login($userinfo);
	}

	if(isset($_GET['adminlog'])){
		session_destroy();
		header("location:admin/login.php");
	}

	if(isset($_POST['add_station'])){
		$station_name = $_POST['station_name'];
		$station_email = $_POST['station_email'];
		$station_pwd = md5($_POST['station_pwd']);
		if($db->executeQuery("INSERT INTO station_table VALUES('','$station_name','$station_email','$station_pwd',now(),'1') "))
		echo "<script>alert('New Station Added!')</script>";
	}

	if(isset($_POST['add_bank'])){
		$price = $_POST['price'];
		$b_name = $_POST['bank_name'];
		$a_name = $_POST['acc_name'];
		$a_number = $_POST['acc_number'];
		if($db->executeQuery("UPDATE payment_table SET price = '$price', bank_name = '$b_name', account_name = '$a_name', account_number = '$a_number' "))
		echo "<script>alert('Bank of Payment Set!')</script>";
	}


	if(isset($_POST['nb_station'])){
		if($run = $db->executeQuery("SELECT count(station_id) as number FROM station_table")){
			while($row = mysqli_fetch_array($run))
				echo $row['number'];
		}
	}

	if(isset($_POST['nb_request'])){
		if($run = $db->executeQuery("SELECT count(request_id) as number FROM request_table")){
			while($row = mysqli_fetch_array($run))
				echo $row['number'];
		}
	}

	if(isset($_POST['nb_card'])){
		if($run = $db->executeQuery("SELECT count(card_id) as number FROM card_table WHERE card_type = 'id' AND station_id = '".$_SESSION['station']."' ")){
			while($row = mysqli_fetch_array($run))
				echo $row['number'];
		}
	}

	if(isset($_POST['nb_driver'])){
		if($run = $db->executeQuery("SELECT count(card_id) as number FROM card_table WHERE card_type = 'driver' AND station_id = '".$_SESSION['station']."' ")){
			while($row = mysqli_fetch_array($run))
				echo $row['number'];
		}
	}

	if(isset($_GET['lockStation'])){
		$lock = $_GET['lockStation'];
		if($run = $db->executeQuery("SELECT * FROM station_table WHERE station_id = '$lock' ")){
			while($row = mysqli_fetch_assoc($run)){
				if($row['station_status'] == '1'){
					if($db->executeQuery("UPDATE station_table SET station_status = '0' WHERE station_id = '$lock' ")){
						header("location:admin/homepage.php");
					}
				}
				else{
					if($db->executeQuery("UPDATE station_table SET station_status = '1' WHERE station_id = '$lock' ")){
						header("location:admin/homepage.php");
					}
				}
			}
		}
	}

	if(isset($_SESSION['admin'])){
		$session = $_SESSION['admin'];
		if($run = $db->executeQuery("SELECT * FROM admin_table WHERE admin_id = $session ")){
			while($row = mysqli_fetch_assoc($run)){
				$myemail = $row['admin_email'];
				$mytel = $row['admin_tel'];
			}
		}
		if($pay = $db->executeQuery("SELECT * FROM payment_table")){
			while($account = mysqli_fetch_assoc($pay)){
				$price_nb = $account['price'];
				$bank_name = $account['bank_name'];
				$account_name = $account['account_name'];
				$account_number = $account['account_number'];
			}
		}
	}
	if(isset($_SESSION['station'])){
		$session = $_SESSION['station'];
		if($run = $db->executeQuery("SELECT * FROM station_table WHERE station_id = $session ")){
			while($row = mysqli_fetch_assoc($run)){
				$myStationEmail = $row['station_email'];
				$myStationName = $row['station_name'];
			}
		}
	}


	if(isset($_GET['dltstation'])){
		$delete = $_GET['dltstation'];
		if($run = $db->executeQuery("DELETE FROM station_table WHERE station_id = '$delete' ")){
			echo "Station Deleted!!";
		}
	}

	if(isset($_GET['create_station'])){
		$create_station = $_GET['create_station'];
		if($run = $db->executeQuery("SELECT * FROM request_table WHERE request_id = '$create_station' ")){
			while($row = mysqli_fetch_assoc($run)){
				$pwd = md5($row['request_pwd']);
				if($createQuery = $db->executeQuery("INSERT INTO station_table VALUES('','".$row['request_name']."','".$row['request_email']."','$pwd',now(),'1')")){
					echo "Station Created!!";

				}
			}
		}
	}

	if(isset($_GET['remv_station'])){
		$db->executeQuery("DELETE FROM request_table WHERE request_id = '".$_GET['remv_station']."' ");
	}

	if(isset($_POST['save-setting'])){
		$save_email = $_POST['myemail'];
		$save_tel = $_POST['mytel'];
		$save_pwd1 = $_POST['pwd1'];
		$save_pwd2 = $_POST['pwd2'];
		if($save_pwd1 == $save_pwd2){
			$new_pwd = md5($save_pwd1);
			if($db->executeQuery("UPDATE admin_table SET admin_email = '$save_email', admin_tel = '$save_tel', admin_pwd = '$new_pwd' WHERE admin_id = '".$_SESSION['admin']."' ")){
				echo "<script>alert('New Settings Saved! you must reload the page to see new settings.')</script>";
			}
		}
		else{
			echo "<script>alert(' New Passwords entered does not match!');</script>";
		}
	}

	if(isset($_POST['save_station_profile'])){
		$save_name = $_POST['stationName'];
		$save_email = $_POST['stationEmail'];
		$save_spwd1 = $_POST['stationpwd1'];
		$save_spwd2 = $_POST['stationpwd2'];
		if($save_spwd1 == $save_spwd2){
			$new_pwd = md5($save_spwd1);
			if($db->executeQuery("UPDATE station_table SET station_name = '$save_name', station_email = '$save_email', station_pwd = '$new_pwd' WHERE station_id = '".$_SESSION['station']."' ")){
				echo "<script>alert('New Settings Saved! you must reload the page to see new settings.')</script>";
			}
		}
		else{
			echo "<script>alert(' New Passwords entered does not match!');</script>";
		}
	}


	if(isset($_POST['station_login_btn'])){
		$userinfo['station_email'] = $db->string($_POST['station_email']);
		$userinfo['station_pwd'] = $db->string($_POST['station_pwd']);
		$db->login($userinfo);
	}

	if(isset($_GET['stationlog'])){
		session_destroy();
		header("location:station/login.php");
	}

	if($nbQuery = $db->executeQuery("SELECT admin_tel FROM admin_table LIMIT 1")){
		while($row = mysqli_fetch_assoc($nbQuery)){  
			$number = $row['admin_tel'];
		}
	}	
	if(isset($_POST['create_btn'])){
		$station_name = $_POST['create_name'];
		$station_email = $_POST['create_email'];
		$station_pwd1 = $_POST['create_pwd1'];
		$station_pwd2 = $_POST['create_pwd2'];
		$station_keycode = $_POST['create_keycode'];
			
		if($station_pwd1 == $station_pwd2){
		if($run = $db->executeQuery("INSERT INTO request_table VALUES('','$station_name','$station_email','$station_pwd1','$station_keycode')")){

					echo '<script>alert("your request has been sent to the admin. Please Contact the admin."  );</script>';	
		}

		}
		else{
			echo "<script>alert('Passwords does not match!!')</script>";
		}
	}

	function CheckFile($image,$directory,$Filename){
		$file = $directory . $Filename;
		$FileType = pathinfo($file,PATHINFO_EXTENSION);
		$upload = true;
		$check = getimagesize($image['tmp_name']);
		if($check !== false){
			$upload = 1;
		}
		if (file_exists($file)) {
		    echo "<script>alert('Sorry, file already exists.')</script>";
		    $upload = 0;
		}
		if($FileType != "jpg" && $FileType != "png" && $FileType !="jpeg"){
			echo "<script>alert('Sorry, only JPG, JPEG & PNG files are allowed.')</script>";
			$upload = false;
		}
		if(upload == 1){
			return true ;
		}
	}


	if(isset($_POST['addCard_btn'])){
		$card_photo = $_FILES['card_photo'];
		$card_number = $_POST['card_number'];
		$card_name = $_POST['card_name'];

		$extensions = array("jpg","jpeg","png");
		$ext = pathinfo($_FILES['card_photo']['name'],PATHINFO_EXTENSION);
		if(in_array($ext, $extensions)){
			if($card_photo['size'] < 1500000){
				$image_name = md5(rand()) . '.' . $ext;
				define('SITE_ROOT', realpath(dirname(__FILE__)));
				$path = "\photos\/".$image_name;

				if(move_uploaded_file($_FILES['card_photo']['tmp_name'], SITE_ROOT . $path)){
					if($db->executeQuery("INSERT INTO card_table VALUES('','$path','$card_number','$card_name','$session',now())"))
					{
						echo "<script>alert('Lost Card has been added successfully!!')</script>";
					}
					else{
						echo "<script>alert('Something went wrong, redo the operation!!')</script>";
						unlink($path);
					}
				}
			}
			else{
				echo "<script>alert('Sorry, The image has a big size!! Operation failed!.')</script>";
			}
		}
		else{
			echo "<script>alert('Sorry, only JPG, JPEG & PNG files are allowed!! Operation failed!')</script>";
		}
	}

	if(isset($_POST['addDriver_btn'])){
		$driver_photo = $_FILES['driver_photo'];
		$driver_number = $_POST['driver_number'];
		$driver_name = $_POST['driver_name'];

		$extensions = array("jpg","jpeg","png");
		$ext = pathinfo($_FILES['driver_photo']['name'],PATHINFO_EXTENSION);
		if(in_array($ext, $extensions)){
			if($driver_photo['size'] < 1500000){
				$image_name = md5(rand()) . '.' . $ext;
				define('SITE_ROOT', realpath(dirname(__FILE__)));
				$path = "\photos\/".$image_name;

				if(move_uploaded_file($_FILES['driver_photo']['tmp_name'], SITE_ROOT . $path)){
					if($db->executeQuery("INSERT INTO card_table VALUES('','$path','$driver_number','$driver_name','driver','$session',now())"))
					{
						echo "<script>alert('Lost Card has been added successfully!!')</script>";
					}
					else{
						echo "<script>alert('Something went wrong, redo the operation!!')</script>";
						unlink('photos/'.$image_name);
					}
				}
			}
			else{
				echo "<script>alert('Sorry, The image has a big size!! Operation failed!.')</script>";
			}
		}
		else{
			echo "<script>alert('Sorry, only JPG, JPEG & PNG files are allowed!! Operation failed!')</script>";
		}
	}


	if(isset($_GET['done'])){
		if($db->executeQuery("DELETE FROM card_table WHERE card_id = '".$_GET['done']."' ")){
			echo "The Card has been  given!";
		}
	}

	if(isset($_GET['getlanguage'])){
		echo $_SESSION['language'];
	}

	if(isset($_GET['chlanguage'])){
		$_SESSION['language'] = $_GET['chlanguage'];
	}

		if($run = $db->executeQuery("SELECT * FROM payment_table LIMIT 1")){
			while($info = mysqli_fetch_assoc($run)){
				$get_price = $info['price'];
				$get_bank_name = $info['bank_name'];
				$get_acc_name = $info['account_name'];
				$get_acc_number = $info['account_number'];
			}
		}
	

?>