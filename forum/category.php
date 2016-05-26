<?php
include 'head.php';
include 'connect.php';

echo '<form method="post" action="">
		<table width="200" border= "0">
		<tr>
        <td>Category name: <input type="text" name="cat_name" /></td>
        </tr>

        <tr>
        <td>Category description: <textarea name="cat_description" /></textarea></td>
        </tr>
        <tr>
        <td><input type="submit" name ="create" value="Add category" /></td>
        </tr>
        </table>
     </form>';
     
    
     

     if (isset($_POST["create"])) {
     $catname = $_POST['cat_name'];
      $description = $_POST['cat_description'];
      	$sql = "INSERT INTO `categories` (cat_name, cat_description) VALUES ('".$catname."', '".$description."')";

      	if (mysqli_query($conn, $sql)){
      		echo "New category created sucessfully";
      		$_SESSION['cat_id'] = $row['user_id'];
          $_SESSION['cat_name']= $row['cat_name'];

      		header('Location: topics.php');
          
      	}
      	else{
      		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      	}
      } 

  ?> 