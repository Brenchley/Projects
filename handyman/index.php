<?php
error_reporting(0);
session_start();
$cid= $_SESSION['id'];
  ?>

   <?php 
   include 'header.php'
   ?>

      <div class="container" style="margin-top:20px;">

        <div >
            

          <div class="breadcrumbs" id="breadcrumbs">
            <ul class="breadcrumb ">
                <li class="active ">
                <span class="glyphicon glyphicon-home"></span>
                Home</li>
            </ul>
          </div>
          <div class="page-content ">
            <div class="row .container-fluid">
              <div class="col-sm-10">
                 
                  <h3 class="header blue lighter bigger">A Happy Home Happy Life</h3>

                  <div class="space-16"></div>
                    <div class="row">
                      <span class="col-lg-4 text-center col-sm-offset-5">
                        <a href="services.php" role="button" class="btn btn-default btn-md btn-block">SERVICES AVAILABLE</a>
                      </span>
                    </div>
                  <hr>
                    <div class="text-center ">
                      <h3>1.Select a date and Time</h3>
                      <p>Simply book a date and time from anywhere.</p>
                      <h3>2.We get back to you for confirmation</h3>
                      <h3>3.An experienced proffessional will show up at your doorsteo</h3>
                      <h3>4.Let your home SHINE n stay in one pice</h3>
                    </div>

                  <hr>

                  <h3>Ready to book now?</h3>
                  <div class="row">
                    <span class="col-lg-4 text-center col-sm-offset-5">
                      <a href="services.php" role="button" class="btn btn-default btn-md btn-block">SERVICES AVAILABLE</a>
                    </span>
                  </div>
                </div><!-- /position-relative -->
              </div>
            </div><!-- /.page-content -->
        </div>
      </div>
    </body>
</html>





