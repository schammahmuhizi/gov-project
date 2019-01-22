<div class="row" >
		<div class="col-sm-12 header-box" style="background-color: yellow;">
			<div class="logo">
				<img src="../img/rwanda.jpg">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12 second-header">
			<div class="btn-block">
				<button type="button" class="btn" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus"></i> Add New Lost ID Card</button>
				<button type="button" class="btn" data-toggle="modal" data-target="#DriverModal"><i class="fas fa-plus"></i> Add New Lost Driver License</button>
				<a href="homePage.php"><button type="button" class="btn"><i class="fas fa-list"></i> List of Lost ID Card <span class="badge number_card"></span></button></a>
				<a href="driverCard.php"><button type="button" class="btn"><i class="fas fa-list"></i> List of Lost Driver License <span class="badge number_driver"></span></button></a>
				<a href="settings.php"><button type="button" class="btn"><i class="fas fa-cog"></i> Settings</button></a>
				<a href="../database.php?stationlog=<?php echo "true"; ?>"><button type="button" class="btn"><i class="fas fa-power-off"></i> Logout</button></a>
			</div>
		</div>
	</div>


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      	<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
         	<h4 class="modal-title">Add New Lost Id Card</h4>
      	</div>
      	<div class="modal-body">
      		<form method="post" enctype="multipart/form-data">
      			<div class="form-group">
				    <label for="name">Photo of Card :</label>
				    <input type="file" class="form-control" name="card_photo" accept="image/*" required>
				</div>
				<div class="form-group">
				    <label for="name">Id Card Number:</label>
				    <input type="number" class="form-control" name="card_number" autofocus required>
				</div>
      			<div class="form-group">
				    <label for="name">Person Full Name:</label>
				    <input type="text" class="form-control" name="card_name" required>
				</div>
      	</div>
      	<div class="modal-footer">
      		<button type="submit" class="btn" name="addCard_btn" style="background-color: #00A1DE;">Add</button>
        	<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
        	</form>
      	</div>
    </div>
  </div>
</div>

<div id="DriverModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      	<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
         	<h4 class="modal-title">Add New Lost Driver License</h4>
      	</div>
      	<div class="modal-body">
      		<form method="post" enctype="multipart/form-data">
      			<div class="form-group">
				    <label for="name">Photo of Card :</label>
				    <input type="file" class="form-control" name="driver_photo" accept="image/*" required>
				</div>
				<div class="form-group">
				    <label for="name">Driver License Number:</label>
				    <input type="number" class="form-control" name="driver_number" autofocus required>
				</div>
      			<div class="form-group">
				    <label for="name">Person Full Name:</label>
				    <input type="text" class="form-control" name="driver_name" required>
				</div>
      	</div>
      	<div class="modal-footer">
      		<button type="submit" class="btn" name="addDriver_btn" style="background-color: #00A1DE;">Add</button>
        	<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
        	</form>
      	</div>
    </div>
  </div>
</div>