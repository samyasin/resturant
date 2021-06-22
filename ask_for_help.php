<?php 
session_start();
include('admin/includes/connection.php');
$date = date("Y-m-d");
$query = "insert into ask_help(rest_id,table_id,date) values({$_SESSION['rest_id']},{$_SESSION['table_number']},'$date')";

mysqli_query($conn,$query);

header("location:help.php");