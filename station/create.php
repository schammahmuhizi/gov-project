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
				<img src="../img/rwanda.png">
				<img src="../img/police.jpeg">
			</div>
			<div class="contact-box">After Completing the form, Contact the admin <?php echo $number; ?></div>
			<form method="post">
				<div class="input-box">
					<span><i class="fas fa-user"></i></span>
					<input type="text" name="create_name" placeholder="Station Name" required>
					<label>*The name of the police Station</label>
				</div>
				<div class="input-box">
					<span><i class="fas fa-user"></i></span>
					<input type="email" name="create_email" placeholder="New Email" required>
				</div>
				<div class="input-box">
					<span><i class="fas fa-lock"></i></span>
					<input type="password" name="create_pwd1" placeholder="New password" required>
				</div>
				<div class="input-box">
					<span><i class="fas fa-lock"></i></span>
					<input type="password" name="create_pwd2" placeholder="Re-enter your new password" required>
				</div>
				<div class="input-box">
					<span><i class="fas fa-key"></i></span>
					<input type="text" name="create_keycode" placeholder="Keycode" required>
					<label>*Keycode is used to help the administrator to recognise you</label>
				</div>
				<div class="button-block" style="text-align: center;">
					<button type="submit" name="create_btn" class="btn btn-block">Sign Up</button>
				</div><br><br>
				<a href="login.php"><button type="button" class="btn btn-block">I have an account</button></a>
			</form>
		</div>
	</div>
</body>
</html>