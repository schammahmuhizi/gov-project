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
	<link rel="stylesheet" type="text/css" href="../styles/DataTable.css">
  <script type="text/javascript" src="../js/main.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $(".createStation").click(function(){
        var create_item = $(this).attr("this");
        if(confirm("Are you sure to create this Station ?")){

          $.get("../database.php",
          {
            create_station: create_item,
          },
          function(data,status){
            alert(data);
            $.get("../database.php",
            {
              remv_station : create_item,
            },
            function(data,status){
              document.location.reload();
            });
          });
        }
      });

      $(".remove").click(function(){
        var remove_item = $(this).attr("this");
        if(confirm("Are you sure to remove this Station ?")){

          $.get("../database.php",
          {
            remv_station: remove_item,
          },
          function(data,status){
            alert("Station Removed");
            document.location.reload();
          });
        }
      });
    });
  </script>
</head>
<body>
	<?php require "adminHeader.php"; ?>
	<!-- DataTable -->
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-default panel-table">
        <div class="panel-body" style="text-align: center;">
          <p style="font-weight: bolder;
           margin-bottom: 10px;">Requests for the creation of new stations</p>
        <table class="table table-hover table-request">
          <thead>
            <tr>
              <th>No.</th>
              <th>Station Name</th>
              <th>Station Email</th>
              <th>Station Password</th>
              <th>Station Keyword</th>
              <th>Create</th>
              <th>Remove</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $run = $db->executeQuery("SELECT * FROM request_table");
              if($run){
                $i = 1;
                while($data = mysqli_fetch_assoc($run)){
                  $request_id = $data['request_id'];
                  $request_name = $data['request_name'];
                  $request_email = $data['request_email'];
                  $request_pwd = $data['request_pwd'];
                  $request_keycode = $data['request_keycode'];

                  echo "
                    <tr>
                      <td>".$i."</td>
                      <td>".$request_name."</td>
                      <td>".$request_email."</td>
                      <td>".$request_pwd."</td>
                      <td>".$request_keycode."</td>
                      <td><button class='btn btn-lock createStation' this='".$request_id."'><i class='fas fa-lock'></i> Create</button></td>
                      <td><button class='btn btn-delete remove' this='".$request_id."'><i class='fas fa-times'></i> Remove</button></td>
                    </tr>
                  ";
                  $i++;
                }
              }
             ?>
          </tbody>
      </table>
      </div>
      </div>
    </div>
  </div>
</body>
</html>