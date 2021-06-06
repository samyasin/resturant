<?php
include('includes/admin_header.php');
include('includes/connection.php');

$rest_id  = $_SESSION['admin_id'];


if(isset($_POST['submit'])){
    $device_number  = $_POST['device_number'];   
    // query 
    $query = "insert into tables(device_number,rest_id) values('$device_number',$rest_id)";
    mysqli_query($conn,$query);
}


 ?>

<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Manage Tables</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Create Table</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Device Number</label>
                                                <input name="device_number" type="text" class="form-control">
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
                                                <th>Device Number</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                            $query = "select * from tables where rest_id = $rest_id";
                                            $result       = mysqli_query($conn,$query);
                                            while($row    = mysqli_fetch_assoc($result)){
                                                echo "<tr>";
                                                echo "<td>{$row['table_id']}</td>";
                                                echo "<td>{$row['device_number']}</td>";               
                                                echo "<td><a href='edit_table.php?id={$row['table_id']}'>Edit</a></td>";
                                                echo "<td><a href='delete_table.php?id={$row['table_id']}'>Delete</a></td>";
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