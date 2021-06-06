<?php
// we will make CRUD
// lets start with Create 
 //open connection 
include('includes/connection.php');

?>
<?php include('includes/admin_header.php'); ?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">Manage Orders
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
                            <th>Date</th>
                            <th>Status</th>
                            <th>View Order</th>
                            <th>Finish Order</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                      $query        = "select * from orders where rest_id = {$_SESSION['admin_id']}";
                      $result       = mysqli_query($conn,$query);
                      while($row    = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td>{$row['order_id']}</td>";
                        echo "<td>{$row['order_date']}</td>";
                        echo "<td>{$row['order_status']}</td>";
                        echo "<td><a href='view_order.php?order_id={$row['order_id']}' class='btn btn-warning'>View</a></td>";
                        echo "<td><a href='done_order.php?order_id={$row['order_id']}' class='btn btn-success'>Done</a></td>";
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