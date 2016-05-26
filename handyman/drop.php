<?php
   include "connect.php";
  
    $sql =  "SELECT * FROM `city`  WHERE city_name = '".$_POST['city_name']."' ";

    $result = mysqli_query($conn, $sql) or die(mysql_error());

    if (mysqli_num_rows($result) >0){
    while ($row =mysqli_fetch_assoc($result)){
        $area = $row['location'];
        $id = $row['id'];
        echo "<option name='city' value='$id'>".$area. "</option>";
            }
        }

    ?>