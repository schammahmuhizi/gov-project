<?php 
	
	session_start();	
	require 'class.php';
	$db = new database('localhost','root','','police_project');
	if(isset($_POST['admin_login_btn'])){
		$userinfo['admin_email'] = $db->string($_POST['admin_email']);
		$userinfo['admin_pwd'] = $db->string($_POST['admin_pwd']);
		$db->login($userinfo);
	}

	if(isset($_POST['add_station'])){

		$station_name = $_POST['station_name'];
		$station_email = $_POST['station_email'];
		$station_pwd = $_POST['station_pwd'];
		if($db->executeQuery("INSERT INTO station_table VALUES('','$station_name','$station_email','$station_pwd','1') ")){
			echo "<script>alert('New Station Added!')</script>";
		}
	}


	if(isset($_GET['fetchStation'])){
		echo "<script>alert('Ok')</script>";
	}
	else{
		echo "<script>alert('Null')</script>";
	}
?>