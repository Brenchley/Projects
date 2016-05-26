 <?php
  session_start();
  include 'connect.php';

  print_r($_POST);
  if (isset($_POST['sname'])) {
    $sname = $_POST['sname'];
    $sdesc = $_POST['sdesc'];

    $sql = "INSERT INTO `service_type` (service_title, servicedesc) VALUES ('$sname', '$sdesc')";

    if(mysqli_query($conn, $sql)){
      $success = "Form successfully sent!!";
      echo($success);

    }else{
      echo"Error: " .$sql. "<br>" .mysqli_error($conn);
    }
}

  if (isset($_POST['fname'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $job = $_POST['job'];

    $sql1 = "SELECT * FROM `service_type` WHERE service_title = '$job' ";

    $result = mysqli_query($conn, $sql1) or die(mysqli_error($conn));

    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_assoc($result)){

        $job_id = $row['id'];
      }
    }

    $sql = "INSERT INTO `staff` (first_name, last_name, email,mobile, job_title_id) VALUES ('$fname', '$lname', '$email','$phone', '$job_id')";
    
    if (mysqli_query($conn, $sql)) {

      $success = "Form successfully sent!!";
      echo($success);

  }
  else {
    echo"Error: " .$sql. "<br>" . mysqli_error($conn);
  }
}





if (isset($_POST['cname'])) {
  $city =$_POST['cname'];
  $area =$_POST['location'];

  $sql = "INSERT INTO `city` (city_name, location) VALUES ('$city', '$area')";


  if (mysqli_query($conn, $sql)){

      $success = "Form successfully sent!!";
      echo($success);

  }else{
    echo"Error:" .$sql. "<br>" .mysqli_error($conn);
   }
   
}
   ?>


  