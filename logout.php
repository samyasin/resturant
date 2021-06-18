<?php 
session_start();
unset($_SESSION['rest_id']);
header("location:login.php");
