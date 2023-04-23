<?php include_once '../Includes/header.php';

require_once '../library/Classes/ordersclass.php';
$order_table = new Order();

if ($_GET['order_id'] != "") {
  $order_id = $_GET['order_id'];

  $data = $order_table->getCustomerName($order_id);

  $customerName = $data['full_name'];
  $totaQty = $data['qty'];
  $totaPrice = $data['total'];
  $payment_method = $data['payment_method'];
  $status = $data['status'];
}


?>
<div class='section-1 p-3'>
    <h2 class="mb-3 text-center"><strong><?= $_GET['order_id'] ?></strong> Order Details</h2>
    <div class="row">
      <input type="hidden" id="order_ID" value="<?= $order_id ?>">
      <div class="col-md-4 mb-3 ">
        <ol class="list-group list-group-numbered mb-5">
          <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
              <div class="">Customer Name</div>

            </div>
            <h5 class="fw-bold"><?= $customerName ?></h5>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
              <div class="">Payment Method</div>
              <?php

              if ($status == "pending") {
              ?>
              <button class="btn btn-sm rounded-pill btn-outline-dark" id="updateStatus">Mark As Completed</button>
              <?php }
              ?>
            </div>
            <h5 class="fw-bold"><?= $payment_method ?></h5>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
              <div class="">Total Price</div>

            </div>
            <h5 class="fw-bold">RS.<?= $totaPrice ?>.00</h5>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
              <div class="">Total Quantity</div>

            </div>
            <h3 class="badge bg-primary rounded-pill"><?= $totaQty ?></h3>
          </li>
        </ol>
      </div>


      <div class="col-md-12">
        <table class="table table-dark" id="OrderTable">
          <thead>
            <tr>
              <th scope="col">#Item Code</th>
              <th scope="col">Product Name</th>
              <th scope="col">Unit Price</th>
              <th scope="col">Quantity</th>
              <th scope="col">Total</th>

            </tr>
          </thead>
          </tbody>
        </table>
      </div>
    </div>



    <?php include '../Includes/footer.php'; ?>

  <script>
    $(document).ready(function() {
      $('#OrderTable').DataTable();
    });

    // get all orders 
    get_All_Orders_by_orderID();

    function get_All_Orders_by_orderID() {

      $.ajax({
        type: "POST",
        url: "../library/php/manageOrderCtrl.php",
        dataType: "JSON",
        data: {
          order_ID: $("#order_ID").val(),
          form_name: "Orders_By_order_ID"
        },
        success: function(data) {

          console.log(data);
          $("#OrderTable").dataTable({

            "destroy": true,
            "aaData": data,
            "scrollX": true,
            "aoColumns": [{
                "sTitle": "#Item Code",
                "mData": "item_code"
              },
              {
                "sTitle": "Product Name",
                "mData": "product_name"
              },
              {
                "sTitle": "Unit Price",
                "mData": "retail_price"
              },
              {
                "sTitle": "Quantity",
                "mData": "quantity"
              },
              {
                "sTitle": "Total",
                "mData": "TotalofAll"
              }

            ]

          });


        }
      });
    }
    //end get all order order



    // delete product details 
    var order_id = '';

    function delete_order(id) {

      $.ajax({
        type: "POST",
        url: "../library/php/manageOrderCtrl.php",
        data: {
          order_id: id,
          form_name: "delete_order"
        },
        dataType: "JSON",
        success: function(data) {

        },
        error: function(xhr) {
          console.log(xhr.responseText);
        }
      });


    }


    $("#updateStatus").click(()=>{

      $.ajax({
        type: "POST",
        url: "../library/php/manageOrderCtrl.php",
        data: {
          order_ID: $("#order_ID").val(),
          form_name: "update_status"
        },
        dataType: "JSON",
        success: function (response) {
          location.reload();
        }
      });

    });


  </script>