<?php include('includes/connection.php');
session_start();-
$query = "delete from items where item_id = {$_GET['id']}";

mysqli_query($conn, $query);

header("location:manage_items.php");
