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
                        <div class="card-header">Manage Helps
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
                            <th>#</th>
                            <th>Table Number</th>
                            <th>Date</th>                            
                            <th>Status</th>                                                        
                            <th>Change</th>                                                        
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                      $query        = "select * from ask_help where rest_id = {$_SESSION['admin_id']} AND status = 'pending' ";
                      $result       = mysqli_query($conn,$query);
                      $i = 1;
                      while($row    = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td>$i</td>";
                        //echo "<td>{$row['order_id']}</td>";
                        echo "<td>{$row['table_id']}</td>";
                        echo "<td>{$row['date']}</td>";
                        echo "<td>{$row['status']}</td>";
                        echo "<td><a href='done_help.php?help_id={$row['help_id']}' class='btn btn-warning'>Done</a></td>";
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

<?php include('includes/admin_footer.php'); ?>