<?php
// we will make CRUD
// lets start with Create 
 //open connection 
 include('includes/connection.php');

if(isset($_POST['submit'])){
    $admin_email    = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];
    $admin_fullname = $_POST['admin_fullname'];

   
    // query 
    $query = "insert into admin(admin_email,admin_password,admin_fullname)
              values('$admin_email','$admin_password','$admin_fullname')";
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
                                    <div class="card-header">Manage Admin</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Create Admin</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Admin Email</label>
                                                <input name="admin_email" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Admin Password</label>
                                                <input name="admin_password" type="password" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Admin Full Name</label>
                                                <input name="admin_fullname" type="text" class="form-control">
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
                                                <th>Full Name</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                            $query        = "select * from admin";
                                            $result       = mysqli_query($conn,$query);
                                            while($row    = mysqli_fetch_assoc($result)){
                                                echo "<tr>";
                                                echo "<td>{$row['admin_id']}</td>";
                                                echo "<td>{$row['admin_email']}</td>";
                                                echo "<td>{$row['admin_fullname']}</td>";
                                                echo "<td><a href='edit_admin.php?id={$row['admin_id']}'>Edit</a></td>";
                                                echo "<td><a href='delete_admin.php?id={$row['admin_id']}'>Delete</a></td>";
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