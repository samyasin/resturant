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
                            <th>Edit</th>
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
                      $sub_total = 0;
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
                        echo "<td><a href='delete_details.php?order_details_id={$row['order_details_id']}&order_id={$_GET['order_id']}' class='btn btn-danger'>Delete</a></td>";                        
                        echo "</tr>";
                        $x++;
                        $sub_total+= $total;
                    }

                    ?>
                    <tr>
                        <td>Tax (0.16) : </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <?php echo $sub_total ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Total: </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <?php echo $sub_total + ($sub_total * 0.16); ?>
                        </td>
                    </tr>  
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE-->
    </div>
</div>
</div>

<?php include('includes/admin_footer.php'); ?>