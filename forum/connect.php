<?php
//connect.php

$servername ="localhost";
$username ="root";
$password ="Sc0rpion";
$database ="my_forum";

//create connection

$conn = mysqli_connect($servername, $username, $password, $database);
//check connection

if ($conn -> connect_error){
	die("Connection failed: " . $conn -> connect_error);

}


?>