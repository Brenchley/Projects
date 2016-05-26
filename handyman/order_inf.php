<!--  script to allocate staff-->
  <?php  
    include 'connect.php';
    $order_id=intval($_GET['order']); 
if(isset($_POST['allocate'])){

  $_POST['allocate'];
  foreach ($_POST as $key => $select) {
    
    $sql = "UPDATE `request`
            SET `worker` = $select, `request_status_id` = 3
            WHERE `order_id` = $order_id ";
   
    if(mysqli_query($conn, $sql)){
      
    }
      else{
        
      } 
    $sql1 = "UPDATE `staff` SET `work_status` = 1 WHERE  `id` = $select";
    if(mysqli_query($conn, $sql1)){
        
      }   
  }
}
?>
<!--script showing an order -->
<?php

$sql = "SELECT * FROM `request` as r 
      INNER JOIN
          `customer` as c 
          ON c.id = r.customer_id 
          INNER JOIN `request_status` as a  
       ON r.request_status_id = a.rid 
       INNER JOIN `service_type` as s 
       ON s.id = r.service_id 
        WHERE order_id= $order_id";

$result = mysqli_query($conn, $sql) or die(mysqli_error()); 

if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)){
    $name = $row['first_name'];
    $customer =  $row['last_name'];
    $num = $row['mobile_phone'];
    $email =$row['email'];
    $service =$row['service_title'];
    $s_id =$row['id'];
    $desc = $row['service_desc'];
    $date = $row['preferred_start_date'];
    $city = $row['city_id'];
    $status = $row['is_active'];
   

  }
}


$sql1 = "SELECT * FROM `staff` WHERE job_title_id = $s_id AND work_status = 2";

$result1 = mysqli_query($conn, $sql1) or die(mysqli_error());

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
        
        <style> 


</style>       
</head>

<body>
  <div class="navbar navbar-inverse navbar-fixed-top" role="navigation"> 
  </div>
<div class="col-md-2 sidebar">
    <ul class="nav nav-pills nav-stacked">
      <li><a href="dashboard.php"class="glyph stroked dashboard-dial">Dashboard</a></li>
      <li><a href="#"class="glyph stroked calendar">Orders</a></li>
      <li><a href="charts.html" class="glyph stroked line-graph"> Charts</a></li>
      <li><a href="#" class="glyph stroked table"> Tables</a></li>
      <li><a href="admin.php" class="glyph stroked pencil">Forms</a></li>
    </ul>
  
</div><!--side bar-->
 
<div class="col-md-10" >
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Orders 
        </h1>
      </div>

    </div><!--/.row-->
    <div class="col-md-12"><h3 class="pull-right">
        <div ><a href="#" class='btn btn-default glyphicon glyphicon-print' name="print_order"></a></div>
      </h3>
      </div>


    <div class=" col-md-4">
    <div class="panel panel-default">
        <div class="panel-heading ">Customer detail</div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table">
              <?php 
              echo"<tr><td style='width:1%;'><div class='glyphicon glyphicon-user'></div></td><td>" .$name." ".$customer."</td></tr>";
              echo"<tr><td><div class='glyphicon glyphicon-envelope'></div></td><td>" .$email."</td></tr>";
              echo "<tr><td><div class='glyphicon glyphicon-earphone'></div></td><td>" .$num."</td></tr>"; 
              ?>              
              </table>
            </div>
          </div>
        </div>
        </div>
        <div class="col-md-4"></div>
      <div class=" col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading ">Workers Available / Company</div>
          <div class="panel-body">
            <div class="table-responsive">
            <form method="post">
              <table class="table">
              <tr>
                <th>Name</th>
                <th>Contact</th>
                <th>Select</th>
              </tr>
              <?php 
              if(mysqli_num_rows($result1) > 0){
                while($row = mysqli_fetch_assoc($result1)){
                  $w_fname =$row['first_name'];
                  $w_lname =$row['last_name'];
                  $phone = $row['mobile'];
                  echo "<tr><td>".$w_fname." ".$w_lname."</td>";
                  echo "<td>".$phone."</td>";
                  echo "<td><input value='".$row['id']."' name='select' type ='checkbox'></td><tr>";
                }
               
              }
             ?> 
              </table>
              <div class="col-md-12">
              <button type="submit"   name="allocate" class="width-30 pull-right btn btn-sm btn-primary">Allocate</button></div>
            </form>
            </div>
          </div>
        </div>
        </div>
    <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading"><i class="glyphicon glyphicon-info-sign"></i> Order   (<?php echo"#", $order_id ?>)</div>
        <div class="panel-body">
        
        <div class="table-responsive">
          <table class="table">
            <tr>
                <th>Service</th>
                <th>Description</th>
                <th>Start date</th>
                <th>Start time</th>
                <th>Status</th>
            </tr>
            <tr>
            <?php 
              echo"<td>".$service."</td>";
              echo"<td>".$desc."</td>";
              echo"<td>".$date."</td>";
              echo "<td></td>";
              echo "<td>".$status."</td>";
              ?>
              
            </tr>
          </table>
        </div>
          
      
      </div>

    </div>
</div>
</div>
    </body>
    </html>
   