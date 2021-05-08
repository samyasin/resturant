<?php
// we will make CRUD
// lets start with Create 
 //open connection 
 include('includes/connection.php');

if(isset($_POST['submit'])){
    $rest_email    = $_POST['rest_email'];
    $rest_password = $_POST['rest_password'];
    $rest_name     = $_POST['rest_name'];
    $rest_address  = $_POST['rest_address'];
    $rest_mobile   = $_POST['rest_mobile'];

   
    // query 
    $query = "update resturants set rest_email    = '$rest_email',
                                    rest_password = '$rest_password',
                                    rest_name     = '$rest_fullname',
                                    rest_address  = '$rest_address',
                                    rest_mobile   = '$rest_mobile'
              where rest_id = {$_GET['id']}";
    mysqli_query($conn,$query);

    // redirect
    header("location:manage_resturant.php");
}

// fetch Old Data
$query  = "select * from resturants where rest_id = {$_GET['id']}";
$result = mysqli_query($conn, $query);
$row    = mysqli_fetch_assoc($result);


 ?>
<?php include('includes/admin_header.php'); ?>
<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Manage Resturant</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Edit resturant</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">rest Email</label>
                                                <input name="rest_email" type="text" class="form-control" value="<?php echo $row['rest_email'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">rest Password</label>
                                                <input name="rest_password" type="password" class="form-control" value="<?php echo $row['rest_password'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">rest  Name</label>
                                                <input name="rest_name" type="text" class="form-control" value="<?php echo $row['rest_name'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">rest  Address</label>
                                                <input name="rest_address" type="text" class="form-control" value="<?php echo $row['rest_address'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">rest  Mobile</label>
                                                <input name="rest_mobile" type="text" class="form-control" value="<?php echo $row['rest_mobile'] ?>">
                                            </div>
                                            
                                            
                                            <div>
                                                <button type="submit" class="btn btn-lg btn-info btn-block" name="submit">
                                                    
                                                    <span id="payment-button-amount">Update</span>
                                                    
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                   
               
                             </div>
                </div>

<?php include('includes/admin_footer.php'); ?>