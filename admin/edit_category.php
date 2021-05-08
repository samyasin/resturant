<?php
include('includes/connection.php');

if(isset($_POST['submit'])){
    $cat_name = $_POST['cat_name'];
    
    $query = "update category set cat_name = '$cat_name'                               
                where cat_id = {$_GET['id']}";
    mysqli_query($conn,$query);
    header("location:manage_category.php");
}

$query  = "select * from category where cat_id = {$_GET['id']}";
$result = mysqli_query($conn,$query);
$row    = mysqli_fetch_assoc($result);


 ?>
<?php include('includes/admin_header.php') ?>
<!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">MAnage Category</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Update Cat</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Category</label>
                                                <input name="cat_name" type="text" class="form-control" value="<?php echo $row['cat_name'] ?>">
                                            </div>
                                            
                                            
                                            <div>
                                                <button name="submit" id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="submit">
                                                   Update
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

<?php include('includes/admin_footer.php') ?>