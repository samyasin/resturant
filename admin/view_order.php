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
                        <div class="card-header">View Order
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
                            <th>Name</th>
                            <th>Image</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                      $query = "select * from order_details 
                                INNER JOIN items ON 
                                order_details.item_id = items.item_id
                                where order_id = {$_GET['order_id']}";
                               // echo $query;
                      $x = 1;
                      $result = mysqli_query($conn,$query);
                      while($row = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td>{$x}</td>";
                        echo "<td>{$row['item_name']}</td>";                
                        echo "<td><figure><img src='images/item/{$row['item_image']}' width='160' height='100'/>
                            </figure></td>"; 
                        echo "<td>{$row['qty']}</td>";                   
                        echo "<td>{$row['item_price']}</td>";
                        $total = $row['qty'] * $row['item_price'];      
                        echo "<td>{$total}</td>";
                        echo "</tr>";
                        $x++;
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