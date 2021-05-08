<?php 
 include('includes/connection.php');
$id = $_GET['id'];
$query = "delete from tables where table_id = $id";

mysqli_query($conn,$query);

// redirect to manage admin 
header("location:manage_tables.php");