<?php
include 'connect.php';
if (isset($_POST['action'])) {
	switch ($_POST['action']) {
		case 'delComment':
			$comment_id = $_POST['id'];
				$result = mysqli_query($conn,"DELETE FROM `posts` WHERE `post_id` = '$comment_id'");
				if ($result !== false) {
					echo(json_encode(array("status" => 200)));
				}else{
					echo(json_encode(array("status" => 401)));
				}
			break;
		
		default:
			# code...
			break;
	}

}

	?>