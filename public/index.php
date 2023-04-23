<?php
require_once 'includes/header.php';
require_once 'includes/sidenav.php';
?>
<main class="section_01">
  <div class="">
    <div class="">
      <div class="">
        <div class="image_box">
          <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="components/img/carousal_images/1.1.jpg" class="d-block w-100" alt="..." />
              </div>
              <div class="carousel-item">
                <img src="components/img/carousal_images/1.2.jpg" class="d-block w-100" alt="..." />
              </div>
              <div class="carousel-item">
                <img src="components/img/carousal_images/1.4.jpg" class="d-block w-100" alt="..." />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
</div>
</div>

<main class="section_02">
  <div class="container mt-5">
    <h3 class="deals"> Latest Products</h3>
    <div class="line_horizontal mb-5"></div>
    <div class="product_list">
      <div class="col-md-12">
        <div class="row">
          <?php
          $data = $product->selectProductsRandomly();
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
          ?>
        </div>
      </div>
</main>

<main class="section_03">
  <div class="side_images">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-6 col-sm-12">
          <div class="half_image_box">
            <div class="image_rectangle">
              <img src="components/img/5.1-1920x785.JPG" alt="" class="image_card_img">
            </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-12">
          <div class="half_image_box">
            <div class="image_rectangle">
              <img src="components/img/charge-4.JPG" alt="" class="image_card_img JBL">
              <h4 class="top_link">portable bluetooth speakers</h4>
              <h4 class="tagline">take the music anywhere</h4>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</main>
<main class="section_04">
  <div class="container mt-5">
    <h3 class="deals"> Best Mobile Accessories </h3>
    <div class="line_horizontal mb-4"></div>
    <div class="product_list">
      <div class="col-md-12">
        <div class="row">
          <?php
          $data = $product->selectProductsRandomlyBYcategory();
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
          ?>
      </div>
    </div>
</main>
<main class="section_03">
  <?php
  $data = $product->selectOneProductsRandomly();
  ?>
  <div class="container mt-5">
    <div class="side_images">
      <h3>OUR BRANDS</h3>
      <div class="line_horizontal mb-5"></div>
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-6 col-sm-12">
            <h4 class="text_uppercase">THE ALL NEW <?= $data['product_name'] ?> SERIES </h4>
            <div class="half_image_box brand_sec">
              <div class="image_rectangle brand_sec_img">

                <img src="../Admin/Library/PHP/<?= $data['image_2'] ?>" alt="" class="image_card_img">
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-12">
            <h4 class="text-center text_uppercase">Our Brands </h4>
            <div class="brand_images">
              <div class="logo_brand image_1">
                <img class="brndImg" src="../public/components/img/brands/xiaomi-sri-lanka-simplytek.webp" alt="">
              </div>
              <div class="logo_brand image_2">
                <img class="brndImg" src="../public/components/img/brands/google-sri-lanka-simplytek.webp" alt="">
              </div>
              <div class="logo_brand image_3">
                <img class="brndImg" src="../public/components/img/brands/samsung-sri-lanka-simplytek.webp" alt="">
              </div>
              <div class="logo_brand image_4">
                <img class="brndImg" src="../public/components/img/brands/realme-sri-lanka-simplytek-1.webp" alt="">
              </div>
              <div class="logo_brand image_5">
                <img class="brndImg" src="../public/components/img/brands/Amazfit-sri-lanka-simplytek.webp" alt="">
              </div>
              <div class="logo_brand image_6">
                <img class="brndImg" src="../public/components/img/brands/JBL-sri-lanka-simplytek.webp" alt="">
              </div>
              <div class="logo_brand image_7">
                <img class="brndImg" src="../public/components/img/brands/oneplus-sri-lanka-simplytek-scaled.webp" alt="">
              </div>
              <div class="logo_brand image_8">
                <img class="brndImg" src="../public/components/img/brands/amazon-sri-lanka-simplytek-scaled.webp" alt="">
              </div>
              <div class="logo_brand image_9">
                <img class="brndImg" src="../public/components/img/brands/70mai-sri-lanka-simplytek.webp" alt="">
              </div>
              <div class="logo_brand image_10">
                <img class="brndImg" src="../public/components/img/brands/apple-sri-lanka-simplytek.webp" alt="">
              </div>
              <div class="logo_brand image_10">
                <img class="brndImg" src="../public/components/img/brands/anker-sri-lanka-simplytek.jpeg" alt="">
              </div>
              <div class="logo_brand image_10">
                <img class="brndImg" src="../public/components/img/brands/haylou-sri-lanka.webp" alt="">
              </div>
              <div class="logo_brand image_10">
                <img class="brndImg" src="../public/components/img/brands/UiiSii-Headphones-Sri-Lanka-SimplyTek.webp" alt="">
              </div>
              <div class="logo_brand image_10">
                <img class="brndImg" src="../public/components/img/brands/Sony.webp" alt="">
              </div>
              <div class="logo_brand image_10">
                <img class="brndImg" src="../public/components/img/brands/Soundpeats-sri-lanka-simplytek-5.webp" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<?php
include 'includes/footer.php';
?>