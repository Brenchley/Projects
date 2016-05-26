
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
      <title>Handyman</title>
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/custom.css" rel="stylesheet">
        <script type="text/javascript" src="js/main.js"></script>
        <script type="text/javascript" src="js/bootstrap-table.js"></script>

        
</head>

<body>
  <div class="navbar navbar-inverse navbar-fixed-top" role="navigation"> 
  </div>

  <div class="col-xs-12 col-md-2 sidebar">
    <ul class="nav nav-pills nav-stacked">
      <li ><a href="dashboard.php"class="glyph stroked dashboard-dial">Dashboard</a></li>
      <li class="active"><a href="#"class="glyph stroked calendar">Orders</a></li>
      <li><a href="charts.php" class="glyph stroked line-graph"> Charts</a></li>
      <li><a href="tables.php" class="glyph stroked table"> Tables</a></li>
      <li><a href="admin.php" class="glyph stroked pencil">Forms</a></li>
     
    </ul>
  
</div><!--side bar-->
<div class="col-xs-12 col-md-10">
    <div class="row">
      <div class="col-xs-12 col-md-12">
        <h1 class="page-header">Orders</h1>
      </div>
    </div><!--/.row-->

    <div class="row">
      <div class="col-xs-12 col-md-11">
        <div class="panel panel-default">
          <div class="panel-heading">All Orders</div>
          <div class="panel-body">
            <table data-toggle="table" data-url="table_inf.php"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                <thead>
                <tr>
                    <th data-field="order_id " data-checkbox="true" >Order ID</th>
                    <th data-field="order_id" data-sortable="true">Order ID</th>
                    <th data-field="first_name" data-sortable="true">Customer</th>
                    <th data-field="last_name"  data-sortable="true">Name</th>
                    <th data-field="is_active" data-sortable="true">Status</th>
                    <th data-field="order_date" data-sortable="true">Date added</th>
                </tr>

                </thead>
            </table>
          </div>
        </div>
      </div>