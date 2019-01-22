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
				<button type="button" class="btn" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus"></i> Add New Station</button>
				<a href="homePage.php"><button type="button" class="btn"><i class="fas fa-list"></i> List of Stations <span class="badge number_station">50</span></button></a>
				<a href="requestPage.php"><button type="button" class="btn"><i class="fas fa-bell"></i> Request <span class="badge number_request">7</span></button></a>
				<a href="settings.php"><button type="button" class="btn"><i class="fas fa-cog"></i> Settings</button></a>
				<button type="button" class="btn" data-toggle="modal" data-target="#AccModal"><i class="fas fa-plus"></i> Add Account for payment</button>
				<a href="../database.php?adminlog=<?php echo 'true'; ?>"><button type="button" class="btn"><i class="fas fa-power-off"></i> Logout</button></a>
			</div>
		</div>
	</div>


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      	<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
         	<h4 class="modal-title">Add New Station</h4>
      	</div>
      	<div class="modal-body">
      		<form method="post">
      			<div class="form-group">
				    <label for="name">Station Name:</label>
				    <input type="text" class="form-control" name="station_name" id="name" autofocus required>
				</div>
      			<div class="form-group">
				    <label for="email">Email address:</label>
				    <input type="email" class="form-control" name="station_email" id="email" required>
				</div>
				<div class="form-group">
				    <label for="pwd">Station Password:</label>
				    <input type="password" class="form-control" name="station_pwd" id="pwd" required>
				</div>
      	</div>
      	<div class="modal-footer">
      		<button type="submit" class="btn" name="add_station" style="background-color: #00A1DE;">Add</button>
        	<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
        	</form>
      	</div>
    </div>
  </div>
</div>

<div id="AccModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      	<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
         	<h4 class="modal-title">Add Account for payment</h4>
      	</div>
      	<div class="modal-body">
      		<form method="post">
      			<div class="form-group">
				    <label for="name">Price to pay:</label>
				    <input type="number" class="form-control" value="<?php echo $price_nb; ?>" name="price" id="price" autofocus required>
				</div>
      			<div class="form-group">
				    <label for="name">Bank Name:</label>
				    <input type="text" class="form-control" value="<?php echo $bank_name; ?>" name="bank_name" id="bank_name" autofocus required>
				</div>
      			<div class="form-group">
				    <label for="name">Account Name:</label>
				    <input type="text" class="form-control" value="<?php echo $account_name; ?>" name="acc_name" id="acc_name" autofocus required>
				</div>
				<div class="form-group">
				    <label for="name">Account Number:</label>
				    <input type="number" class="form-control" value="<?php echo $account_number; ?>" name="acc_number" id="acc_number" autofocus required>
				</div>
      	</div>
      	<div class="modal-footer">
      		<button type="submit" class="btn" name="add_bank" style="background-color: #00A1DE;">Add</button>
        	<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
        	</form>
      	</div>
    </div>
  </div>
</div>