<?php 
	require '../database.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Finding ID Card</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="../ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="../maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../styles/stationstyle.css">
	<script type="text/javascript" src="../js/main.js"></script>
</head>
<body>
	<div class="row">
		<div class="col-sm-offset-4 col-sm-4	 login-box">
			<div class="image-box">
				<img src="../img/rwanda.jpg">
				<img src="../img/police.jpeg">
			</div>
			<form method="post">
				<div class="input-box">
					<span><i class="fas fa-user"></i></span>
					<input type="email" name="station_email" placeholder="your email" required>
				</div>
				<div class="input-box">
					<span><i class="fas fa-lock"></i></span>
					<input type="password" name="station_pwd" placeholder="your password" required>
				</div>
				<div class="button-block" style="text-align: center;">
					<label><i>Only for the police Station</i></label>
					<button type="submit" name="station_login_btn" class="btn btn-block">Login</button>
				</div><br><br>
				<a href="create.php"><button type="button"  class="btn btn-block">Create An account</button></a>
			</form>
		</div>
	</div>
</body>
</html>