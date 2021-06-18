<?php 
include('includes/connection.php');

$query = "delete from order_details where order_details_id = {$_GET['order_details_id']} ";
mysqli_query($conn,$query);
header("location:view_order.php?order_id={$_GET['order_id']}");