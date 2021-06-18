<?php
include('includes/connection.php');
include('includes/admin_header.php');
$rest_id = $_SESSION['admin_id'];

if(isset($_POST['submit'])){

    mysqli_query($conn,$query);
}
 ?>
 
<!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        
                      
                <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Table Number</th>
                            <th>Status</th>
                            <th>View Order</th>
                            <th>Done Order</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                      $query        = "select * from orders where rest_id = {$_SESSION['admin_id']} AND order_status NOT IN ('done')";
                      $result       = mysqli_query($conn,$query);
                      $i = 1;
                      while($row    = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td>$i</td>";
                        //echo "<td>{$row['order_id']}</td>";
                        echo "<td>{$row['order_date']}</td>";
                        echo "<td>{$row['table_id']}</td>";
                        echo "<td>{$row['order_status']}</td>";
                        echo "<td><a href='view_order.php?order_id={$row['order_id']}' class='btn btn-warning'>View</a></td>";
                        echo "<td><a href='done_order.php?order_id={$row['order_id']}' class='btn btn-success'>Done</a></td>";
                        echo "</tr>";
                        $i++;
                    }

                    ?>  
                </tbody>
            </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                          </div>
                    </div>
                </div>

<?php include('includes/admin_footer.php') ?>