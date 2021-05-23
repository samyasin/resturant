<?php
session_start();
include('admin/includes/connection.php');

if(isset($_POST['submit'])){
    $rest_email    = $_POST['email'];
    $rest_password = $_POST['password'];    
    $query = "select * from resturants where rest_email='{$rest_email}'
              AND rest_password = '{$rest_password}'";
    $result = mysqli_query($conn, $query);
    $row    = mysqli_fetch_assoc($result);
    if($row['rest_id']){
    $_SESSION['rest_id'] = $row['rest_id'];     
    header("location:index.php");
    }else{
        $error = "Resturant Not Found";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
 <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
 <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/login.css">
 

</style>
</head>
<!-- body -->
<body>
 <div class="login-reg-panel">                           
    <div class="white-panel">
        <div class="login-show">                
            <h2>Resturant LOGIN</h2>
            <form method="post">
            <?php
             if(isset($error)){
                echo "<div class='alert alert-danger'>{$error}</div>";
            } 
            ?>
                <input type="text" placeholder="Email" name="email">
                <input type="password" placeholder="Password" name="password">
                <input type="submit" value="Login" name="submit" class="btn btn-danger">                
            </form>
        </div>

    </div>
</div>
<script type="text/javascript" src="js/login.js"></script>
</body>

</html>