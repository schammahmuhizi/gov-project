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
	<link rel="stylesheet" type="text/css" href="../styles/mainstyle.css">
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
					<input type="email" name="admin_email" placeholder="your email" autofocus="" required>
				</div>
				<div class="input-box">
					<span><i class="fas fa-lock"></i></span>
					<input type="password" name="admin_pwd" placeholder="your password" required>
				</div>
				<div class="button-block" style="text-align: center;">
					<label><i>Only for the super admin</i></label>
					<button type="submit" name="admin_login_btn" class="btn btn-block">Login</button>
				</div>
			</form>
		</div>
	</div>
</body>
</html>