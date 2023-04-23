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

    <h2> Daily Reports </h2>
    <div class="row">
      <div class="col-md-8 mb-3">
        <!-- input group class start -->
        <div class="d-flex">
          <input type="date" aria-label="First name" id="dateSearch" placeholder="Date" value="<?= $date ?>" class="input-dark">
          <button type="button" id="Search" name="Search" class="button_master btn_outline_1 button-sm ml-3">Search</button>
          <button type="button" id="printReport" name="print" class="button_master btn_outline_1 button-sm ml-3">Print All</button>
        </div>
        <!-- input group class ENd -->
      </div>

      <div class="col-md-12">
        <div class="row" id="summery" style="display: none;">
          <div class="col-md-3">
            <div class="card5 mb-3">
              <div>
                <div class="numbers" id="profit">0</div>
                <div class="cardName">TOTAL PROFIT</div>
              </div>
              <div class="iconBox">
                <i class="fa fa-money" aria-hidden="true"></i>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card5 mb-3">
              <div>
                <div class="numbers" id="Grandtotal">0</div>
                <div class="cardName">TOTAL RECEIVABLE</div>
              </div>
              <div class="iconBox">
                <i class="fa fa-usd" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
        <table id="reportTable" class="table table-dark">
          <thead>
            <tr>
              <th scope="col">#Order ID</th>
              <th scope="col">Order Date</th>
              <th scope="col">Quantity</th>
              <th scope="col">Grand Total</th>
              <th scope="col">Payment Method</th>
              <th scope="col">Status</th>
            </tr>
          </thead>

        </table>
      </div>
    </div>
  </div>



  <?php include '../includes/footer.php' ?>

  <script>
    $("#Search").click(() => {

      // Profit 
      $.ajax({
        type: "POST",
        url: "../library/php/reports/getProfit.php",
        data: {
          order_date: $('#dateSearch').val()

        },
        dataType: "JSON",
        success: function(response) {

          $("#profit").text(response);

        }
      });

      // Get Grand Total 
      $.ajax({
        type: "POST",
        url: "../library/php/reports/getTotal.php",
        data: {
          order_date: $('#dateSearch').val(),

        },
        dataType: "JSON",
        success: function(response) {

          $("#Grandtotal").text(response);

        }
      });
      var date = new Date($('#dateSearch').val());
      // var day = date.getDate();
      // var month = date.getMonth() + 1;
      // var year = date.getFullYear();
      // var ReportDate = [year, month, day].join('-');

      $.ajax({
        type: "POST",
        url: "../library/php/getByReportdata.php",
        data: {
          order_date: $('#dateSearch').val(),
          form_name: "report_by_order"
        },
        dataType: "JSON",
        success: function(data) {
          $("#summery").fadeIn();
          $("#reportTable").dataTable({
            dom: 'Bfrtip',
            buttons: [
              'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "destroy": true,
            "aaData": data,
            "scrollX": true,
            "aoColumns": [{
                "sTitle": "#Order ID",
                "mData": "order_id"
              },
              {
                "sTitle": "Order_date",
                "mData": "order_date"
              },
              {
                "sTitle": "Quantity",
                "mData": "qty"
              },
              {
                "sTitle": "Grand Total",
                "mData": "total"
              },
              {
                "sTitle": "Payment Method",
                "mData": "payment_method"
              },
              {
                "sTitle": "Status",
                "mData": "status",
                "render": function(mData, type, row, meta) {
                  if (mData == "complete") {
                    return '<span class="badge rounded-pill bg-success">completed</span>';

                  } else if (mData == "pending") {
                    return '<span class="badge rounded-pill bg-info">Pending</span>';
                  } else if (mData == "cancelled") {
                    return '<span class="badge rounded-pill bg-danger">Cancelled</span>';
                  }
                }
              },

            ]

          });

        }
      });
      // keypressed event 
      $("#orderID").keypress(function(event) {
        if (event.keyCode === 13) {
          $("#Search").click();
        }
      });
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


    //}
  </script>