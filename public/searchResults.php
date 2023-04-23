<?php
session_start();
// var_dump($_SESSION);
if ($_POST['searchproducts'] != "") {
} else {
  //  header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
  header('location: index.php');
  exit();
}

session_write_close();
include 'includes/header.php';
include 'includes/sidenav.php';

// require '../app/classes/product.class.php';

// $product = new Product();

?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<main class="section_01 minHeight">
  <div class="container mt-5">
<h6>Search Results : <span class="badge rounded-pill bg-light text-dark mt-3"><?= $_POST['searchproducts']?></span></h6>
    <div class="product_list mt-5">
      <div class="col-md-12">
        <div class="row">
          <?php
          if ($_POST['searchproducts'] != "") {
            $data = $product->searchProducts($_POST['searchproducts']);
            if ($data) {
              foreach ($data as $row) {
          ?>
                <div class="col-md-4">
                  <div class="image_card_outer_box">
                    <div class="image_box_card">
                      <img src="../Admin/Library/PHP/<?= $row['image'] ?>" alt="" class="image_card_img second_img">
                      <img src="../Admin/Library/PHP/<?= $row['image_2'] ?>" alt="" class="image_card_img first_img">
                    </div>
                    <div class="content_box_card">
                      <h4 class="product_name"><?= $row['product_name'] ?></h4>
                      <h3 class="product_price">Rs.<?= $row['retail_price'] ?>.00</h3>
                      <button class="button_master green_primary"><a href="item.php?item_id=<?= $row['item_code'] ?>">Add To Cart</a></button>
                    </div>
                  </div>
                </div>

              <?php
              }
            } else {
              ?>
              <div class="col-md-4">
                <h4 class="text-center">No Products Found</h4>
              </div>
          <?php
            }
          }
          ?>
        </div>
      </div>
    </div>
    <!-- filter products list  -->

    <div id="FilterPriceResults" style="display: none;"></div>
  </div>
</main>


</div>
</div>
<footer class="footer">
  <div class="footer_section">
    <div class="company_info">
      <ul class="footer_info">
        <li class="footer_link_item">
          <h1 class="footer_cellentric_logo">cellentric</h1>
        </li>
        <li class="footer_link_item">
          <i class='bx bxs-map'></i>
          <span>No. 10, Colombo Road, Colombo 05</span>
        </li>
        <li class="footer_link_item">
          <i class='bx bx-mobile-alt'></i>
          <span>+94 777 223 445 / +94 717 566 898</span>
        </li>
        <li class="footer_link_item">
          <i class='bx bx-mail-send'></i>
          <span>support@cellentric.com</span>
        </li>
      </ul>
    </div>
    <div class="category_menu_footer">
      <ul class="footer_info">
        <li class="category_footer_link_item">
          <h1 class="footer_category">Categories</h1>
        </li>
        <li class="category_footer_link_item">

          <a href="#">Brand</a href="#">
        </li>
        <li class="category_footer_link_item">

          <a href="mobilephones">Mobile Phones</a>
        </li>
        <li class="category_footer_link_item">

          <a href="mobilephoneaccessories">Mobile Phones Accessories</a>
        </li>
        <li class="category_footer_link_item">

          <a href="smartdevices">Smart Devices</a>
        </li>
        <li class="category_footer_link_item">

          <a href="SPEAKERS">Speakers</a>
        </li>
      </ul>
    </div>
    <div class="shopping">
      <ul class="footer_info">
        <li class="shopping_footer_link_item">
          <h1 class="footer_shopping">Shopping With US</h1>
        </li>
        <li class="shopping_footer_link_item">

          <a href="home">Home</a>
        </li>
        <li class="shopping_footer_link_item">

          <a href="aboutus">About Us</a>
        </li>
        <li class="shopping_footer_link_item">

          <a href="contactus">Contact Us</a>
        </li>
      </ul>
    </div>
    <div class="services">
      <ul class="footer_info">
        <li class="shopping_footer_link_item">
          <h1 class="footer_shopping">Services</h1>
        </li>
        <li class="shopping_footer_link_item">

          <a href="UserManage">My Account</a>
        </li>
        <li class="shopping_footer_link_item">

          <a href="orderhistory">After Sales Service</a>
        </li>
      </ul>
    </div>
    <div class="payment_logo">
      <ul class="footer_info">
        <li class="shopping_footer_link_item">
          <h1 class="footer_shopping">Payments Secured by</h1>
        </li>
        <li class="shopping_footer_link_item">

          <img src="components/img/Image 7.png" alt="">
        </li>
      </ul>

    </div>
  </div>
</footer>

<!-- script links  -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://unpkg.com/boxicons@2.0.9/dist/boxicons.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<!-- <script src="components/assets/js/script.js"></script> -->

<script>
  $("#filter").click(function() {

    $("#filter_list").slideToggle();
  });

  $(function() {
    $("#slider-range").slider({
      range: true,
      min: 0,
      max: 200000,
      values: [0, 200000],
      slide: function(event, ui) {
        $("#minamount").val(ui.values[0]);
        $("#maxamount").val(ui.values[1]);
      }
    });
    $("#amount").val("$" + $("#slider-range").slider("values", 0) +
      " - $" + $("#slider-range").slider("values", 1));
  });

  $("#filterbtn").click(function() {

    console.log($("#minamount").val());
    console.log($("#maxamount").val());
    $('.product_list').hide().slow(2000);
  });

  $("#filterBrands").click(function() {

    $(".product_list").fadeOut();

  });




  $(document).ready(function() {

    $('.BrandCheck').click(function() {

      if ($(this).prop("checked") == true) {

        $checkVal = $(this).val();

      } else if ($(this).prop("checked") == false) {

        window.location = 'products.php';
      }

    });

    $("#rangeFilter").click(function() {

      $minValue = $("#minamount").val();
      $maxValue = $("#maxamount").val();

      if ($(".BrandCheck").prop("checked") == true) {

        $(".BrandCheck").prop("checked", false);

      } else {

        $.ajax({
          type: "POST",
          url: "../app/includes/products/productsController.php",
          data: {

            minVal: $("#minamount").val(),
            maxVal: $("#maxamount").val(),
            form_name: "filter_price"

          },
          success: function(response) {
            // console.log(response);


            $(".product_list").fadeOut();
            $("#FilterPriceResults").fadeIn();
            $('#FilterPriceResults').html(response);

            // for (let i = 0; i < response.length; i++) {
            //   console.log(response[i]);

            // }
          },
          error: function(xhr) {

            console.log(xhr.response);
          }
        });
      }

    });

  });
</script>
</body>

</html>