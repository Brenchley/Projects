<?php
include "connect.php";
error_reporting(0);
session_start();
$cid= $_SESSION['id'];
  ?>
  <!-- script to update profile -->

  <?php 
  include 'header.php' 
  ?>
  <?php 
  $sql = "SELECT * FROM `customer` WHERE id = $cid ";

  $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));

  if(mysqli_num_rows($result) > 0){
  	while($row = mysqli_fetch_assoc($result)){
  		$fname = $row['first_name'];
  		$lname = $row['last_name'];
  		$num = $row['mobile_phone'];
    	$email =$row['email']; 
    	$city_id = $row['city_id'];
  	}
  }
  $sql1 ="SELECT * FROM `city` WHERE id = $city_id";
  $result1 = mysqli_query($conn, $sql1)or die(mysqli_error($conn));

  if(mysqli_num_rows($result1) > 0){
  	while($row = mysqli_fetch_assoc($result1)){
  		$city = $row['city_name'];
  		$area = $row['location'];
  	}
  }
   
  ?>

  <div class="container" style="margin-top:20px">
  <div class="breadcrumbs" id="breadcrumbs">
  	<ul class="breadcrumb">
  		<li>
  			<a href="index.php">
  				<span class="glyphicon glyphicon-home"></span>
  				Home</a>
  			
  		</li>
  		<li class="active">
  			Profile
  		</li>
  	</ul>
  </div>
  <div class="page-content">
  <div class="row .container">
  <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Profile 
        </h1>
      </div>

    </div>
  	<div class="col-md-4">
  		<div class="panel panel-default">
  			<div class="panel-heading">Current details</div>
  			<div class="panel-body">
  				<div class="table-responsive">
  					<table class="table">
  						
  					<?php

  						echo"<tr><td>Name</td><td>".$fname." ".$lname."</td></tr>"; 
  						echo"<tr><td>email</td><td>".$email."</td></tr>";
  						echo"<tr><td>Phone</td><td>".$num."</td></tr>";
  						echo"<tr><td>City</td><td>".$city."</td></tr>";
  						echo"<tr><td>Location</td><td>".$area."</td></tr>";
  						?>
  					</table>
  				</div>
  			</div>
  		</div>
  	</div>
  	<div class="col-md-2">
  		<button>Edit Profile</button>
  		
  	</div>
  	<div id="editForm" style="display:none;" class="col-md-4">
  		<form method="post" action="update.php" name="profileUpdate" class="form-horizontal" role="form">
  			<div class="form-group">
  				<label class="col-md-5 control-lable no-padding-right">Firstname</label>
  				<div class="col-md-7">
  					<input type="text" class="form-control" placeholder="First name" name="fname" required/>
  				</div>
  			</div>
  			<div class="form-group">
  				<label class="col-md-5 control-lable no-padding-right">Lastname</label>
  				<div class="col-md-7">
  					<input type="text" class="form-control" placeholder="Last name" name="lname"required/>
  				</div>
  			</div>
  			<div class="form-group">
  				<label class="col-md-5 control-lable no-padding-right">Email</label>
  				<div class="col-md-7">
  					<input type="text" class="form-control" placeholder="email" name="email" required/>
  				</div>
  			</div>
  			<div class="form-group">
  				<label class="col-md-5 control-lable no-padding-right">Phone</label>
  				<div class="col-md-7">
  					<input type="text" class="form-control" placeholder="Phone number" name="phone" required/>
  				</div>
  			</div>
  			<div class="form-group">
  				<label class="col-md-5 control-lable no-padding-right">City</label>
  				<div class="col-md-7">
  					<select class="form-control" id="option" required>
  					<option>
  					<?php
  					$sql = "SELECT DISTINCT city_name FROM `city` ";
                        $result = mysqli_query($conn, $sql) or die(mysqli_error());
                        if (mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_assoc($result)){
                            $ncity = $row['city_name'];
                            echo"<option >".$ncity."</option>";
                            }
                                 
                        } 
                    ?>
  						
  					</option>
  					</select>
  				</div>
  			</div>
  			<div class="form-group">
  				<label class="col-md-5 control-lable no-padding-right">Area</label>
  				<div class="col-md-7">
  					<select class="form-control" id="area" required>
            
  					</select>
  				</div>
  			</div>
  			<div class="form-group">
                <span class="lbl col-md-5"> </span>
                    <div class="col-md-7">
                        <button type="submit" name="update" class="width-35 pull-right btn btn-sm btn-primary">
                           Update
                        </button>
                    </div>
            </div>
  		</form>
  	</div>
  	
  </div>
  </div>
  <script type="text/javascript">
$(document).ready(function(){
    $("#option").change(function(e){
        var selected = $(this).val();
        console.log('change:', selected);
    

    $.ajax({
        type:"POST",
        url:'drop.php',
        data:{city_name:selected},
        success:function(res){
        
        $('#area').html(res);
        }
    })
    });
});
</script>
<!--fading script -->
<script>
$("button").click(function(){
  
  $("#editForm").fadeToggle('slow');
});

$(document).on('submit','#update', function(event){
  submit_form('update',event);
})

/*function submit_form(Form_Id, e){
  e.preventDefault();
  var formDetails = $('#' + Form_Id).serialize();
  console.log(e);
  console.log(formDetails);
  $.ajax({
    type:"POST",
    url:"update.php",
    data:formDetails,
    success:function(){

    }
  })
}*/
</script>
  </body>
  </html>

