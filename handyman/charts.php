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
        <h1 class="page-header">Charts</h1>
      </div>
    </div>
    
<div class="col-md-10">
  
  <canvas id="myGraph"></canvas>
 
</div>

<div class="col-md-7">
  
  <h2 style="text-align: center;">Distribution of customers in various locations</h2>
  <canvas id="myChart" ></canvas>
 
</div>

</div><!--/.row-->

<script>
$(document).ready(function(){
 

  $.getJSON("chartData.php", function(json){
   
  var labels =json.map(function(item){
    return item.location;
  })
  var values = json.map(function(item){
    return item.num;
  })

    
    console.log(labels);
    console.log(values);


var tempData = {
    datasets: [{
        data: values,
        backgroundColor: [
            "#FF6384",
            "#4BC0C0",
            "#09355C",
            "#FFCE56",
            "#E7E9ED",
            "#36A2EB",
            "#B61B12"
        ],
        label: 'My dataset' // for legend
    }],
    labels: labels
};


var ctx = document.getElementById("myChart");
    
var myChart = new Chart(ctx,{
    type: 'pie',
    data: tempData
    
});

});
});


</script>
<script type="text/javascript">
$(document).ready(function(){
 

  $.getJSON("serviceTally.php", function(json){
   
  var labels =json.map(function(item){
    return item.service_title;
  })
  var values = json.map(function(item){
    return item.num;
  })

    
    console.log(labels);
    console.log(values);


var graphData = {
    datasets: [{
        data: values,

        backgroundColor: [
            
            "#4BC0C0",
            "#09355C",
            "#FFCE56",
            "#B61B12",
            "#E7E9ED",
            "#36A2EB"
        ],
        label: 'Data' // for legend
    }],
    labels: labels
};

 
var ctx = document.getElementById("myGraph").getContext("2d");
    
var myGraph = new Chart(ctx,{
    type: 'bar',
    data: graphData,
    
            
});

});
});

</script>

   </body>
   </html> 