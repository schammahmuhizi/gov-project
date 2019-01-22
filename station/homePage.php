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
  <script type="text/javascript">
    $(document).ready(function(){

      $(".done").click(function(){
        var id = $(this).attr("this");
        if(confirm("This card has been given to the owner ?")){
          $.get("../database.php",{
            done : id
          },
          function(data,status){
            alert(data);
            document.location.reload();
          });
        }
      });
    });
  </script>
</head>
<body>
	<?php require "stationHeader.php"; ?>
	<!-- DataTable -->
	<div class="row">
        <div class="col-md-12">
          <div class="panel panel-default panel-datatable">
            <div class="title-table">
              <span>ID Card</span>
            </div>
            <div class="panel-body">
              <table class="table table-hover" style="background-color: white; border-radius: 10px;" id="sampleTable">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>ID Card Number</th>
                    <th>FullName</th>
                    <th>Created On</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $run = $db->executeQuery("SELECT * FROM card_table WHERE station_id = '$session' AND card_type = 'id' ");
                      if(mysqli_num_rows($run) > 0){
                        $i = 1;
                        while($row = mysqli_fetch_array($run)){
                          $id = $row['card_id'];
                          $number = $row['card_number'];
                          $owner = $row['card_owner'];
                          $created_on = $row['created_on'];
                          echo "<tr>
                                <td>".$i."</td>
                                <td>".$number."</td>
                                <td>".$owner."</td>
                                <td>".$created_on."</td>
                               <td class='button-control'><button class='btn btn-done done' this='".$id."'><i class='fas fa-thumbs-up'></i> Done</button></td>
                                </tr>";
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
	<!-- end of DataTable -->
	<!-- Data table plugin-->
    <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
</body>
</html>