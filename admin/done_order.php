<?php 
include('includes/connection.php');
$query = "update orders set order_status = 'done' 
          where order_id = {$_GET['order_id']}";
mysqli_query($conn,$query);          
header("location:manage_orders.php");


?>