<?php
include "connect.php";

  $id = $_POST['id'];
  $comment = $_POST['comments'];
  $rate = $_POST['rating-input-1'];

  $sql = "INSERT INTO `comments`( comment, rating, request_id) VALUES('$comment','$rate','$id')";
  if(mysqli_query($conn, $sql)){

    header('Location: history.php');
  }


  ?>