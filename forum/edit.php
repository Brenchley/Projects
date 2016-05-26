<?php
include 'connect.php';
include 'head.php';


	echo '<br>Post :'.$_GET['topic_id'];


	if(isset($_POST['post'])){
		
	$content =$_POST['post_content'];


		$sql = "INSERT INTO `posts`(post_content,post_date,post_topic, post_by) VALUES
		('".$content."','".date('Y-m-d H:i:s')."', '".$_GET['topic_id']."','".$_SESSION['user_id']."')";
		
		if (mysqli_query($conn, $sql)){

      	}
      	else{
      		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      	}
      } 
	
	echo '<form method ="post" action="">
		leave your comments here:<br>
		<textarea name="post_content" /></textarea><br><br>
		<input type="submit" name ="post" value="post"/>
		</form>';

	$sql = " SELECT * FROM `posts` as p
				INNER JOIN
					`users` as u ON p.post_by = u.user_id
			WHERE p.post_topic ='".$_GET['topic_id']."' ORDER BY post_date DESC"	;

	$result =mysqli_query($conn,$sql) or die (mysqli_error());

	if(mysqli_num_rows($result) > 0){
		echo '<fieldset id="post">
		<legend>Comments</legend>';
		while($row = mysqli_fetch_assoc($result)){
			//print_r($row);

			echo"Post by: <strong>".$row['user_name']. "</strong>   on: <strong>" .$row['post_date']."</strong>";

			echo "<br>".$row['post_content']."<br>";
		}
		echo '</fieldset>';
	}
	else{
		echo "no comments on current post available yet";
	}


	
    



?>
