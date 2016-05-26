
   <?php
    include 'connect.php';

    $sql = "SELECT * FROM `request` as r 
      INNER JOIN
          `customer` as c 
          ON c.id = r.customer_id 
          INNER JOIN `request_status` as a  
       ON r.request_status_id = a.rid WHERE a.rid = 1";
    $result = mysqli_query($conn, $sql) or die (mysqli_error($conn));

/*script to get no of pending orders */
    $sql1 = "SELECT COUNT(*) FROM request WHERE `request_status_id` = 1";
    $rs =mysqli_query($conn, $sql1) or die(mysqli_error($conn));
    $result1 = mysqli_fetch_array($rs);

/*script to get total number of customers*/

  $sql2 = "SELECT COUNT(*) FROM `customer`";
  $cus = mysqli_query($conn, $sql) or die (mysqli_error($conn));
  $totalCustomers = mysqli_fetch_array($cus);

/*  script to get total  orders*/

$sql3 = "SELECT COUNT(*) FROM `request`";
$ord = mysqli_query($conn,$sql3) or die(mysqli_error($conn));
$totalOrders = mysqli_fetch_array($ord);
    /*script to show active workers*/
    $sqls = "SELECT * FROM `staff` as s 
          INNER JOIN 
          `request` as r 
          ON s.id = r.worker
           WHERE work_status = 1";

    $results = mysqli_query($conn, $sqls) or die(mysqli_error());
/*  script to show number of comment*/
$sqlc = "SELECT COUNT(*) FROM `comments`";
$tcom = mysqli_query($conn, $sqlc) or die(mysqli_error($conn));
$totalComments = mysqli_fetch_array($tcom);
/*script to free worker from duty*/
    if(isset($_POST['free'])){
      $_POST['free'];

      foreach($_POST as $key => $select){
        if($key == 'select'){
          
          $sql = "UPDATE `staff`,`request`
                SET
                  staff.work_status = 2,
                  request.request_status_id = 2
                WHERE
                 staff.id = request.worker
                AND request.worker= $select";
            
            if(mysqli_query($conn,$sql)){
              
            }
            else{
              echo"Error: " .$sql. "<br>".mysqli_error($conn);

            } 
          }
      }
    }
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

  <div class="col-xs-12 col-md-2 sidebar">
    <ul class="nav nav-pills nav-stacked">
      <li class="active"><a href="dashboard.php"class="glyph stroked dashboard-dial">Dashboard</a></li>
      <li><a href="orders.php"class="glyph stroked calendar">Orders</a></li>
      <li><a href="charts.php" class="glyph stroked line-graph"> Charts</a></li>
      <li><a href="tables.php" class="glyph stroked table"> Tables</a></li>
      <li><a href="admin.php" class="glyph stroked pencil">Forms</a></li>
     
    </ul>
  
</div><!--side bar-->
<div class="col-xs-12 col-md-10">
    <div class="row">
      <div class="col-xs-12 col-md-12">
        <h1 class="page-header">Dashboard</h1>
      </div>
    </div><!--/.row-->

    <div class="row">
  <div class="col-xs-12 col-md-6 col-lg-3">
        <div class="panel panel-gray">
          <div class="row no-padding">
            <div class="col-sm-3 col-lg-5 widget-left">

            </div>
            <div class="col-sm-9 col-lg-7 widget-right">
              <div class="large" style="font-size: 2em"><?php echo $result1[0];  ?></div>
              <div class="text-muted" style="color: #9fadbb;">Pending Orders</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-md-6 col-lg-3">
        <div class="panel panel-gray">
          <div class="row no-padding">
            <div class="col-sm-3 col-lg-5 widget-left">
              
            </div>
            <div class="col-sm-9 col-lg-7 widget-right">
              <div class="large" style="font-size: 2em"><?php echo $totalCustomers[0];  ?></div>
              <div class="text-muted" style="color: #9fadbb;">Total Customers</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-md-6 col-lg-3">
        <div class="panel panel-gray">
          <div class="row no-padding">
            <div class="col-sm-3 col-lg-5 widget-left">
              
            </div>
            <div class="col-sm-9 col-lg-7 widget-right">
              <div class="large" style="font-size: 2em"><?php echo $totalOrders[0];  ?></div>
              <div class="text-muted" style="color: #9fadbb;">Total Orders</div>
            </div>
          </div>
        </div>
      </div>
  <div class="col-xs-12 col-md-6 col-lg-3">
        <div class="panel panel-gray">
          <div class="row no-padding">
            <div class="col-sm-3 col-lg-5 widget-left">

            </div>
            <a href="comments.php">
            <div class="col-sm-9 col-lg-7 widget-right">
              <div class="large" style="font-size: 2em"><?php echo $totalComments[0]; ?></div>
              <div class="text-muted" style="color: #9fadbb;">Comments</div>
            </div>
            </a>
          </div>
        </div>
      </div>
      </div>
<!-- <div class="col-md-2">
      <div class="  panel panel-default">
    <div class="panel-heading">Recent Activites</div>

    <div class="panel-body">


    </div>
    </div>    
</div> -->
<div class="col-xs-12 col-md-3">
      <div class=" panel panel-default">
    <div class="panel-heading">Active Workers / Company</div>
    <div class="panel-body">
    <div class="table-responsive">
    <form method="post">
      <div class="table">
        <table class="table">

          <tr>
            <th>Worker</th>
            <th>Select</th>
          </tr>
        <?php  
          if(mysqli_num_rows($results) > 0){
            while($row = mysqli_fetch_assoc($results)){    
              $fname = $row['first_name'];
              $lname =$row['last_name'];
              $oid = $row['id'];

              echo "<tr >";
              echo "<td>".$fname." ".$lname."</td>";
              echo "<td><input value=".$oid." name='select' type='checkbox'></td>";
              echo "</tr>";
            
          }
        }

        ?>
            
         
        </table>
        </div>
        <div class="col-xs-12 col-md-12">
        <button type="submit"   name="free" class="width-30 pull-right btn btn-sm btn-primary">Not_active</button></div>
        </form>
      </div>
    </div>
    </div>
    </div>    
   

   <div class="col-xs-12 col-md-7">
      <div class="  panel panel-default">
    <div class="panel-heading">Latest Orders</div>
    <div class="panel-body">
    <div class="table-responsive">
      <table class="table" >
      <tr>
        <th>Order id</th>
        <th>Customer</th>
        <th>Service</th>
        <th>Status</th>
        <th>Date Orderd</th>
        <th>City</th>
        <th>Action</th>
      </tr>

    <!-- displaying order details -->

      <?php
  
      if(mysqli_num_rows($result) > 0){

      while($row = mysqli_fetch_assoc($result)){
    $orderid = $row['order_id'];
    $name = $row['first_name'];
    $customer =  $row['last_name'];
    $service = $row['service_id'];
    $date = $row['order_date'];
    $status = $row['is_active'];
    $city = $row['city_id'];
      echo "<tr>";
        echo"<td>".$orderid."</td>";
        echo"<td>".$customer." ".$name."</td>";
        echo"<td>".$service."</td>";
        echo"<td>".$status."</td>";
        echo"<td>"; echo date("Y/m/d H:i:s", strtotime($date));echo"</td>";
        echo"<td>".$city."</td>";
        echo"<td><a href='order_inf.php?order=".$row['order_id']."' class='btn btn-default glyphicon glyphicon-eye-open' name='view_order' ></a></td>";
      echo "</tr>";   
        
      }
    }
  ?>
        
        
      </table>
    </div>


    </div>
    </div>    
   </div>
   </div>
</body>

</html>

           
          
            

          