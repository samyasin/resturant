<?php
include('includes/connection.php');
include('includes/admin_header.php');
$rest_id = $_SESSION['admin_id'];

if(isset($_POST['submit'])){
    $category_name   = $_POST['category_name'];
    $category_image  = $_FILES['category_image']['name'];
    $rest_id         = $rest_id;

    $tmp_name        = $_FILES['category_image']['tmp_name'];
    move_uploaded_file($tmp_name, 'images/category/'.$category_image);

    $query = "insert into category(cat_name, cat_image,rest_id)
             values('$category_name','$category_image',$rest_id)";
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
                                    <div class="card-header">Manage Category</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Create Category</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Category Name</label>
                                                <input name="category_name" type="text" class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Category Image</label>
                                                <input name="category_image" type="file" class="form-control" >
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
                                                <th>Category</th>                     
                                                <th>Image</th>                     
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php
                                           $query ="select * from category where rest_id = {$_SESSION['admin_id']}";
                                           $result = mysqli_query($conn,$query);
                                           while($row  = mysqli_fetch_assoc($result)){
                                                echo '<tr>';
                                                echo "<td>{$row['cat_id']}</td>";
                                                echo "<td>{$row['cat_name']}</td>";
                                                echo "<td><img src='images/category/{$row['cat_image']}' width='100' height='160'/></td>";
                                                echo "<td><a href='edit_category.php?id={$row['cat_id']}' class='btn btn-warning'>Edit</a></td>";
                                                echo "<td><a href='delete_category.php?id={$row['cat_id']}' class='btn btn-danger'>Delete</a></td>";
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