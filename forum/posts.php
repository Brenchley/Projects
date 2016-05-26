<?php
include 'connect.php';
include 'head.php';

include 'home.php';

$sql = " SELECT * FROM `topics` as t
				INNER JOIN
					`users` as u ON t.topic_by = u.user_id
			WHERE t.topic_id ='".$_GET['topic_id']."'";
$result = mysqli_query($conn, $sql) or die(mysqli_error());
while ($row = mysqli_fetch_assoc($result)) {

	echo "<br>Post :<strong>".$row['topic_subject']. "</strong> by <strong>".$row['user_name']."</strong>";

}
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

	$msql = " SELECT * FROM `posts` as p
				INNER JOIN
					`users` as u ON p.post_by = u.user_id
			WHERE p.post_topic ='".$_GET['topic_id']."' ORDER BY post_date DESC"	;

	$result =mysqli_query($conn,$msql) or die (mysqli_error());

	if(mysqli_num_rows($result) > 0){
		echo '<fieldset id="post">
		<legend>Comments</legend><ul>';
		while($row = mysqli_fetch_assoc($result)){
			//print_r($row);

			echo"<li id='comment-".$row["post_id"]."' >Post by: <strong>".$row['user_name']. "</strong>   on: <strong>" .$row['post_date']."</strong>";

			echo "<br>".$row['post_content']."<br><br>";
			if(isset($_SESSION['user_name']) && $row['post_by'] == $_SESSION['user_id']){
				echo'<a href="#" onclick=deleteComment('.$row["post_id"].') class = "delete">Remove</a></li><br>';
				?>
				<script type="text/javascript">
				function deleteComment( commentID){
				   $.ajax( {
				                type: 'POST',
				                url: 'action.php',
				                data: { action: 'delComment',
				                        id: commentID
				                    },
				                dataType: 'json',
				                success: function(data) {
				                    if (data.status == 200) {
				                    	 $('#comment-'+commentID).html("Comment deleted.").show().fadeOut(2000);
				                    }else{

				                    }
				            }
				    });
				  return false;
				}
			</script>
				<?php
			}	
		}
		echo '</fieldset>';
	}
	else{
		echo "no comments on current post available yet";
	}


	
    



?>
