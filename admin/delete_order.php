<?php 
include('includes/connection.php');

$query = "delete from orders where order_id = {$_GET['order_id']}";

mysqli_query($conn, $query);

$query2 = "delete from order_details where order_id = {$_GET['order_id']}";
mysqli_query($conn, $query2);

header("location:manage_orders.php");