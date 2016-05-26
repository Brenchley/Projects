<?php
    include 'connect.php';
    $sql = "SELECT * FROM `request` as r 
      INNER JOIN
          `customer` as c 
          ON c.id = r.customer_id 
          INNER JOIN `request_status` as a  
       ON r.request_status_id = a.rid";
   
    
    $result = mysqli_query($conn, $sql) or die (mysqli_error($conn));

    $emparray = array();

    if(mysqli_num_rows($result) > 0){

      while($row = mysqli_fetch_assoc($result)){

        $emparray[] = $row;
      }
    }

     $json = json_encode($emparray);

    echo $json;   

?>