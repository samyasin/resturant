<?php include('includes/connection.php');
session_start();-
$query = "delete from category where cat_id = {$_GET['id']}";

mysqli_query($conn, $query);

header("location:manage_category.php");
