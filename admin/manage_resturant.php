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
    $query = "insert into resturants(rest_email,rest_password,rest_name,rest_address, rest_mobile)
              values('$rest_email','$rest_password','$rest_name','$rest_address','$rest_mobile')";
    mysqli_query($conn,$query);
}


 ?>
<?php include('includes/admin_header.php'); ?>
<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Manage Resturants</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Create Resturant</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Resturant Email</label>
                                                <input name="rest_email" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Resturant Password</label>
                                                <input name="rest_password" type="password" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Resturant Name</label>
                                                <input name="rest_name" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Resturant Addresse</label>
                                                <input name="rest_address" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Resturant Mobile</label>
                                                <input name="rest_mobile" type="text" class="form-control">
                                            </div>
                                            
                                            
                                            <div>
                                                <button type="submit" class="btn btn-lg btn-info btn-block" name="submit">
                                                    
                                                    <span id="payment-button-amount">Save</span>
                                                    
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                   
                <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Email</th>
                                                <th> Name</th>
                                                <th> Address</th>
                                                <th> Mobile</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                            $query        = "select * from resturants";
                                            $result       = mysqli_query($conn,$query);
                                            while($row    = mysqli_fetch_assoc($result)){
                                                echo "<tr>";
                                                echo "<td>{$row['rest_id']}</td>";
                                                echo "<td>{$row['rest_email']}</td>";
                                                echo "<td>{$row['rest_name']}</td>";
                                                echo "<td>{$row['rest_address']}</td>";
                                                echo "<td>{$row['rest_mobile']}</td>";
                                                echo "<td><a href='edit_resturant.php?id={$row['rest_id']}'>Edit</a></td>";
                                                echo "<td><a href='delete_resturant.php?id={$row['rest_id']}'>Delete</a></td>";
                                                echo "</tr>";
                                        }

                                           ?>  
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                             </div>
                </div>

<?php include('includes/admin_footer.php'); ?>