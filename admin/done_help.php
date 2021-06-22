<?php 
include('includes/connection.php');

$query = "update ask_help set status='served' where help_id = {$_GET['help_id']}";

mysqli_query($conn, $query);


header("location:ask_help.php");