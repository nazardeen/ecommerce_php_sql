<?php include '../includes/header.php';

$date = date("Y-m-d");
?>
<style>
  /* data table buttons  */
  button.dt-button,
  div.dt-button,
  a.dt-button,
  input.dt-button {
    position: relative;
    display: inline-block;
    box-sizing: border-box;
    margin-right: .333em;
    margin-bottom: .333em;
    padding: .5em 1em;
    border: 1px solid rgba(0, 0, 0, 0.3);
    border-radius: 2px;
    cursor: pointer;
    font-size: .88em;
    line-height: 1.6em;
    color: white;
    white-space: nowrap;
    overflow: hidden;
    background-color: rgba(0, 0, 0, 0.1);
    background: -webkit-linear-gradient(top, rgba(230, 230, 230, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%);
    background: -moz-linear-gradient(top, rgba(230, 230, 230, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%);
    background: -ms-linear-gradient(top, rgba(230, 230, 230, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%);
    background: -o-linear-gradient(top, rgba(230, 230, 230, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%);
    background: linear-gradient(to bottom, rgba(230, 230, 230, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0, StartColorStr="rgba(230, 230, 230, 0.1)", EndColorStr="rgba(0, 0, 0, 0.1)");
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    text-decoration: none;
    outline: none;
    text-overflow: ellipsis;
  }

  .form-control {

    border: none;
    outline: none;
    background-color: #1f2122;
    width: 100%;
    height: 2rem;
    color: #fff;
    padding: 10px;
    transition: all .2s linear;
    width: 90%;
  }

  /* .form-control:focus {
    border-width: 100%;
    border: 1px solid #30576b;
    box-shadow: .5px .5px 5px lightskyblue;
    background-color: #1f2122;
    outline: 0;
  } */

  .form-control:focus {
    color: #495057;
    background-color: #1f2122;
    border-color: #30576b;
    outline: 0;
    width: 100%;
    box-shadow: 0 0 0 .2rem rgba(0, 123, 255, .25);
  }
</style>
<div class='section-1'>

  <div class="col-md-12">

    <h2> Sales Reports </h2>
    <div class="row">
      <div class="col-md-12 mb-3">
        <!-- input group class start -->
        <div class="row d-flex">
          <div class="d-flex align-items-center ">
            <div class="col-md-3"><input type="text" class="input-dark" id="orderID" placeholder="Enter Order ID"></div>
            <div class="col-md-2"><button class="button_master btn_primary button-sm" id="searchBtn">Search</button></div>
          </div>
        </div>
        <!-- input group class ENd -->
      </div>

      <div class="col-md-12">
        <table id="reportTable" class="table table-dark">
          <thead>
            <tr>
              <th>Product Code</th>
              <th>Product Name</th>
              <th>Price</th>
              <th>Qty</th>
              <th>Sub Total</th>
            </tr>
          </thead>

        </table>
      </div>
    </div>
  </div>



  <?php include '../includes/footer.php' ?>

  <script>
    $("#searchBtn").click(function() {

      if ($("#orderID").val() != "") {
        $.ajax({
          type: "POST",
          url: "../Library/php/getByReportdata.php",
          data: {
            order_id: $('#orderID').val(),
            form_name: "report_by_order_id"
          },
          dataType: "JSON",
          success: function(data) {

            // $("#summery").fadeIn();
            $("#reportTable").dataTable({
              dom: 'Bfrtip',
              buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
              ],
              "destroy": true,
              "aaData": data,
              "scrollX": true,
              "aoColumns": [{
                  "sTitle": "#Product Code",
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
                  "sTitle": "Sub Total",
                  "mData": "Total_amount"
                }

              ]

            });

          }
        });
      } else {

        Swal.fire({
          toast: true,
          icon: 'warning',
          title: 'Please Enter Order ID!',
          showConfirmButton: false,
          timer: 1500
        });
      }
    });


    $("#printReport").click(() => {

      var date = $('#dateSearch').val();
      window.location = "getDateOrders.php?order_date=" + date;

    });

    $(document).ready(function() {
      $('#reportTable').DataTable();
    });


    //print pdf 
    function DailyReport(id) {

      order_date = id;
      window.location = "DailyReportpdf.php?order_date=" + order_date;

    }


    // keypressed event 
    $("#orderID").keypress(function(event) {
      if (event.keyCode === 13) {
        $("#searchBtn").click();
      }
    });

    //}
  </script>