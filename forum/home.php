<?php
session_start();
include 'connect.php';

echo 'Signed in as: ' .$_SESSION['user_name']; 

echo "<br><br>Select a category below: <br>";
$sql = "SELECT * FROM `categories`";

$result = mysqli_query($conn, $sql) or die(mysqli_error());

if (mysqli_num_rows($result) > 0){

	echo"<form action='' method='post'>
	<select name= 'category'>";
	while ($row = mysqli_fetch_assoc($result)) {
	

		
		echo "<option value='".$row['cat_id']."'>" . $row["cat_name"]. "</option>";
		
	}
	echo '</select>
		<input type="submit" name ="select" value="Select" />
		</form>';
		
	

}
else{

	echo 'You have no categories currently. Create category <a href="category.php">here</a>';

}

if (isset($_POST['select'])) {
		$_SESSION['catid'] = $row['cat_id'];
	$_SESSION['catname'] = $row['cat_name'];

	header('Location: topics.php?cat_id='.$_POST['category']);
	exit();
}




?>