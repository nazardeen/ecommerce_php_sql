<?php
include 'includes/header.php';
include 'includes/sidenav.php';
require_once '../app/classes/product.class.php';

$product = new Product();
$itemcode = $_GET['item_id'];
$username = "";


$cusID = "no customer id";

if ($_SESSION) {
    $username =  $_SESSION['email'];

    if ($customer_id == "") {
        echo $cusID;
    } else {
        $cusID = $customer_id;
    }
}


?>
<main class="container section_01" style="min-height:100vh">
    <div class="item_info_section">
        <div class="item_images">
            <?php
            $data = $product->selectProductDetails($itemcode);
            ?>
            <div class="container">
                <div class="mySlides">
                    <img src="../Admin/Library/PHP/<?= $data['image'] ?>" style="width:100%">
                </div>

                <div class="mySlides">
                    <img src="../Admin/Library/PHP/<?= $data['image_2'] ?>" style="width:100%">
                </div>

                <a class="prev" onclick="plusSlides(-1)">❮</a>
                <a class="next" onclick="plusSlides(1)">❯</a>

                <div class="row">
                    <div class="column">
                        <img class="demo cursor" src="../Admin/Library/PHP/<?= $data['image'] ?>" style="width:100%" onclick="currentSlide(1)" alt="The Woods">
                    </div>
                    <div class="column">
                        <img class="demo cursor" src="../Admin/Library/PHP/<?= $data['image_2'] ?>" style="width:100%" onclick="currentSlide(2)" alt="Cinque Terre">
                    </div>
                </div>
            </div>

        </div>

        <div class="item_details">
            <input type="hidden" id="customer_ID" value="<?= $cusID; ?>">
            <input type="hidden" id="item_code" value="<?= $itemcode ?>">
            <h2 class="itemname"><?= $data['product_name'] ?></h2>
            <h3 class="itemPrice">Rs.<?= number_format($data['retail_price']) ?></h3>
            <input type="hidden" id="price" value="<?= $data['retail_price'] ?>">
            <ul class="item_desc">
                <li class="item_desc_list">
                    <span class="items_desc_attr">Display: <span class="desc_detail"><?= $data['display'] ?>″ Screen</span></span>
                </li>
                <li class="item_desc_list">
                    <span class="items_desc_attr">Battery: <span class="desc_detail"><?= $data['Battery'] ?>mAh</span></span>
                </li>
                <li class="item_desc_list">
                    <span class="items_desc_attr">Ram : <span class="desc_detail"><?= $data['ram'] ?>GB</span></span>
                </li>
                <li class="item_desc_list">
                    <span class="items_desc_attr">Storage : <span class="desc_detail"><?= $data['storage'] ?>GB</span></span>
                </li>
            </ul>
            <h2 class="warranty">Warranty : <?= $data['warranty'] ?></h2>
            <?php

            $qty = $data['quantity'];
            if ($qty == 0) {
            ?>
                <span class="text-danger"><strong>Out of stock</strong></span>

            <?php
            } else {
            ?>

                <span class="text-success ">IN Stock : <?= $data['quantity'] ?></span>

            <?php
            }

            ?>
            <div class="addCartItem">

                <input type="number" name="qty" id="qty" class="form-control qty" min="1" value="1">
                <input type="hidden" id="qtyInstock" class="form-control qty" min="1" value=<?= $qty ?>>
                <button id="addCart" class="btn_primary_rounded">Add To Cart</button>
                <?php

                if ($username != "") {
                ?>
                    <input type="hidden" id="username" value="<?= $username ?>">
                <?php
                } else {
                ?>
                    <input type="hidden" id="username">
                <?php
                }


                ?>
            </div>
        </div>
    </div>
</main>
</div>
</div>

<?php
include 'includes/footer.php';

?>
<script>
    $("#qty").keypress(function(e) {
        //if the letter is not digit then display error and don't type anything
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            //display error message
            Swal.fire({
                icon: 'error',
                title: 'Should contain only Digits!',
                showConfirmButton: false,
                timer: 1500,
                toast: 'true'
            })
            return false;
        }
    });

    // add to cart details
    if ($("#qtyInstock").val() == 0) {

        $('.addCartItem').hide();

    }


    $username = $("#username").val();

    if ($username != "") {

        $("#addCart").click(() => {

            $finalTotal = $("#qty").val() * $("#price").val();

            if (parseInt($("#qtyInstock").val()) < parseInt($("#qty").val())) {
                Swal.fire({
                    icon: 'warning',
                    toast: true,
                    title: 'Enter Correct Quanitity',
                    text: 'you have been entered incorrect quantity value'
                });

                $("#qty").val(1);

            } else {

                $.ajax({
                    type: "POST",
                    url: "../app/includes/products/productsController.php",
                    dataType: "JSON",
                    data: {

                        customer_ID: $("#customer_ID").val(),
                        product_id: $("#item_code").val(),
                        qty: $("#qty").val(),
                        FinalTotal: $finalTotal,
                        form_name: "addtoCart"

                    },
                    success: function(data) {
                        Swal.fire({
                            icon: 'success',
                            title: 'one Item Added to Cart Successfully!',
                            text: 'Continue Shopping with us.',
                            footer: '<a class="btn btn-dark mr-4" href="home">Continue Shopping</a> <a class="btn btn-success ml-4" href="cart">View Cart</a> '
                        });
                    }
                });
            }


        });

    } else {
        Swal.fire({
            icon: 'warning',
            title: 'Login to Continue',
            text: 'Continue Shopping with us.',
            footer: '<a class="button_master green_primary btn-sm mr-4" href="customerLogin">Sign IN',
            cancelButton: true
        });
        $("#addCart").hide();
    }
</script>

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

<script>
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        var captionText = document.getElementById("caption");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        // captionText.innerHTML = dots[slideIndex - 1].alt;
    }
</script>
</body>

</html>