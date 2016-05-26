<?php
error_reporting(0);
session_start();
$cid= $_SESSION['id'];
  ?>

  <?php 
 include 'header.php';

include 'connect.php';
  ?>

  

 <!-- script to display all rated past orders -->
<?php
$sql1 = "SELECT r.order_id,s.service_title,w.first_name,w.last_name,r.service_desc, MAX(order_id) FROM `request` as r
 INNER JOIN `staff` as w
 ON r.worker = w.id
  INNER JOIN `customer` as c 
 ON c.id = r.customer_id 
 INNER JOIN `request_status` as a
  ON r.request_status_id = a.rid
  INNER JOIN `service_type` as s 
  ON s.id = r.service_id
   WHERE customer_id = $cid AND a.rid = 2 ";

   $latestOrder = mysqli_query($conn,$sql1) or die(mysqli_error($conn));
   if(mysqli_num_rows($latestOrder) > 0){
    while($row = mysqli_fetch_assoc($latestOrder)){
      $id = $row['order_id'];
      $lservice =$row['service_title'];
      $ldesc = $row['service_desc'];
      $lworker = $row['first_name'];
      $llast = $row['last_name'];

    }

   }

	$sql = "SELECT * FROM `request` as r 
	INNER JOIN 
	`customer` as c 
	ON c.id = r.customer_id
	INNER JOIN `request_status` as a 
	ON r.request_status_id = a.rid
	INNER JOIN `service_type` as s
	ON s.id = r.service_id
 
	 WHERE c.id = $cid AND a.rid=2";
	 $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
	 if(mysqli_num_rows($result) > 0){
	 	
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
  			Order history
  		</li>
  	</ul>
  </div>
  <div class="page-content">
  <div class="row .container">
  <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Order history 
        </h1>
      </div>

    </div>
    <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">Leave a comment & rating</div>
        <div class="panel-body">
          <div class="table-responsive">
          <table class="table">
            <tr>
              <th>Service</th>
              <th>Description</th>
              <th>Worker</th>
            </tr>
            <tr>
              <?php
              echo "<td>" .$lservice."</td>";
              echo "<td>" .$ldesc."</td>";
              echo "<td>" .$lworker." ". $llast."</td>";
             
              ?>
            </tr>
          </table>
            
          </div>
          <form id = "rating" method="post" class="form-horizontal">
          <input name='id' class="hidden" value="<?php echo $id ?>"/>
            <div class="form-group col-md-9">
              <label>Comment</label>
              <textarea class="form-control" rows="4" name="comments"></textarea>
            </div>
            <div>
            <label>Rate <?php echo $lworker;?>'s work</label>
            <div >
            <span class="rating">
                <input type="radio" class="rating-input"
                  id="rating-input-1-5" name="rating-input-1" value="5"/>
                <label for="rating-input-1-5" class="rating-star"></label>
                <input type="radio" class="rating-input"
                        id="rating-input-1-4" name="rating-input-1" value="4"/>
                <label for="rating-input-1-4" class="rating-star"></label>
                <input type="radio" class="rating-input"
                        id="rating-input-1-3" name="rating-input-1" value="3"/>
                <label for="rating-input-1-3" class="rating-star"></label>
                <input type="radio" class="rating-input"
                        id="rating-input-1-2" name="rating-input-1"value="2"/>
                <label for="rating-input-1-2" class="rating-star"></label>
                <input type="radio" class="rating-input"
                        id="rating-input-1-1" name="rating-input-1" value="1"/>
                <label for="rating-input-1-1" class="rating-star"></label>
          </span>

     
            </div>
            </div>
            <div class="col-md-12">
              <button type="submit"   name="post" class="width-30 pull-right btn btn-sm btn-primary">Post</button></div>
          </form>
        </div>
      </div>
    </div>
      <!--   script to post comment and rating --> 


    <div class="col-md-8">
    	<div class="panel panel-default">
      <div class="panel-heading"><i class="glyphicon glyphicon-info-sign"></i> My Orders   </div>
        <div class="panel-body">
        
        <div class="table-responsive">
          <table class="table">
            <tr>
                <th>Service</th>
                <th>Description</th>
                <th>Date</th>
                <th>Worker</th>
              
            </tr>
            
            <?php 
            while($row = mysqli_fetch_assoc($result)){
            $service = $row['service_title'];
            $desc = $row['service_desc'];
            $date = $row['preferred_start_date'];
            $satff = $row['worker'];
           

    
              echo"<tr><td>".$service."</td>";
              echo"<td>".$desc."</td>";
              echo"<td>".$date."</td>";
              echo "<td>".$satff."</td>";
              
              }
   }
          ?>
              
            
          </table>
        </div>
          
      
      </div>

    </div>
    </div>
    </div>
    </div>
  </div>
</body>
  <script >
    $('input').on('change',
      function(){
    $rate=$('input[class = rating-input]:checked').val();
    console.log($rate);
    
    $(document).on('submit','#rating',function(event){
      submit_form('rating', event);
    })
    function submit_form(Form_Id, e){
      e.preventDefault();
      var formDetails = $('#' + Form_Id).serialize();
      console.log(e);
      console.log(formDetails);
      $.ajax({
        type:"POST",
        url:"rating.php",
        data:formDetails,
        success:function(){

        }
      })
    }
});
  </script>
   <!-- $sql1 = "SELECT * FROM `comments`as c 
              INNER JOIN 
              `request` as r 
              ON c.request_id = r.order_id
              INNER JOIN `service_type` as s
              ON r.service_id = s.id
              INNER JOIN `staff` as st
              ON r.worker = st.id
              WHERE r.customer_id = $cid ";
              $result1 = mysqli_query($conn,$sql1) or die(mysqli_error());
              if(mysqli_num_rows($result1) > 0){
                while($row= mysqli_num_rows($result1)){
                  $service = $row['service_title'];
                  $desc = $row['service_desc'];
                  $staff = $row['first_name'];
               
              echo "<td>".$service."</td";
              echo "<td>".$desc."</td";
              echo "<td>".$staff."</td";
               }
              }  -->
    </html>