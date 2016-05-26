<?php
    	include "connect.php";

    	$sql = "SELECT c.first_name,c.last_name , co.comment,co.rating FROM `comments` as co 
    	INNER JOIN 
    	`request` as r 
    	ON co.request_id = r.order_id
    	INNER JOIN
    	`customer` as c
    	ON r.customer_id = c.id
    	INNER JOIN
    	`staff` as s
    	ON r.worker = s.id ORDER BY comment_id DESC";
    	$result = mysqli_query($conn, $sql) or die (mysqli_error($conn));

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
        <script type="text/javascript" src="js/Chart.min.js"></script>

        
</head>

<body>
  <div class="navbar navbar-inverse navbar-fixed-top" role="navigation"> 
  </div>

  <div class="col-md-2 sidebar">
    <ul class="nav nav-pills nav-stacked">
      <li><a href="dashboard.php"class="glyph stroked dashboard-dial">Dashboard</a></li>
      <li><a href="orders.php"class="glyph stroked calendar">Orders</a></li>
      <li class="active"><a href="charts.php" class="glyph stroked line-graph"> Charts</a></li>
      <li><a href="tables.php" class="glyph stroked table"> Tables</a></li>
      <li><a href="admin.php" class="glyph stroked pencil">Forms</a></li>
     
    </ul>
  
</div><!--side bar-->
<div class="col-md-10">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Comments</h1>
      </div>
    </div>
   <div class="col-md-6">
    <div class="panel panel-default comment">
    	<div class="panel-heading">Chats</div>
    	<div class="panel-body">
    	<ul>
    	<?php  
    	if(mysqli_num_rows($result)> 0){
    	while($row = mysqli_fetch_assoc($result)){

    		$fname = $row['first_name'];
    		$lname = $row['last_name'];
    		$com = $row['comment'];
    		$rate = $row['rating'];
    		echo"<div class = 'comment-body'>";
    		echo "<li><div><h4><strong >".$fname." ".$lname."</strong></h4></div>";
    		echo"<h5>".$com."</h5>";
    		echo"<i class='text-muted pull-right'>rating ".$rate."</i></li></div>";


}}

    	?>
    	</ul>	
    	</div>
    </div>
</div>

 </div>