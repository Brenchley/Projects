<?php
include 'connect.php';
include 'head.php';

?>
<h3><br>Sign Up</h3>
<div class="home">
<?php	
echo '<fieldset>
	<legend><h4>Sign up</h4></legend>
	*required field
<form action="" method="post">
		<table width="200" border="0">
		<tr>
			<td > Enter name:    </td>
			<td><input type="text" placeholder="Type your name" name="user_name"> </td>
			<td><img src="images/u.png"></td> 
		</tr>
	
		<tr>
			<td>email Address</td>
			<td><input type="text"  name="user_email"> </td>
			<td><img src="images/e.png"></td>
		</tr>

		<tr>
			<td>Enter Password:</td>
			<td><input type="password" placeholder="*****"name="user_pass"></td>
			<td><img src="images/p.png"></td>

		</tr>
		

		<tr>
			<td></td>
			<td><input type="submit" name="login" value="submit"></td>
		</tr>
		</table>
	</form></fieldset>';
	?>

	</div>
	 <h4>ABOUT <em>HOLLA!</em></h4>
  <h4 class="about">We are a simle plattform with an aim of enabling individuals to air thier views on various topics freely without any prejudice


	<?php
	if(isset($_POST['login'])){

	$name = $_POST['user_name'];
	$email =$_POST['user_email'];
	$pass =$_POST['user_pass'];
		
	$sql = "INSERT INTO `users` (user_name,user_pass,user_email) VALUES ('$name','$pass','$email')";
	
	
	if (mysqli_query($conn, $sql)) {
    
    header('Location: log_in.php');
 	} 
	else {
    	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}



	}
?>