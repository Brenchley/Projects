<?php
include 'connect.php';
$sql= "SELECT * FROM `customer` as c
INNER JOIN 
`city` as a
ON c.city_id = a.id";

$result = mysqli_query($conn,$sql) or die(mysqli_erro());
if(mysqli_num_rows($result)> 0){
  

  ?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
      <title>Handyman</title>
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/custom.css" rel="stylesheet">
        <script type="text/javascript" src="js/main.js"></script>

        
</head>

<body>
  <div class="navbar navbar-inverse navbar-fixed-top" role="navigation"> 
  </div>

  <div class="col-md-2 sidebar">
    <ul class="nav nav-pills nav-stacked">
      <li><a href="dashboard.php"class="glyph stroked dashboard-dial">Dashboard</a></li>
      <li><a href="orders.php"class="glyph stroked calendar">Orders</a></li>
      <li ><a href="charts.php" class="glyph stroked line-graph"> Charts</a></li>
      <li class="active"><a href="tables.php" class="glyph stroked table"> Tables</a></li>
      <li><a href="admin.php" class="glyph stroked pencil">Forms</a></li>
     
    </ul>
  
</div><!--side bar-->
<div class="col-md-10">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Tables</h1>
      </div>
    </div>

<div class="col-md-12">
  <div class="panel panel-default mylTables">
    <div class="panel-heading">All Customers</div>
    <div class="panel-body">
      <div class="table-responsive">
        <table class="table">
          <tr>
            <th>Customers Name</th>
            <th>Phone number</th>
            <th>email</th>
            <th>House area</th>
          </tr>
          <?php
          while($row = mysqli_fetch_assoc($result)){
          $fname = $row['first_name'];
          $lname = $row['last_name'];
          $cemail = $row['email'];
          $cphone = $row['mobile_phone'];
          $ccity = $row['city_name'];
          $carea = $row['location'];

          echo "<tr>";
          echo "<td>".$fname." ".$lname."</td>";
          echo "<td>".$cphone."</td>";
          echo "<td>".$cemail."</td>";
          echo "<td>".$carea." - <small class='text-muted'>".$ccity."</small></td>";

  }

}

    ?>

        </table>
      </div>
    </div>
  </div>
</div>
<?php 

$sql1 ="SELECT * FROM `staff` as s 
INNER JOIN `service_type` as st
ON s.job_title_id = st.id";

$staffResult = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
if(mysqli_num_rows($staffResult) > 0){



 ?>
<div class="col-md-6">
  <div class="panel panel-default mysTable">
    <div class="panel-heading">All Staff</div>
    <div class="panel-body">
      <div class="table-responsive">
        <table class="table mysTable">
          <tr>
            <th>Staff Name</th>
            <th>Phone number</th>
            <th>email</th>
            <th>Work</th>
          </tr>
          <?php
          while($row = mysqli_fetch_assoc($staffResult)){
          $sfname = $row['first_name'];
          $slname = $row['last_name'];
          $semail = $row['email'];
          $sphone = $row['mobile'];
          $swork = $row['service_title'];

          echo "<tr>";
          echo "<td>".$sfname." ".$slname."</td>";
          echo "<td>".$sphone."</td>";
          echo "<td>".$semail."</td>";
          echo "<td>".$swork."</td>";
        }
      }


            ?>
          
        </table>
      </div>
    </div>
  </div>
</div>

<?php
$sql2 = "SELECT * FROM `service_type`";
$serviceResults = mysqli_query($conn,$sql2) or die(mysqli_error($conn));
if(mysqli_num_rows($serviceResults) > 0){

  ?>

<div class="col-md-6">
  <div class="panel panel-default mysTable">
    <div class="panel-heading">All Services</div>
    <div class="panel-body">
      <div class="table-responsive">
        <table class="table ">
          <tr>
            <th>Job Title</th>
            <th>Job Descriptions</th>
          </tr>
          <?php
          while($row = mysqli_fetch_assoc($serviceResults)){

          $service = $row['service_title'];
          $desc = $row['servicedesc'];

          echo "<tr>";
          echo "<td>".$service."</td>";
          echo "<td>".$desc."</td>";
        }
      }
             ?>
        </table>
      </div>
    </div>
  </div>
</div>


  </div>