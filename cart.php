<?php
session_start();  
include('admin/includes/connection.php');

if(isset($_POST['submit'])){
  $date = date("Y-m-d");
  $query = "insert into orders(order_date,rest_id, table_id) 
            values('$date',{$_SESSION['rest_id']}, {$_SESSION['table_number']})";
  mysqli_query($conn, $query);          
  $last_id = mysqli_insert_id($conn);

 foreach ($_SESSION['items'] as  $value) {
    $query = "insert into order_details(order_id,item_id,qty)
            values($last_id,{$value['item_id']},{$value['qty']})";  
    mysqli_query($conn,$query);
    unset($_SESSION['items']);
    header("location:thanks.php");
 }  
}
include('includes/public_header.php');
?>

<!-- start slider section -->

<!-- about -->

<!-- end about -->

<!-- blog -->
<div class="blog">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="title">
          <i><img src="images/title.png" alt="#"/></i>
          <h2>Cart Information</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Item Name</th>
              <th scope="col">Item Image</th>
              <th scope="col">Item Price </th>
              <th scope="col">Qty</th>
              <th scope="col">Total</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
           
        <?php
        $x = 1;
        $sub_total = 0;
        foreach ($_SESSION['items'] as  $value) {
          $query ="select * from items where item_id = {$value['item_id']}";
          $result = mysqli_query($conn,$query);
          while($row  = mysqli_fetch_assoc($result)){
            echo '<tr>';
            echo "<td>{$x}</td>";
            echo "<td>{$row['item_name']} </td>";
            echo "<td><figure><img src='admin/images/item/{$row['item_image']}' width='160' height='100'/>
            </figure></td>";
            echo "<td>{$row['item_price']}</td>";
            echo "<td>{$value['qty']}</td>";
            $total = $row['item_price']*$value['qty'];
            echo "<td>{$total}</td>";
            echo "<td><a href='delete_from_cart.php?item_id={$value['item_id']}' class='btn btn-danger'>Delete</a></td>";
            echo '<tr>';            
            $x++;
            $item_total = $row['item_price'] * $value['qty'];
            $sub_total+=$item_total;
          }  
        }
        echo "<tr>";
        echo "<th>Tax(0.16): </th>";
        echo "<td> </td>";
        echo "<td> </td>";
        echo "<td> </td>";
        echo "<td> </td>";
        echo "<td> </td>";
        echo "<th>".$sub_total*0.16 ."</th>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>sub Total: </th>";
        echo "<td> </td>";
        echo "<td> </td>";
        echo "<td> </td>";
        echo "<td> </td>";
        echo "<td> </td>";
        echo "<th>$sub_total </th>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>Total: </th>";
        echo "<td> </td>";
        echo "<td> </td>";
        echo "<td> </td>";
        echo "<td> </td>";
        echo "<td> </td>";
        $net = $sub_total + ($sub_total*0.16);
        echo "<th>$net </th>";
        echo "</tr>";
        ?>
        </tbody>
        </table>
      </div>      
              <form action="" method="post">                
                <input type="submit" name="submit" value="Order Now" class="btn btn-danger mt-5 float-right">
              </form>
            </div>          
          </div>
        </div>
      </div>
      <!-- end blog -->
      </div>
    <!-- footer -->
    
  </div>
</div>
<div class="overlay"></div>
<!-- Javascript files-->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/custom.js"></script>
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>

<script src="js/jquery-3.0.0.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $("#sidebar").mCustomScrollbar({
      theme: "minimal"
    });

    $('#dismiss, .overlay').on('click', function() {
      $('#sidebar').removeClass('active');
      $('.overlay').removeClass('active');
    });

    $('#sidebarCollapse').on('click', function() {
      $('#sidebar').addClass('active');
      $('.overlay').addClass('active');
      $('.collapse.in').toggleClass('in');
      $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });
  });
</script>

<style>
  #owl-demo .item{
    margin: 3px;
  }
  #owl-demo .item img{
    display: block;
    width: 100%;
    height: auto;
  }
</style>


<script>
 $(document).ready(function() {
   var owl = $('.owl-carousel');
   owl.owlCarousel({
     margin: 10,
     nav: true,
     loop: true,
     responsive: {
       0: {
         items: 1
       },
       600: {
         items: 2
       },
       1000: {
         items: 5
       }
     }
   })
 })
</script>

</body>

</html>