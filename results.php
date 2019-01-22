<?php
	require 'database.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Finding ID Card</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="styles/mainstyle.css">
	<style type="text/css">
		body{
			min-width: 400px;
		}
		.choose-box{
			margin: 0 5%;
		}
	</style>
</head>
<body>
	<?php require"header.php"; ?>

	<div class="row">
		<div class="col-sm-12 col-xs-12 search-box-result">
			<div class="control-container-result">
				<form  method="post">
					<input type="text" class="input-field" autofocus value="" name="search_field"  placeholder="Card number Or name" >
					<button type="submit" class="btn" id="search"  name="search_btn" ><i class="fas fa-search"></i></button>
				</form>
			</div>
		</div>
	</div>	

	

	<div class="row" style="background-color: white;">
		<div class="col-sm-12 result-container">
			<?php
				if(isset($_POST['search_btn']) OR isset($_GET['search_item'])){
					if(isset($_POST['search_field'])){
						$data = $_POST['search_field'];
					}
					else{
						$data = $_GET['search_item'];
					}
					if($run = $db->executeQuery("SELECT *  FROM card_table WHERE card_number LIKE '$data' OR card_owner LIKE '$data' ")){

						if(mysqli_num_rows($run) > 0){
							$g = $db->executeQuery("SELECT COUNT(card_id) as nb FROM card_table WHERE card_number LIKE '$data' OR card_owner LIKE '$data'");
							while($row = mysqli_fetch_assoc($g)){
			?>
										
								<span class='result-found idFound'><span class="found-text">Card found :</span>  <span class='number-cards'><?php echo $row['nb'];?></span></span>
			<?php					
							}
							echo "<div class='result-box'>";
							while($card = mysqli_fetch_assoc($run)){
			?>				
							<div class='item-box'>
			<?php
				if($card['card_type'] == 'id'){
			?>
							<div class="title-box">
								<span class="title-id">Id Card</span>		
							</div>
			<?php		
				} 
				else{
			?>
							<div class="title-box">
								<span class="title-driver">Driver License</span>		
							</div>
			<?php		
				}
			?>					
							
							<div class='image-box'>
								<img src='<?php echo $card['card_photo'];?>'>
							</div>
							<div class='item-content'>
								<label class="idNumber">Id No. :</label> <span><?php echo $card['card_number']; ?></span><br>
								<label class="idNames">Names :</label> <span><?php echo $card['card_owner']; ?></span><br>
			<?php					

								if($st = $db->executeQuery("SELECT station_name FROM station_table WHERE station_id = '".$card['station_id']."' ")){
									while($nm = mysqli_fetch_assoc($st)){
			?>							
									<label class="StationLocated">Station :</label> <span><?php echo $nm['station_name']; ?></span><br>
			<?php						
									}
								}		
			?>
							
								</div>
								</div>
			<?php				
						}
						}

						else{
			?>
							
				<span class='result-found'><span class="found-text">Card found :</span>  <span class='number-cards'>0</span></span>
			<?php	
							}


					}
				}
			?>
		</div>
	</div>

	<!-- Footer -->
	<div class="row" style="padding: 0; width: 100%;">
		<div class="col-xs-12 col-sm-12 footer-box">
			<div class="footer-content">
				<span class="pay-text">Go to the Police Station After paying ...</span>
				<div id="Info" class="info-box">
					<span class='price-text'>Amount to pay :</span> <span class='dt' id='price'><b><?php echo $get_price; ?></b></span>,
					<span class='bank-text'>Bank :</span> <span class='dt' id='bankName'><b><?php echo $get_bank_name;?></b></span>,
					<span class='accName-text'>Account :</span> <span class='dt' id='AccName'><b><?php echo $get_acc_name;?></b></span>,
					<span class='accNumber-text'>Account Number :</span> <span class='dt' id='AccNumber'><b><?php echo $get_acc_number;?></b></span>
				</div>
			</div>
		</div>
	</div>

</body>
</html>