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
      <li> <a href="dashboard.php"class="glyph stroked dashboard-dial">Dashboard</a></li>
      <li><a  href="orders.php"class="glyph stroked calendar">Orders</a></li>
      <li><a href="charts.php" class="glyph stroked line-graph"> Charts</a></li>
      <li><a href="tables.php" class="glyph stroked table"> Tables</a></li>
      <li class="active"><a href="admin.php" class="glyph stroked pencil">Forms</a></li>
    </ul>
  
</div><!--side bar-->
<div class="col-md-10">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Forms</h1>
      </div>
    </div><!--/.row-->
  
    <div class=""></div>

    <!--inserting new staff-->
<div class "alert alert-success">
    <div  class="panel-heading">  
      <p id="simple-msg"></p>
    </div>
  </div>

</div>
  <div class="col-md-3">

  <div class="  panel panel-default">
    <div class="panel-heading">New Staff / Company</div>
    <div class="panel-body">

      <form id="f1" role="form" method="post" class="form-horizontal">
      <div class="form-group col-md-12">
        <label>First  name</label>
        <input class="form-control" name="fname" required>
        
      </div>
      <div class="form-group col-md-12">
        <label>Last Name</label>
        <input class="form-control" name="lname" required>
        
      </div>
      <div class="form-group col-md-12">
        <label>Email</label>
        <input class="form-control" name="email" required>
        
      </div>
      <div class="form-group col-md-12">
        <label>Mobile</label>
        <input class="form-control" name="phone" required>
        
      </div>
      <div class="form-group col-md-12">
        <label>Job title</label>
        <input class="form-control" name="job" required>
        
      </div>
      <div class="form-group col-md-12">
        <button type="submit"   name="insert" class="width-30 pull-right btn btn-sm btn-primary">Submit</button>
        
      </div>
        
      </form>
      
    </div>
    </div>    
   </div><!--end of inserting new staff-->

   <div class="col-md-3">

  <div class="  panel panel-default">
    <div class="panel-heading">New Service</div>
    <div class="panel-body">

      <form id="f2" role="form" method="post"   class="form-horizontal">

        <div class="form-group col-md-12">
          <label>Service  name</label>
          <input class="form-control" name="sname" required>
        
      </div>
      <div class="form-group col-md-12">
        <label>Service description</label>
        <textarea class="form-control" name="sdesc" required></textarea>

        
      </div>
      <div class="form-group col-md-12">
        <button type="submit" name="area"   class="width-30 pull-right btn btn-sm btn-primary">Submit</button>
        
      </div>
        
      </form>
      
    </div>
    </div>    
  </div>

   <div class="col-md-3">

  <div class="  panel panel-default">
    <div class="panel-heading">New location</div>
    <div class="panel-body">

      <form id="f3" role="form" method="post"   class="form-horizontal">

        <div class="form-group col-md-12">
          <label>City  name</label>
          <input class="form-control" name="cname" required>
        
      </div>
      <div class="form-group col-md-12">
        <label>Location</label>
        <input class="form-control" name="location" required>
        
      </div>
      <div class="form-group col-md-12">
        <button type="submit" name="area" class="width-30 pull-right btn btn-sm btn-primary">Submit</button>
        
      </div>
        
      </form>
      
    </div>
    </div>    
   </div>
   </div>
   <script type="text/javascript">
   $(document).on('submit','#f1',function(event){
      submit_form('f1',event);
    })
   $(document).on('submit','#f2',function(event){
      submit_form('f2',event);
    })
    $(document).on('submit','#f3',function(event){
      submit_form('f3',event);
    })
    function submit_form(Form_Id,e){
      e.preventDefault();
      var formDetails = $('#'+Form_Id).serialize(); 
      console.log(e );
      console.log(formDetails);
      $.ajax({
        type:"POST",
        url:'forms.php',
        data:formDetails,
        success:function(){
          var inputs = $('#'+Form_Id+' input');
          console.log(inputs);
          for (var i = 0; i < inputs.length; i++) {
            inputs[i].value = "";
            var html = "Message sent successfully";

          $('#simple-msg').html(html).hide(2250).show();
          
          
            
          
          }
        }
      }) 

    }
   </script>
  
 </body>
  </html>
  
 