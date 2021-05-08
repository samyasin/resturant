<?php 
 include('includes/connection.php');
$id = $_GET['id'];
$query = "delete from resturants where rest_id = $id";

mysqli_query($conn,$query);

// redirect to manage admin 
header("location:manage_resturant.php");