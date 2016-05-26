<?php
include 'connect.php';
include 'head.php';

if (isset($_POST["submitApprove"])){
  $_POST["submitApprove"] = 0;
  foreach ($_POST as $key => $user_id ) {
    # code...
    print_r($user_id);
    $sql = "UPDATE `users` SET `approval`= 'y' WHERE `user_id` = '$key' ";
    if(mysqli_query($conn, $sql)){
    }
    else{
      echo "Error: " .$sql. "<br>" . mysqli_error($conn);
    } 
  }

}

echo '<h4>Create category <a href="category.php" class="create">here</a></h4>';
$sql = "SELECT * FROM `users` WHERE `approval` = 'n'";
$result = mysqli_query($conn,$sql) or die (mysqli_error());

if(mysqli_num_rows($result) > 0){
echo '<form method ="post" action=> 
 <table  border ="1">
  <tr>
    <td> Name</td>
    <td> Email</td>
    <td> Approval status</td>
    <td> </td>
  </tr>';
 while ($row = mysqli_fetch_assoc($result)) {
 echo '<tr>';
 echo "<td>".$row['user_name']."</td>";
 echo "<td>".$row['user_email']."</td>";
 echo "<td>".$row['approval']."</td>";
 echo "<td><input type='checkbox' name='".$row['user_id']."' value='approve'></td>";
 echo '</tr>'; 
}
echo '<table>
      <input type="submit" name ="submitApprove" value="Approve" />
    </form>';
}


?>