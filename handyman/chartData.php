<?php
include 'connect.php';

$sql = "SELECT city.location, COUNT(*) as num FROM customer INNER JOIN city ON city.id = customer.city_id GROUP BY city.location ORDER BY  num DESC ";
$result = mysqli_query($conn,$sql)or die(mysqli_error($conn));

 $emparray = array();

    if(mysqli_num_rows($result) > 0){

      while($row = mysqli_fetch_assoc($result)){

        $emparray[] = $row;
      }
    }

     $json = json_encode($emparray);

 
 echo $json; 
/*	echo $row['order_date']. ' | ' . $row['customer_id'] . ' | ' . $row['service_id'] ;
*/
  ?>
