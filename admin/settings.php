<?php
  require '../database.php';
  if(!isset($_SESSION['admin'])){
    header("location:login.php");
  }
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
	<link rel="stylesheet" type="text/css" href="../styles/DataTable.css">
  <script type="text/javascript" src="../js/main.js"></script>
</head>
<body>
	<?php require "adminHeader.php"; ?>
	<!-- DataTable -->
  <div class="row">
    <div class="col-sm-offset-4 col-sm-4">
      <div class="panel panel-default panel-table">
        <div class="panel-body">
          <form method="post" id="setting-form">
            <div class="form-group">
              <label for="email">Email address:</label>
              <input type="email" name="myemail" class="form-control" value="<?php echo $myemail ?>" id="myemail" required>
            </div>
            <div class="form-group">
              <label for="email">Contact:</label>
              <input type="tel" name="mytel" class="form-control" value="<?php echo $mytel ?>" id="mytel" required>
            </div>
            <div class="form-group">
              <label for="pwd">New Password:</label>
              <input type="password" name="pwd1" class="form-control" id="pwd1" required>
            </div>
            <div class="form-group">
              <label for="pwd">Re-enter New Password:</label>
              <input type="password" name="pwd2" class="form-control" id="pwd2" required>
            </div>
            <div class="form-group">
              <button type="submit" name="save-setting" class="btn" style="background-color: #00A1DE;"><i class="fas fa-save"></i> Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</body>
</html>