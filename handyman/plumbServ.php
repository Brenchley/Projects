<?php
error_reporting(0);
session_start();
$cid= $_SESSION['id'];
  ?>

  <?php 
   include 'header.php'
   ?>
  
       <script type="text/javascript" >
          $(function(){
            $('#datepicker').datepicker({
                  format: "yyyy/mm/dd ",
            startDate: "today",
            todayBtn: "linked",
            daysOfWeekDisabled: "0",
            autoclose: true,
            todayHighlight: true

            });
          });
          </script>
        <div class="container" style="margin-top:20px;">
          
          <div class="breadcrumbs" id="breadcrumbs">
            <ul class="breadcrumb ">
              <li>
                <a href="index.php">
                <span class="glyphicon glyphicon-home"></span>
                Home</a>
              </li>
              <li>
                <a href="services.php">
                Services</a>
              </li>
            
              <li class="active ">Plumbing</li>
              </ul>
          </div>

            <div class="page-content ">
            

              <div class="row .container">
                <div class="col-md-12">
  
                  <form id="formq" name="cleaningForm" method="post" class="form-horizontal col-md-offset-6" role="form">
                      <h4 class="header">PLUMBING SERVICE</h4>
                 

                    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right">Book a Suitable Day</label>
                      <div class="col-sm-7 input-group">

                        <input id="datepicker" class="form-control input-small" placeholder="Date"type="date" name="date" required/>
                        <span class="input-group-addon">
                        <span id="datepicker" class="glyphicon glyphicon-calendar">
                        
                        </span>
                      </div> 
                    </div>

                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right">Slite description of the job</label>
                      <div class="col-sm-7 input-group">

                        <textarea name="sdesc" class="form-control  col-xs-12" rows="7"></textarea> 
                      </div>
                      
                    </div>
                    <div class="clearfix">
                                        
                      <div class="row">
                        <label class="col-sm-3 control-label no-padding-right"> </label>
                        <div class="col-sm-7">
                          <button type="submit" name="book" class="width-35 pull-right btn btn-sm btn-primary" >
                            Book
                          </button>
                        </div>
                      </div>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>




<?php

include 'connect.php';
  
$id = "SELECT id FROM `service_type` WHERE service_title = 'Plumbing' ";

if(isset($_POST['book'])){

$result = mysqli_query($conn,$id) or die(mysqli_error());

if (mysqli_num_rows($result) > 0) {

  while ($row = mysqli_fetch_assoc($result)) {
    $rid= $row["id"];
    
  }
}


  $date = $_POST['date'];
  $desc = $_POST['sdesc'];

  $sql = "INSERT INTO `request` (customer_id,service_id,preferred_start_date,service_desc) VALUES ('$cid','$rid', '$date', '$desc')";

  if(mysqli_query($conn,$sql)){

    header('Location:services.php');

  }
  else{
    $success = "Error:" .$sql. "<br>" . mysqli_error($conn);
  }
    echo "<script type='text/javascript'>
     $('#msg').html('".$success."').hide(2250);
   </script>";
} 

  ?>
  </body>
  </html>