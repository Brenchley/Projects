<?php

session_start();
include 'connect.php';
include 'head.php';
if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true)
{
    
}


?>
<h3><br>Please login</h3>
<div class="home">
<?php

echo '<fieldset class="lform">
<legend><h4>Login</h4></legend>
<form action ="" method="post">
    <table width="200" border="0">
    <tr>
      <td> Username:</td>
      <td><input type="text" data-icon ="u" placeholder="Type your name" name="user_name"> </td>
      <td><img src="images/u.png"></td>
    </tr>
  
    <tr>
      <td>Password:</td>
      <td><input type="password" data-icon="p" placeholder="*****" name="user_pass"> </td>
      <td><img src="images/p.png"></td>    
    </tr>
    <tr>
    <td></td>
    <td id="submit"><input type="submit" name="login" value="submit"></td>
  </tr>
     </table>
  </form></fieldset>';
?>
  </div>


  <?php

  if(isset($_POST['login']))
  {
    $username = $_POST['user_name'];
   $password = $_POST['user_pass'];
  	
  	$sql = "SELECT user_id,user_name  FROM `users` WHERE user_name = '".$username."' AND user_pass = '".$password."' AND `approval` = 'y' LIMIT 1";

  	$result = mysqli_query($conn, $sql) or die(mysqli_error()) ; 
  	  	
  	if (mysqli_num_rows($result) == 1){
      
      $_SESSION['signed_in'] = true;
  		while($row= mysqli_fetch_assoc($result)){
        $_SESSION['user_id']    = $row['user_id'];
        $_SESSION['user_name']  = $row['user_name'];
        
        header('Location: topics.php?user_id='.$_POST['user_id']);
        exit();

      }
  	}
  	else{
  		echo "You have not been approved yet.Please try again later <br> Or check your entry and try again";
  	}
}

  
  


include 'foot.php';

?>