<?php
session_start();

include 'connect.php';
include 'head.php';
echo '<h3>Logged in as: ' .$_SESSION['user_name'].'</h3>';
?>

<div class="row1">
<?php
 

echo "<br><br><fieldset>Select a category below: <br>";
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

<?php
$sql = "SELECT * FROM `categories` WHERE cat_id =".$_GET['cat_id']."";
$result = mysqli_query($conn, $sql) or die(mysqli_error());
while ($row = mysqli_fetch_assoc($result)) {
echo '<br><br>Category :' .$row['cat_name'];
echo'<br><br>Description:<br>'.$row['cat_description'];
}
?>
</fieldset>'</div>
<div class="row2">
<?php 
echo '<form method="post" action="">
		<table width="200" border= "0">
        <tr>
        <td>Post: <input type="text" name="topic_subject"></td>
        </tr>
        <tr>
        <td><input type="submit" name ="create" value="Add post" /></td>
        </tr>
        </table>
     </form>';
     
     
     

     if (isset($_POST["create"])) {
           $subject = $_POST['topic_subject'];

      	$sql = "INSERT INTO `topics` (topic_subject, topic_cat,topic_by) VALUES 
        ('".$subject."', '".$_GET['cat_id']."', '".$_SESSION['user_id']."')";
        

      	if (mysqli_query($conn, $sql)){

      	}
      	else{
      		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      	}
      } 
    


?>
</div>
<div class="row3">

<?php
echo '<br><br>Select a <strong>post</strong> to comment below:';
$sql = "SELECT * FROM `topics` as t
INNER JOIN 
  `categories` as c ON t.topic_cat = c.cat_id
  WHERE t.topic_cat =".$_GET['cat_id']."";

$result = mysqli_query($conn, $sql) or die(mysqli_error());

if (mysqli_num_rows($result) > 0){

  echo"<form action='' method='post'>
  <select name= 'topic'>";
  while ($row = mysqli_fetch_assoc($result)) {
    
    echo "<option value='".$row['topic_id']."'>" . $row["topic_subject"]. "</option>";
    
  }
  echo '</select>
    <input type="submit" name ="selec" value="Select" />
    </form>';

  }
  if (isset($_POST['selec'])) {


  header('Location: posts.php?topic_id='.$_POST['topic']);
  exit();
}

?>
</div>