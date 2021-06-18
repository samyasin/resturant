<?php
session_start();
$id = $_GET['item_id'];
unset($_SESSION['items'][$id]);

header("location:cart.php");


 ?>