<?php
 session_start();
 include('admin/includes/connection.php');
 include('includes/public_header.php'); ?> 

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
          <h2>Our Items</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <?php
      $query ="select * from items where rest_id = {$_SESSION['rest_id']} 
               AND cat_id = {$_GET['cat_id']}";      
      $result = mysqli_query($conn,$query);
      while($row  = mysqli_fetch_assoc($result)){ 
        echo "<a href='single_item.php?item_id={$row['item_id']}'>";
      	echo '<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mar_bottom">
        <div class="blog_box">
          <div class="blog_img_box">';
       echo "<figure><img src='admin/images/item/{$row['item_image']}' width='348' height='232'/>
            </figure>
          </div>";	
       echo "<div class='row'><div class='col-lg-6 col-md-6'><h3>{$row['item_name']}</h3></div>
            <div  class='col-lg-6 col-md-6'><h3>{$row['item_price']} JD</h3></div>
           </div></div></a></div>";
      }?>
      
       
      
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