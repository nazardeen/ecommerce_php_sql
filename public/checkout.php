<?php

require_once '../public/includes/checksession.php';

include 'includes/header.php';
include 'includes/sidenav.php';





$countorder = $product->orderIDCount();
$orderid =  $countorder['orderID'];

if ($orderid == 0) {

    $orderid = "1000";
} else {
    $orderid = $orderid + 1;
}





// if (isset($_SESSION['email'])) {

//     $data = $product->currentUser($_SESSION['email']);
//     $customerid = $data['customer_id'];
// } else {
// }




?>

<style>
    .login_section {
        flex: 1;
    }

    .order {
        background-color: #f7f7f7;
        /* width: 68rem;
        height: 68rem; */
    }

    .heading_items {
        font-size: 6rem;
        text-transform: uppercase;
    }
</style>

<main class="login_section checkout_section">
    <!-- top bar checkout  -->
    <div class="main_bar">
        <div class="top_heading">
            <div class="heading_items">
                <a href="#">Shopping cart</a>
                <a>/</a>
                <a href="#">Checkout</a>
            </div>
        </div>
    </div>

    <!-- checkout part -->

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 col-sm-12">

                        <h6 class="text-center mt-5 form_header">Your Order</h6>
                        <input type="hidden" id="orderID" value="<?= $orderid ?>">
                        <input type="hidden" id="customer_ID" value="<?= $customer_id ?>">
                        <div class="Login_form register mb-5">
                            <?php
                            $cartData = $product->selectCartItems($customer_id);

                            if ($cartData) {
                            ?>
                                <div class="order">
                                    <table id="order_table" class="table order_table">
                                        <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Final Total (LKR)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            foreach ($cartData as $row) {

                                            ?>
                                                <tr>
                                                    <td><?= $row['product_name'] ?>
                                                        <input type="hidden" class="order_id" name="order_id[]" required value="<?= $orderid ?>">
                                                        <input type="hidden" class="item_code" name="item_code[]" required readonly value="<?= $row['item_code'] ?>">
                                                    </td>
                                                    <td><?= $row['sellingPrice'] ?>
                                                        <input type="hidden" class="selling_price" name="selling_price[]" required readonly value="<?= $row['sellingPrice'] ?>">
                                                    </td>
                                                    <td><?= $row['qty'] ?>
                                                        <input type="hidden" class="qty" name="quantity[]" required readonly value="<?= $row['qty'] ?>">
                                                    </td>
                                                    <td><?= $row['qty'] * $row['sellingPrice'] ?>.00
                                                        <input type="hidden" class="final_total" name="final_price[]" required readonly value="<?= $row['qty'] * $row['sellingPrice'] ?>">
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                            <tr class="finaltotalTR">
                                                <td class="text-center italic_font " colspan="3">Final Total</td>
                                                <td id="finalToTVal" class="italic_font" colspan="1">
                                                    <span>Rs.</span><input id="CartTotal" type="text" class="CartTotal italic_font" name="finalTotal" required readonly>
                                                    <span>Rs.</span><input id="totalQunatity" type="hidden" class="totalQuantity italic_font" name="totalQuantity" required readonly>
                                                </td>
                                            </tr>
                                        <?php

                                    } else {
                                        ?>
                                            <h6 class="text-center">There's No Items in Cart</h6>
                                        <?php
                                    }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">

                        <h4 class="text-center mt-5 form_header">Billing details</h4>

                        <div class="Login_form">

                            <div class="mb-3">
                                <h6>Fisrt name</h6>
                                <input type="text" id="firstName" placeholder="Fisrt Name" class="master_input">
                            </div>

                            <div class="mb-3">
                                <h6>Last name</h6>
                                <input type="text" id="lastName" placeholder="Last Name" class="master_input">
                            </div>

                            <div class="mb-3">
                                <h6>Street Address</h6>
                                <input type="text" id="stAddress" placeholder="House number and street address" class="master_input">
                            </div>

                            <div class="mb-3">
                                <h6>Town/City</h6>
                                <input type="text" id="town" placeholder="Town or City" class="master_input">
                            </div>

                            <div class="mb-3">
                                <h6>Postcode/ZIP</h6>
                                <input type="text" id="postcode" placeholder="Postcode or ZIP" class="master_input">
                            </div>

                            <div class="mb-3">
                                <h6>Email Address</h6>
                                <input type="email" id="email" placeholder="E-mail" name="email" class="master_input">
                            </div>

                            <div class="mb-3">
                                <h6>Mobile Number</h6>
                                <input type="text" id="mNumber" placeholder="Mobile Number" class="master_input" min="1" max="10">
                            </div>



                        </div>

                    </div>

                    <div class="col-md-6 col-sm-12">
                        <div class="payment_type">
                            <div class="card mainCard">
                                <div class="card-body">
                                    <h6 class="card-title">Select Payment Method</h6>
                                    <div class="card">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item" style="cursor: pointer;">
                                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                                    <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked value="card Payment">
                                                    <label id="creditLabel" class="button_master btn_primary" style="margin-right: 4px;" for="btnradio1">Credit / Debit Payment</label>

                                                    <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" value="cash on delivery">
                                                    <label id="cashdelivery" class="button_master btn_primary" for="btnradio2">Cash on Delivery</label>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="card_payment_form" style="display: none;">
                                                    <h6>Card Holders Name</h6>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <input type="text" aria-label="First name" id="holderfirstName" class="master_input" placeholder="First Name">

                                                        </div>
                                                        <div class="col-md-6"><input type="text" id="holderlastName" aria-label="Last name" class="master_input" placeholder="Last Name"></div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <h6>Card Number</h6>
                                                        <input type="text" id="cardNo" placeholder="Card No" class="master_input">
                                                    </div>
                                                    <div class="mb-3">
                                                        <h6>Expire Date</h6>
                                                        <div class="input-group ">
                                                            <?php
                                                            $date = date("Y-m-d");
                                                            $split = explode("-", $date);
                                                            $year = $split[0];
                                                            ?>
                                                            <input type="text" onkeypress="return MonthValidate(event)" id="month" placeholder="Month" class="master_input" style="width: 30%;margin-right:20px; ">
                                                            <input type="hidden" id="Thisyear" value="<?= $year ?>" placeholder="Year" class="master_input" style="width: 30%; margin-right:20px; ">
                                                            <input type="text" id="year" placeholder="Year" class="master_input" style="width: 30%; margin-right:20px; ">
                                                            <input type="text" id="csv" placeholder="CSV" class="master_input" style="width: 20%; margin-right:20px;">
                                                        </div>

                                                    </div>
                                                    <div class="mb-3">
                                                        <h6>Mobile Number</h6>
                                                        <input type="text" id="mobileNumber" placeholder="Mobile Number" class="master_input" min="1" max="10">
                                                    </div>


                                                </div>

                                                <div class="cash_on_delivery" style="display: none;">
                                                    <div class="mb-3">
                                                        <h6>Delivery Details</h6>
                                                        <p id="fullname"></p>
                                                        <p id="st"></p>
                                                        <p id="t"></p>
                                                        <p id="pc"></p>
                                                        <p id="emailAdd"></p>
                                                        <p id="contactno"></p>
                                                    </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="mb-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            Confirm Order Details
                                                            <p><small>agree to order details</small></p>
                                                        </label>
                                                    </div>
                                                </div>

                                            </li>
                                            <li id="continuebtn" class="list-group-item">
                                                <div class="mb-3">
                                                    <button class="button_master btn_primary" name="btnregister" id="checkoutContinue">Continue</button>
                                                </div>

                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

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

<?php
include 'includes/footer.php';

?>

<script>
    $(document).ready(function() {
        function formRefresh() {

            $("#firstName").val("");
            $("#lastName").val("");
            $("#stAddress").val("");
            $("#town").val("");
            $("#postcode").val("");
            $("#email").val("");
            $("#mNumber").val("");
            $("#holderfirstName").val("");
            $("#holderlastName").val("");
            $("#cardNo").val("");
            $("#month").val("");
            $("#year").val("");
            $("#csv").val("");
            $("#mobileNumber").val("");

        }
        // total price in table column 
        FinalTotalCart();
        TotalQunatity();

        function FinalTotalCart() {
            var ftotal = 0;
            $('.final_total').each(function() {


                ftotal += parseInt($(this).val());

            });
            $('#CartTotal').val(ftotal + ".00");

        }

        function TotalQunatity() {
            var totalQty = 0;
            $('.qty').each(function() {


                totalQty += parseInt($(this).val());

            });
            $('#totalQunatity').val(totalQty);

        }


        $("#continuebtn").hide();

        $("#flexCheckDefault").click(function() {


            if ($(this).prop('checked') == false) {
                $("#continuebtn").slideUp();

            } else {
                $("#continuebtn").slideDown();

            }
        });

    });
    $('#btnradio1').click(function() {

        $('.card_payment_form').slideDown();
        $("#creditLabel").addClass('green_primary');
        $("#cashdelivery").removeClass('green_primary');
    });
    $('#btnradio2').click(function() {

        $('.card_payment_form').slideUp();
        $('.cash_on_delivery').slideDown();
        $("#cashdelivery").addClass('green_primary');
        $("#creditLabel").removeClass('green_primary');
    });
    $("#firstName,#lastName").keyup(function() {

        $firstname = $("#firstName").val();
        $lastname = $("#lastName").val();
        $("#fullname").text($firstname + " " + $lastname);

    });
    $("#stAddress").keyup(function() {

        $("#st").text($(this).val());

    });
    $("#town").keyup(function() {

        $("#t").text($(this).val());

    });
    $("#postcode").keyup(function() {

        $("#pc").text($(this).val());

    });
    $("#email").keyup(function() {

        $("#emailAdd").text($(this).val());

    });
    $("#mNumber").keyup(function() {

        $("#contactno").text($(this).val());

    });


    // *********validation part of the checkout*************

    //start length validation
    $("input[name=mNumber]").attr("maxlength", "10");
    $("input[name=year]").attr("maxlength", "4");
    $("input[name=month]").attr("maxlength", "2");
    $("input[name=csv]").attr("maxlength", "3");
    $("input[name=mobileNumber]").attr("maxlength", "10");

    //end length validation


    $("#mNumber,#cardNo,#mobileNumber,#year,#month,#csv").keypress(function(e) {
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
    $("input[name=mNumber]").attr("maxlength", "10");

    // $('mNumber').keypress(function(e) {

    //     var arr = [];

    //     var kk = e.which;

    //     for (i = 48; i < 58; i++)

    //         arr.push();

    //     if (!(arr.indexOf(kk) >= 0))

    //         e.preventDefault();

    // });
    $('#firstName').keyup(function() {
        var $th = $(this);
        $th.val($th.val().replace(/[^a-zA-Z0-9]/g, function(str) {
            Swal.fire({
                icon: 'error',
                title: 'Please use only letters and numbers',
                showConfirmButton: false,
                timer: 1500,
                toast: 'true'
            })
            return false;


        }));
    });

    $("#mNumber,#mobileNumber").keypress(function(e) {
        if ($(this).val().length >= 10) {
            return false;
        }
    });

    $("#cardNo").keypress(function(e) {
        if ($(this).val().length >= 16) {
            return false;
        }
    });

    // month validate 
    function MonthValidate(e) {
        var currentChar = parseInt(String.fromCharCode(e.keyCode), 10);
        if (!isNaN(currentChar)) {
            var nextValue = $("#month").val() + currentChar; //It's a string concatenation, not an addition

            if (parseInt(nextValue, 10) <= 12) return true;
        }

        return false;
    }


    //   check year is larger than this year 

    $("#year").focusout(function() {

        var thisyear = parseInt($("#Thisyear").val());

        if (parseInt($(this).val()) < thisyear) {
            Swal.fire({
                icon: 'error',
                title: 'Enter Valid Year',
                showConfirmButton: false,
                timer: 1500,
                toast: 'true'
            });
            $(this).focus();
            return false;

        }

    });
    //check email validations

    function checkEmail() {

        var email = $("#email").val();

        if (email.indexOf("@") < 0 || email.indexOf(".") < 0) {

            //error message
            Swal.fire({
                icon: 'error',
                title: 'Invalid E-mail',
                showConfirmButton: false,
                timer: 1500,
                toast: 'true'
            });

        }
    }

    $("#email").focusout(function() {

        checkEmail();

    });
    //start of the validation for delivery details

    $("#checkoutContinue").on('click', function() {


        if ($("input[name=btnradio]:checked").val() == "card Payment") {

            var email = $("#email").val();

            if ($("#firstName").val() == "") {
                Swal.fire({
                    icon: 'error',
                    title: 'First Name Required',
                    showConfirmButton: false,
                    timer: 1500,
                    toast: 'true'
                });
            } else if ($("#lastName").val() == "") {
                Swal.fire({

                    icon: 'error',
                    title: 'Last Name Required',
                    showConfirmButton: false,
                    timer: 1500,
                    toast: 'true'
                });
            } else if ($("#stAddress").val() == "") {
                Swal.fire({

                    icon: 'error',
                    title: 'Street Address Required',
                    showConfirmButton: false,
                    timer: 1500,
                    toast: 'true'
                });
            } else if ($("#town").val() == "") {
                Swal.fire({

                    icon: 'error',
                    title: 'Town or City Required',
                    showConfirmButton: false,
                    timer: 1500,
                    toast: 'true'
                });
            } else if ($("#postcode").val() == "") {
                Swal.fire({

                    icon: 'error',
                    title: 'Postcode or ZIP Required',
                    showConfirmButton: false,
                    timer: 1500,
                    toast: 'true'
                });
            } else if ($("#email").val() == "") {
                Swal.fire({

                    icon: 'error',
                    title: 'E-mail Required',
                    showConfirmButton: false,
                    timer: 1500,
                    toast: 'true'
                });
            } else if ($("#mNumber").val() == "") {
                Swal.fire({

                    icon: 'error',
                    title: 'Contact Number Required',
                    showConfirmButton: false,
                    timer: 1500,
                    toast: 'true'
                });
            } else if (email.indexOf("@") < 0 || email.indexOf(".") < 0) {

                //error message
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid E-mail',
                    showConfirmButton: false,
                    timer: 1500,
                    toast: 'true'
                });

            } else if ($("#holderfirstName").val() == "") {
                Swal.fire({
                    icon: 'error',
                    title: 'First Name Required',
                    showConfirmButton: false,
                    timer: 1500,
                    toast: 'true'
                });
            } else if ($("#holderlastName").val() == "") {
                Swal.fire({

                    icon: 'error',
                    title: 'Last Name Required',
                    showConfirmButton: false,
                    timer: 1500,
                    toast: 'true'
                });
            } else if ($("#cardNo").val() == "") {
                Swal.fire({

                    icon: 'error',
                    title: 'Street Address Required',
                    showConfirmButton: false,
                    timer: 1500,
                    toast: 'true'
                });
            } else if ($("#month").val() == "") {
                Swal.fire({

                    icon: 'error',
                    title: 'Street Address Required',
                    showConfirmButton: false,
                    timer: 1500,
                    toast: 'true'
                });
            } else if ($("#Year").val() == "") {
                Swal.fire({

                    icon: 'error',
                    title: 'Street Address Required',
                    showConfirmButton: false,
                    timer: 1500,
                    toast: 'true'
                });
            } else if ($("#csv").val() == "") {
                Swal.fire({

                    icon: 'error',
                    title: 'Street Address Required',
                    showConfirmButton: false,
                    timer: 1500,
                    toast: 'true'
                });
            } else if ($("#mobileNumber").val() == "") {
                Swal.fire({

                    icon: 'error',
                    title: 'Street Address Required',
                    showConfirmButton: false,
                    timer: 1500,
                    toast: 'true'
                });
            } else {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Do You Need to place the order?",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#0e62a2',
                    cancelButtonColor: '#eb2f64',
                    confirmButtonText: 'Continue'
                }).then((result) => {
                    if (result.isConfirmed) {

                        // card payment details 
                        $cardHolderName = $("#firstName").val() + " " + $("#lastname").val();
                        $exp_date = $("#year").val() + "/" + $("#month").val();

                        // check payment method values *************************************
                        var paymentMethod = "";
                        var status = "";
                        if ($("input[name=btnradio]:checked").val() == "card Payment") {

                            paymentMethod = "Card Payment";
                            status = "complete";

                        } else if ($("input[name=btnradio]:checked").val() == "cash on delivery") {
                            paymentMethod = "Cash on Delivery";
                            status = "pending";
                        }
                        // get input values ====================================

                        var prices = $("input[name='selling_price[]']").map(function() {
                            return $(this).val();
                        }).get();
                        var quantities = $("input[name='quantity[]']").map(function() {
                            return $(this).val();
                        }).get();
                        var item_code = $("input[name='item_code[]']").map(function() {
                            return $(this).val();
                        }).get();
                        var order_id = $("input[name='order_id[]']").map(function() {
                            return $(this).val();
                        }).get();


                        var table_data = [];

                        // var sub = {

                        //     'qty':quantities,
                        //     'itemcode':item_code
                        // }

                        // table_data.push(quantities,item_code);

                        $.ajax({
                            type: "POST",
                            url: "../app/includes/products/deQty.php",
                            data: {

                                item_code: item_code,
                                quantities: quantities,
                            },
                            dataType: "JSON",
                            success: function(data) {

                            },
                            error: function(xhr) {

                                // console.log(xhr.responseText);
                            }
                        });


                        $.ajax({
                            type: "POST",
                            url: "../app/includes/products/productsController.php",
                            data: {

                                orderID: $('#orderID').val(),
                                customer_ID: $('#customer_ID').val(),
                                totalQunatity: $('#totalQunatity').val(),
                                CartTotal: $('#CartTotal').val(),
                                payment_method: paymentMethod,
                                item_code: item_code,
                                quantities: quantities,
                                order_id_items: order_id,
                                mNumber: $('#mNumber').val(),
                                status: status,

                                // billing info form 
                                fullName: $('#firstName').val(),
                                lastName: $('#lastName').val(),
                                cardNo: $('#cardNo').val(),
                                stAddress: $('#stAddress').val(),
                                town: $('#town').val(),
                                postcode: $('#postcode').val(),
                                email: $('#email').val(),
                                mNumber: $('#mNumber').val(),
                                holderfirstName: $('#holderfirstName').val(),
                                holderlastName: $('#holderlastName').val(),
                                cardNo: $('#cardNo').val(),
                                month: $('#month').val(),
                                year: $('#year').val(),
                                csv: $('#csv').val(),
                                mobileNumber: $('#mobileNumber').val(),


                                form_name: "add_order"
                            },
                            dataType: "JSON",
                            success: function(data) {

                                Swal.fire({
                                    icon: 'success',
                                    title: 'Your Order has been placed!',
                                    text: 'Redirecting to the home page!',
                                    showConfirmButton: false,
                                    timer: 1500,
                                    toast: 'true',

                                });
                                setTimeout(loadHome, 2000);

                            },
                            error: function(xhr) {

                                console.log(xhr.responseText);

                            }
                        });


                    }
                })
            }



        } else {
            var email = $("#email").val();

            if ($("#firstName").val() == "") {
                Swal.fire({
                    icon: 'error',
                    title: 'First Name Required',
                    showConfirmButton: false,
                    timer: 1500,
                    toast: 'true'
                });
            } else if ($("#lastName").val() == "") {
                Swal.fire({

                    icon: 'error',
                    title: 'Last Name Required',
                    showConfirmButton: false,
                    timer: 1500,
                    toast: 'true'
                });
            } else if ($("#stAddress").val() == "") {
                Swal.fire({

                    icon: 'error',
                    title: 'Street Address Required',
                    showConfirmButton: false,
                    timer: 1500,
                    toast: 'true'
                });
            } else if ($("#town").val() == "") {
                Swal.fire({

                    icon: 'error',
                    title: 'Town or City Required',
                    showConfirmButton: false,
                    timer: 1500,
                    toast: 'true'
                });
            } else if ($("#postcode").val() == "") {
                Swal.fire({

                    icon: 'error',
                    title: 'Postcode or ZIP Required',
                    showConfirmButton: false,
                    timer: 1500,
                    toast: 'true'
                });
            } else if ($("#email").val() == "") {
                Swal.fire({

                    icon: 'error',
                    title: 'E-mail Required',
                    showConfirmButton: false,
                    timer: 1500,
                    toast: 'true'
                });
            } else if ($("#mNumber").val() == "") {
                Swal.fire({

                    icon: 'error',
                    title: 'Contact Number Required',
                    showConfirmButton: false,
                    timer: 1500,
                    toast: 'true'
                });
            } else if (email.indexOf("@") < 0 || email.indexOf(".") < 0) {

                //error message
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid E-mail',
                    showConfirmButton: false,
                    timer: 1500,
                    toast: 'true'
                });

            } else {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Do You Need to place the order?",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#0e62a2',
                    cancelButtonColor: '#eb2f64',
                    confirmButtonText: 'Continue'
                }).then((result) => {
                    if (result.isConfirmed) {

                        // card payment details 
                        $cardHolderName = $("#firstName").val() + " " + $("#lastname").val();
                        $exp_date = $("#year").val() + "/" + $("#month").val();

                        // check payment method values *************************************
                        var paymentMethod = "";
                        var status = "";
                        if ($("input[name=btnradio]:checked").val() == "card Payment") {

                            paymentMethod = "Card Payment";
                            status = "complete";

                        } else if ($("input[name=btnradio]:checked").val() == "cash on delivery") {
                            paymentMethod = "Cash on Delivery";
                            status = "pending";
                        }
                        // get input values ====================================

                        var prices = $("input[name='selling_price[]']").map(function() {
                            return $(this).val();
                        }).get();
                        var quantities = $("input[name='quantity[]']").map(function() {
                            return $(this).val();
                        }).get();
                        var item_code = $("input[name='item_code[]']").map(function() {
                            return $(this).val();
                        }).get();
                        var order_id = $("input[name='order_id[]']").map(function() {
                            return $(this).val();
                        }).get();


                        var table_data = [];

                        // var sub = {

                        //     'qty':quantities,
                        //     'itemcode':item_code
                        // }

                        // table_data.push(quantities,item_code);

                        $.ajax({
                            type: "POST",
                            url: "../app/includes/products/deQty.php",
                            data: {

                                item_code: item_code,
                                quantities: quantities,
                            },
                            dataType: "JSON",
                            success: function(data) {

                            },
                            error: function(xhr) {

                                // console.log(xhr.responseText);
                            }
                        });


                        $.ajax({
                            type: "POST",
                            url: "../app/includes/products/productsController.php",
                            data: {

                                orderID: $('#orderID').val(),
                                customer_ID: $('#customer_ID').val(),
                                totalQunatity: $('#totalQunatity').val(),
                                CartTotal: $('#CartTotal').val(),
                                payment_method: paymentMethod,
                                item_code: item_code,
                                quantities: quantities,
                                order_id_items: order_id,
                                mNumber: $('#mNumber').val(),
                                status: status,

                                // billing info form 
                                fullName: $('#firstName').val(),
                                lastName: $('#lastName').val(),
                                cardNo: $('#cardNo').val(),
                                stAddress: $('#stAddress').val(),
                                town: $('#town').val(),
                                postcode: $('#postcode').val(),
                                email: $('#email').val(),
                                mNumber: $('#mNumber').val(),
                                holderfirstName: $('#holderfirstName').val(),
                                holderlastName: $('#holderlastName').val(),
                                cardNo: $('#cardNo').val(),
                                month: $('#month').val(),
                                year: $('#year').val(),
                                csv: $('#csv').val(),
                                mobileNumber: $('#mobileNumber').val(),


                                form_name: "add_order"
                            },
                            dataType: "JSON",
                            success: function(data) {

                                Swal.fire({
                                    icon: 'success',
                                    title: 'Your Order has been placed!',
                                    text: 'Redirecting to the home page!',
                                    showConfirmButton: false,
                                    timer: 1500,
                                    toast: 'true',

                                });
                                setTimeout(loadHome, 2000);

                            },
                            error: function(xhr) {

                                console.log(xhr.responseText);

                            }
                        });


                    }
                })
            }

        }








    });


    function loadHome() {

        window.location = "home";
    }
    //end of the validation for billing details


    //start of the validation part for card details

    // +++++++++++++ code for validation ++++++++++++++

    //end of the validation part for card details


    // ********* End of validation part of the checkout*************
</script>