<?php include '../Includes/header.php'; ?>

<div class='section-1'>

  <div class="col-md-12">

    <h2 class="mb-3 text-center"> Manage Orders </h2>
    <div class="row">
      <div class="col-md-12">
        <table class="table table-dark" id="OrderTable">
          <thead>
            <tr>
              <th scope="col">#ORDER ID</th>
              <th scope="col">PAYMENT TYPE</th>
              <th scope="col">CUSTOMER NAME</th>
              <th scope="col">STATUS</th>
              <th scope="col">View</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <?php include '../Includes/footer.php'; ?>

  <script>
        get_All_Orders();
    $(document).ready(function() {



      $('#OrderTable').DataTable();
    });

    // get all orders 
    function get_All_Orders() {

      $.ajax({
        type: "GET",
        url: "../library/php/getByOrder.php",
        dataType: "JSON",
        success: function(data) {

          $("#OrderTable").dataTable({

            "destroy": true,
            "aaData": data,
            "scrollX": true,
            "aoColumns": [{
                "sTitle": "#Order ID",
                "mData": "order_id"
              },
              {
                "sTitle": "Payment Method",
                "mData": "payment_method"
              },
              {
                "sTitle": "Customer Name",
                "mData": "full_name"
              },
              {
                "sTitle": "Status",
                "mData": "status",
                "render": function(mData, type, row, meta) {
                  if (mData == "complete") {
                    return '<span class="badge rounded-pill bg-success">completed</span>';

                  } else if (mData == "pending") {
                    return '<span class="badge rounded-pill bg-warning">Pending</span>';
                  } 
                }

              },
              {
                "sTitle": "View",
                "mData": "order_id",
                "render": function(mData, type, row, meta) {
                  return '<a class ="btn btn-info btn-sm" href="view_details.php?order_id=' + mData + '" > View Details </a>';

                }
              },
              {
                "sTitle": "Delete",
                "mData": "order_id",
                "render": function(mData, type, row, meta) {
                  return '<button class ="btn btn-danger btn-sm" onclick="delete_order(' + mData + ')" > Delete </button>';

                }
              },

            ]

          });


        }
      });
    }
    //end get all order order

    // function get_order_details(id){

    // get product details 
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

          get_All_Orders();

        },
        error: function(xhr) {
          console.log(xhr.responseText);
        }
      });


    }
    // alert("test1");

    // }
  </script>