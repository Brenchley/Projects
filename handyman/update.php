<?php
include "connect.php";
session_start();
$cid= $_SESSION['id'];

if(isset($_POST['update'])){
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $city =$_POST['city'];


  $sql = "UPDATE `customer` SET first_name='$fname', last_name = '$lname', email = '$email', mobile_phone='$phone',city_id='$city' 
    WHERE id = '$cid' "; 

if(mysqli_query($conn,$sql)){
  header('Location: profile.php');
}  
else{
  mysqli_error($conn);
 }
}
?>