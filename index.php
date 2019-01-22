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
	</style>
</head>
<body>
	<?php require"header.php"; ?>
	<div class="row">
		<div class="col-sm-offset-3 col-sm-6 col-xs-offset-2 col-xs-8 text-box">
			<div class="text-container">
				<span class="head-text">Finding your lost ID Card</span>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-offset-2 col-sm-8 col-xs-12 search-box">
			<div class="control-container">
				<form action="<?php echo htmlspecialchars('results.php');?>" method="get"  >
					<input type="text"  autofocus  name="search_item" class="search_item" placeholder="Card number Or name" required>
					<span><i class="fas fa-search"></i></span>
					<input type="submit" name="go" hidden>
				</form>	
			</div>
		</div>
	</div>

</body>
</html>