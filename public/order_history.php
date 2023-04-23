<?php
require_once '../public/includes/checksession.php';
include 'includes/header.php';
include 'includes/customerSideNav.php';

// require '../app/classes/product.class.php';


?>
<main class="section_01 cart_section" style="min-height: 100vh;">

    <div class="container">
        <h3 class="text-center mb-5 mt-5">Your Order History</h3>
        <div class="row">
            <div class="table-responsive-md">
                <table class="table table-secondary text-center">
                    <thead>
                        <tr>
                            <th scope="col">#Order ID</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Qunatity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $OrderHistory = $product->getOrdersbyCusID($customer_id);

                        if ($OrderHistory) {
                            foreach ($OrderHistory as $row) {


                        ?>
                                <tr>
                                    <th scope="col" class="orderid text-center"><?= $row['order_id'] ?></th>
                                    <th scope="col"><?= $row['order_date'] ?></th>
                                    <th scope="col"><?= $row['qty'] ?></th>
                                    <th scope="col"><?= $row['total'] ?></th>
                                    <th scope="col">
                                        <button class="btn btn-warning btn-sm orderView" onclick='getOrderID(this)' data-bs-toggle="modal" data-bs-target="#exampleModal">View Order Details</button>
                                    </th>
                                </tr>

                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Your Order Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- table start -->

                        <table class="table table-dark text-center" id="tbl-sale_items" style="width:100%;">

                            <thead>
                                <tr>

                                    <th>Product Name</th>
                                    <th>Price </th>
                                    <th>Qty</th>

                                </tr>
                            </thead>
                            <tbody class="tbd">

                            </tbody>


                        </table>

                        <!-- table end -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="button_master darkGrey_primary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

</main>
</style>

<?php
include 'includes/footer.php';
?>


<script>
    // get order id from table column 
    function getOrderID(e) {

        var order_id = parseInt($(e).parent().parent().find('.orderid').text());

        $.ajax({
            type: "POST",
            url: "../app/includes/products/productsController.php",
            data: {
                order_id: order_id,
                form_name: "order_details"
            },
            dataType: "JSON",
            success: function(data) {

                $dlen = data.length;
                $tbldraw = "";

                while ($dlen > 0) {
                    console.log(data[$dlen]);
                    $tbldraw = $tbldraw + '<tr><td>' + data[$dlen - 1].product_name + '</td><td>' + data[
                            $dlen - 1].retail_price + '</td><td>' + data[$dlen - 1].orderQTY +
                        '</td></tr>'
                    $dlen--;

                }

                $(".tbd").empty();
                $(".tbd").append($tbldraw);

            }
        });

    }

    // get order details by order id 
</script>