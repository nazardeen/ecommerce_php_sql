<?php
require_once '../public/includes/checksession.php';

include 'includes/header.php';
include 'includes/sidenav.php';
$cuID = '';
if (isset($_SESSION['email'])) {

    $cuID = $customer_id;
}

// require '../app/classes/product.class.php';


?>
<main class="section_01 cart_section" style="height: 100vh;">
    <?php

    $cartData = $product->selectCartItems($cuID);

    if ($cartData) {
    ?>
        <div class="row">
            <div class="col-md-8 col-sm-12">

                <div class="table-responsive-md">
                    <table class="table">
                        <thead class="text-center">
                            <tr>
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Final Total (LKR)</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            foreach ($cartData as $row) {

                            ?>


                                <tr>
                                    <td class="imageclass">
                                        <img src="../app/library/<?= $row['image'] ?>" />
                                        <input type="hidden" class="item_code" name="cart_id[]" required readonly value="<?= $row['cart_id'] ?>">
                                    </td>
                                    <td>
                                        <strong><?= $row['product_name'] ?></strong>
                                        <p id="proDescription" name="proDescription"><?= $row['product_description'] ?></p>
                                    </td>
                                    <td>

                                        <input type="text" class="sellingprice" name="Price[]" required readonly value="<?= $row['sellingPrice'] ?>">
                                    </td>
                                    <td>
                                        <input type="number" min="1" class="itemQty" name="Quantity[]" required value="<?= $row['qty'] ?>">
                                    </td>
                                    <td class="ProdTotCost">
                                        <span>Rs.</span><input type="text" class="finalTot" name="finalTotal" required readonly value="<?= $row['qty'] * $row['sellingPrice'] ?>.00">
                                    </td>
                                    <td class="ProdTotCost">
                                        <button class="btn btn-danger removeBtn"><i class='bx bx-trash'></i></button>
                                    </td>
                                </tr>


                            <?php
                            }

                            ?>

                            <tr class="finaltotalTR">
                                <td class="text-center italic_font" colspan="4">Final Total</td>
                                <td id="finalToTVal" class="italic_font" colspan="2">
                                    <span>Rs.</span><input id="CartTotal" type="text" class="CartTotal italic_font" name="finalTotal" required readonly>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- col -md-4 col-sm-12 col-lg-12 tags  -->
            <div class="col-md-12 col-sm-12 col-lg-3">

                <div class="cart_details_box">
                    <h4>Cart Details</h4>

                    <!-- subtotal details  -->
                    <div class="subtotal_info d-flex justify-content-between mt-3">
                        <h4>Subtotal</h4>
                        <h4 id="subtotal" class="totalCheckout"></h4>
                    </div>

                    <div class="hr_line"></div>

                    <!-- shipping details  -->
                    <div class="subtotal_info mt-3">
                        <div class="row">
                        </div>
                        <h4>Shipping</h4>
                        <ul class="nav flex-column ml-4">
                            <li class="">
                                <a class="details" aria-current="page" href="#">Active</a>
                            </li>
                            <li class="">
                                <p class="details">Delivery</p>
                            </li>
                            <li class="">
                                <p class="details">(3-4 Working Days): Rs.350.00</p>
                            </li>
                            <li class="">
                                <p class="details">Store Pick Up</p>
                                <p class="details">Shipping Options will be updated during <strong>checkout</strong></p>
                            </li>
                        </ul>
                    </div>
                    <div class="hr_line"></div>


                    <div class="checkoutBTN">
                        <div class="subtotal_info d-flex justify-content-between mt-3">
                            <h4>Final Total</h4>
                            <h4 id="subtotal" class="totalCheckout"></h4>
                        </div>
                        <button class="button_master btn_primary" id="checkoutButton">Checkout</button>
                    </div>
                </div>

                <div id="loading" style="display: none;" class="loadinggif"></div>

            </div>
            <!-- col -md-4 tags end -->
        </div>


    <?php

    } else {
    ?>
        <div class="container ">
            <div class="noitem">
                <h4 class="text-center italic_font">There's No Items in Cart</h4>
                <a href="mobilephones" class="button_master green_primary">Continue Shopping</a>
            </div>
        </div>
    <?php
    }
    ?>
    </div>
    </div>

</main>

<style>
    #loading {

        text-align: center;
        background: url('uploads/loading.gif') no-repeat center;
        height: 60px;
    }
</style>

<?php
include 'includes/footer.php';
?>


<script>
    FinalTotalCart();
    // sum of qty ++++++++++++++++++++

    $(".itemQty").on('change', function() {

        var $el = $(this).closest('tr');
        var $finalTotal = Number($el.find(".itemQty").val()) * Number($el.find(".sellingprice").val());

        $el.find(".finalTot").val($finalTotal + ".00");

        var ftotal = 0;
        $('.finalTot').each(function() {


            ftotal += parseInt($(this).val());

        });
        $('#CartTotal').val(ftotal + ".00");
        $('.totalCheckout').text("Rs. " + ftotal + ".00");

    });

    // sum of qty +++++++++++++++++++


    // total price in table column 

    function FinalTotalCart() {
        var ftotal = 0;
        $('.finalTot').each(function() {


            ftotal += parseInt($(this).val());

        });
        $('#CartTotal').val(ftotal + ".00");
        $('.totalCheckout').text("Rs. " + ftotal + ".00");

        console.log(ftotal);
    }

    $(".removeBtn").click(function() {

        var $el = $(this).closest('tr');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#0e62a2',
            cancelButtonColor: '#eb2f64',
            confirmButtonText: 'Remove from cart'
        }).then((result) => {
            if (result.isConfirmed) {

                $(this).parents("tr").remove();


                // decrement final total when remove row 
                FinalTotalCart();
                $.ajax({
                    type: "POST",
                    url: "../app/includes/products/productsController.php",
                    data: {
                        item_code: $el.find(".item_code").val(),
                        form_name: "delete_cart"
                    },
                    dataType: "JSON",
                    success: function(response) {

                        Swal.fire({
                            position: 'top-end',
                            toast: true,
                            icon: 'warning',
                            title: 'Removed Item From Cart',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                });
            }
        })
        // console.log($el.find(".item_code").val());



    });

    $("#checkoutButton").click(function() {

        var prices = $("input[name='Price[]']").map(function() {
            return $(this).val();
        }).get();
        var quantities = $("input[name='Quantity[]']").map(function() {
            return $(this).val();
        }).get();
        var cart_id = $("input[name='cart_id[]']").map(function() {
            return $(this).val();
        }).get();

        // console.log(cart_id);
        $.ajax({
            type: "POST",
            url: "../app/includes/products/productsController.php",
            data: {
                quantities: quantities,
                prices: prices,
                cart_id: cart_id,
                form_name: "update_cart"
            },
            success: function(data) {
                // alert(data);
                console.log(data);
                $("#loading").fadeIn();
                setTimeout(loadHome, 2000);
                // Swal.fire({
                //     position: 'top-end',
                //     toast: true,
                //     icon: 'warning',
                //     title: 'Removed Item From Cart',
                //     showConfirmButton: false,
                //     timer: 1500
                // });
            }
        });



    });

    function loadHome() {

        window.location = "checkout.php";
    }
</script>