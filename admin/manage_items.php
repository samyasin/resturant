<?php
include('includes/connection.php');
include('includes/admin_header.php');
$rest_id = $_SESSION['admin_id'];

if(isset($_POST['submit'])){
    $item_name   = $_POST['item_name'];
    $item_price  = $_POST['item_price'];
    $item_desc   = $_POST['item_desc'];
    $item_image  = $_FILES['item_image']['name'];
    $cat_id      = $_POST['cat_id'];
    $rest_id     = $rest_id;

    $tmp_name        = $_FILES['item_image']['tmp_name'];
    move_uploaded_file($tmp_name, 'images/item/'.$item_image);

    $query = "insert into items(item_name, item_price, item_desc, item_image, cat_id, rest_id)
             values('$item_name','$item_price','$item_desc','$item_image',$cat_id,$rest_id)";
             echo $query;
    mysqli_query($conn,$query);
}
 ?>
 
<!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Manage Items</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Create Item</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Item Name</label>
                                                <input name="item_name" type="text" class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Item Price</label>
                                                <input name="item_price" type="text" class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Item desc</label>
                                                <input name="item_desc" type="text" class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Item Image</label>
                                                <input name="item_image" type="file" class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Choose Category</label>
                                                <select name="cat_id" class="form-control" >
                                                <?php
                                                $query ="select * from category where rest_id = {$_SESSION['admin_id']}";
                                           $result = mysqli_query($conn,$query);
                                           while($row  = mysqli_fetch_assoc($result)){
                                            echo "<option value='{$row['cat_id']}'>{$row['cat_name']}</option>";
                                           }
                                                     ?>
                                                </select>
                                            </div>
                                            
                                            
                                            
                                            <div>
                                                <button name="submit" id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="submit">
                                                   Save
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            </div>
                      
                <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>                     
                                                <th>Price</th>                     
                                                <th>image</th>                     
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php
                                           $query ="select * from items where rest_id = {$_SESSION['admin_id']}";
                                           $result = mysqli_query($conn,$query);
                                           while($row  = mysqli_fetch_assoc($result)){
                                                echo '<tr>';
                                                echo "<td>{$row['item_id']}</td>";
                                                echo "<td>{$row['item_name']}</td>";
                                                echo "<td>{$row['item_price']}</td>";
                                                echo "<td><img src='images/item/{$row['item_image']}' width='100' height='160'/></td>";
                                                echo "<td><a href='edit_item.php?id={$row['cat_id']}' class='btn btn-warning'>Edit</a></td>";
                                                echo "<td><a href='delete_item.php?id={$row['cat_id']}' class='btn btn-danger'>Delete</a></td>";
                                                echo '</tr>';
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