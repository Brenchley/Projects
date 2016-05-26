<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Handyman</title>
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/custom.css" rel="stylesheet">
        <link href="css/datepicker.css" rel="stylesheet">

        <style>
          a {
              color: orange;
            }
        </style>
      
        <script type="text/javascript" src="js/main.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="js/Chart.js"></script>
 
  </head>

  <body style="font-size:14px">
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation"> 
    <ul class="nav nav-pills nav-stacked">  
      <li class="dropdown pull-right">
        <a class="dropdown-toggle" data-toggle="dropdown" ><?php
  
                include 'connect.php';
                session_start();
            
               
  

                if(isset ($_SESSION['name'])) {
                  echo $_SESSION['name'];

                
              ?><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="profile.php"> Profile</a></li>
            <li><a href="history.php">Order history</a></li>
            <li><a href="logout.php"> Logout</a></li>
          </ul>
          <?php }
          else{?>
          New User
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="sign_up.php"> Sign up</a></li>
            <li><a href="login.html">Login</a></li>
          </ul>
           <?php }
        ?>
        </li>
      </ul>
    </div>