<?php
include 'connect.php';

$sql1 = "SELECT service_type.service_title, COUNT(*) as num FROM request INNER JOIN service_type ON request.service_id = service_type.id GROUP BY service_type.service_title ORDER BY num DESC ";
$result = mysqli_query($conn,$sql1)or die(mysqli_error($conn));

 $emparray2 = array();

    if(mysqli_num_rows($result) > 0){

      while($row = mysqli_fetch_assoc($result)){

        $emparray2[] = $row;
      }
    }

     $json2 = json_encode($emparray2);

 echo $json2;

  ?>