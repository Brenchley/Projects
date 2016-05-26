<?php 
include 'connect.php';

if(isset($_POST['signup'])){


	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$pass =$_POST['password'];
	$phone = $_POST['phone'];
	$city =$_POST['city'];

	

	$sql = "INSERT INTO `customer` (first_name, last_name, email, password, mobile_phone,city_id) VALUES ('$fname', '$lname', '$email', '".password_hash($pass,PASSWORD_BCRYPT)."','$phone','$city')";

	if (mysqli_query($conn, $sql)){
		header('Location:login.html');

	}
	else {
		 mysqli_error($conn);
	}
}

?>