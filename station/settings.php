<?php
  require '../database.php';
  if(!isset($_SESSION['station']) OR $_SESSION['status'] != '1'){
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
	<?php require "stationHeader.php"; ?>
	<!-- DataTable -->
  <div class="row">
    <div class="col-sm-offset-4 col-sm-4">
      <div class="panel panel-default panel-table">
        <div class="panel-body">
          <form method="post">
            <div class="form-group">
              <label for="name">Station Name:</label>
              <input type="text" class="form-control" name="stationName" id="stationName" value="<?php echo $myStationName; ?>" placeholder="Station Name" required>
            </div>
            <div class="form-group">
              <label for="email">Email address:</label>
              <input type="email" class="form-control" name="stationEmail" value="<?php echo $myStationEmail; ?>" id="email" placeholder="Station Email" required>
            </div>
            <div class="form-group">
              <label for="pwd">New Password:</label>
              <input type="password" class="form-control" name="stationpwd1" id="pwd" required>
            </div>
            <div class="form-group">
              <label for="pwd">Re-enter New Password:</label>
              <input type="password" class="form-control" name="stationpwd2" id="pwd" required>
            </div>
            <div class="form-group">
              <button type="submit" class="btn" name="save_station_profile" style="background-color: #00A1DE;"><i class="fas fa-save"></i> Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</body>
</html>