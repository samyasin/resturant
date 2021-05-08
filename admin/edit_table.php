<?php
// we will make CRUD
// lets start with Create 
 //open connection 
 include('includes/connection.php');

if(isset($_POST['submit'])){
    $device_number = $_POST['device_number'];
    
   
    // query 
    $query = "update tables set device_number = '$device_number'                                    
              where table_id = {$_GET['id']}";
    mysqli_query($conn,$query);

    // redirect
    header("location:manage_tables.php");
}

// fetch Old Data
$query  = "select * from tables where table_id = {$_GET['id']}";
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
                                    <div class="card-header">Manage Tables</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Edit Table</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">rest Email</label>
                                                <input name="device_number" type="text" class="form-control" value="<?php echo $row['device_number'] ?>">
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