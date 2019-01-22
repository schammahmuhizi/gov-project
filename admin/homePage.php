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
  <script type="text/javascript">
    $(document).ready(function(){
      $(".delete").click(function(){
        var dltitem = $(this).attr("this");
        if(confirm("Are you sure to delete this Station ?")){

          $.get("../database.php",
          {
            dltstation: dltitem,
          },
          function(data,status){
            alert("Station deleted");
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
        <div class="col-md-12">
          <div class="panel panel-default panel-datatable">
            <div class="panel-body">
              <table class="table table-hover" style="background-color: white; border-radius: 10px;" id="sampleTable">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Station Name</th>
                    <th>Email</th>
                    <th>Start date</th>
                    <th>Lock/Unlock</th>
                    <th>Delete Station</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $run = $db->executeQuery("SELECT * FROM station_table");
                      if(mysqli_num_rows($run) > 0){
                        $i = 1;
                        while($row = mysqli_fetch_array($run)){
                          $id = $row['station_id'];
                          $name = $row['station_name'];
                          $email = $row['station_email'];
                          $start_date = $row['station_start_date'];
                          $status = $row['station_status'];
                          echo "<tr>
                                <td>".$i."</td>
                                <td>".$name."</td>
                                <td>".$email."</td>
                                <td>".$start_date."</td>";
                                if($status == 1){
                                  echo "<td class='button-control'><a href='../database.php?lockStation=".$id."' class='btn btn-lock lock'><i class='fas fa-lock'></i> Lock</a></td>";
                                }
                                else{
                                  echo "<td class='button-control'><a href='../database.php?lockStation=".$id."' class='btn btn-lock lock'><i class='fas fa-unlock'></i> Unlock</a></td>"; 
                                }
                                echo "
                                <td class='button-control'><a this='".$id."' class='btn btn-delete delete' ><i class='fas fa-times'></i> Delete</a></td>
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