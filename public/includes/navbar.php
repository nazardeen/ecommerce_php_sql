<?php

session_start();
require '../app/classes/product.class.php';

$product = new Product();

if (isset($_SESSION['email'])) {

  $data = $product->currentUser($_SESSION['email']);
  $customer_id = $data['customer_id'];
  $full_name = $data['full_name'];
  $mobile_number = $data['mobile_number'];
  $email = $data['email'];
  $gender = $data['gender'];
  $bday = $data['bday'];
  $Address = $data['Address'];
  $image = $data['image'];
}

?>

<body>
  <!-- ========================= top bar ====================== -->
  <div class="top_bar">
    <div class="container">
      <div class="items-bar">
        <div class="item-1">
          <span>Your Trusted Cellentric Mobile Store</span>
        </div>
        <div class="item-2">
          <i class="bx bxl-facebook"></i>
          <i class="bx bxl-instagram"></i>
        </div>
        <div class="item-3">
          <a href="#">contact us</a>
        </div>
      </div>
    </div>
  </div>
  <!-- ===================================== header =================== -->

  <div class="container_css">
    <header class="header">
      <div class="top_menu">
        <div class="top_menu_menu" onclick="openSidenav()">
          <i class="bx bx-menu-alt-left"></i>
          <h4>MENU</h4>
        </div>
      </div>
      <a href="home"><img src="components/img/Logo.png" alt="cellentric logo" class="logo" /></a>
      <form action="searchResults" class="search" method="POST">
        <input type="text" class="search_input" name="searchproducts" placeholder="Search Products" />
        <button class="search_button">
          <i class="bx bx-search"></i>
        </button>
      </form>
      <?php
      if (isset($_SESSION['email'])) {
        $username =  $_SESSION['email'];
        $arr1 = explode(" ", $full_name);
        $arr2 = str_split($arr1[0],1);
        $arr3 = str_split($arr1[1],1);
      ?>
        <div class="dropdown">
          <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="../app/includes/user/<?= $image ?>" width="50" class="image_rounded" alt=""><span class="ml-2"><?= $arr2[0]."".$arr3[0]  ?></span>
          </a>

          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="UserManage">Manage Profile</a></li>
            <li><a class="dropdown-item" href="orderhistory">Order History</a></li>
            <li><a class="dropdown-item" href="includes/logout.php">Logout</a></li>
          </ul>
        </div>



      <?php

      } else {

      ?>
        <div class="user_login">
          <div class="user_login_link">
            <a href="customerLogin" class="login_btn">Login</a>
          </div>
          <div class="user_login_link">
            <a class="login_btn">/</a>
          </div>
          <div class="user_login_link">
            <a href="customerLogin" class="login_btn">Register</a>
          </div>
        </div>

      <?php
      }



      ?>
      <div class="user-nav">
        <div class="icon_box">
          <a class="nav-link" href="cart"><i class="bx bx-cart"></i></a>
          <?php
          if (isset($_SESSION['email'])) {
            $username =  $_SESSION['email'];



            $data = $product->selectCartCount($customer_id);

            if ($data['cusCount'] != 0) {
          ?>
              <span class="cart_notification"><?= $data['cusCount'] ?></span>


            <?php
            } else {
            ?>
              <span class="cart_notification">0</span>
            <?php
            }
          } else {
            ?>
            <span class="cart_notification">0</span>
          <?php
          }
          session_write_close();
          ?>
        </div>
        <!-- <div class="icon_box">
          <span class="price_RS">Rs.0.00</span>
        </div> -->
      </div>
    </header>
    <div class="menu_top menu_line">
      <div class="category">
        <div class="category_menu">
          <a href="#" class="link"><i class="bx bx-menu-alt-left"></i>
            <h4>MENU</h4>
          </a><span class="chevron_icon"><i class="bx bx-chevron-down"></i></span>
        </div>
      </div>
      <nav class="menu_inline">
        <nav class="menu_top">
          <ul class="menu_nav">
            <li class="menu_li_item">
              <a href="home" class="Top_menu_link">Home</a>
            </li>
            <li class="menu_li_item">
              <a href="aboutus" class="Top_menu_link">About US</a>
            </li>
            <li class="menu_li_item">
              <a href="contactus" class="Top_menu_link">Contact US</a>
            </li>
          </ul>
        </nav>
      </nav>
    </div>
    <div class="mobile_side_navbar">
      <nav class="Mobile_navbar" id="Mobile_navbar">
        <ul class="side-nav">
          <div class="mobile_sidenav">
            <div class="mobile_sidenav_menu" onclick="openSidenav()">
              <a href="#" class="link"><i class="bx bx-menu-alt-left"></i>
                <h4>MENU</h4>
              </a><span class="chevron_icon"><i class="bx bx-chevron-down"></i></span>
            </div>
          </div>
          <li class="side-nav_item"><a href="#" class="link">Brands</a></li>
          <li class="side-nav_item">
            <a href="#" class="link">Mobile Phones</a>
          </li>
          <li class="side-nav_item">
            <a href="#" class="link">Mobile Phones Accessories</a>
          </li>
          <li class="side-nav_item">
            <a href="#" class="link">Headset and Headphones</a>
          </li>
          <li class="side-nav_item">
            <a href="#" class="link">Smart Devices</a>
          </li>
          <li class="side-nav_item"><a href="#" class="link">Speakers</a></li>
        </ul>

        <div class="user_login_mobile">
          <div class="row">
            <?php
            if (isset($_SESSION['email'])) {
              $username =  $_SESSION['email'];
            ?>

              <div class="user_menu">

              </div>

            <?php
            } else {
            ?>
              <a href="#" class="btn_primary">Login</a>
              <a href="#" class="btn_primary">Register</a>

            <?php


            } ?>

          </div>
        </div>
      </nav>
    </div>


    <script>
      closeNav();

      function openSidenav() {
        var element = document.getElementById("Mobile_navbar");
        element.classList.toggle("Mobile_navbar_active");
        console.log("clicked");
      }

      function closeNav() {
        var ele = document.getElementById("body");
        ele.classList.remove("Mobile_navbar_active");
      }
    </script>