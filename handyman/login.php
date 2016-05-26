<?php
session_start(); 
include 'connect.php';

if(isset($_POST['login'])){


	
	$email = $_POST['email'];
	$pass = $_POST['password'];

	$sql = "SELECT * FROM `customer` WHERE email = '".$email."' OR  mobile_phone = '".$email."' AND password = '".$pass."' ";

	$result = mysqli_query($conn, $sql) or die(mysql_error());

	if (mysqli_num_rows($result) == 1){

		while ($row = mysqli_fetch_assoc($result)) {

			$_SESSION['id'] = $row['id'];
			$_SESSION['name'] =$row['first_name'];

			setcookie('user_id', $row['user_id'],time() +(60*60*24*30)); //expires in 30 days
			setcookie('name',$row['first_name'], time()+(60*60*24*30)); //expires in 30 days 

			header('Location:index.php');
			exit();
		}
	}
	else{
		echo "Invalid password.Please try again";
		

		}

}


?>