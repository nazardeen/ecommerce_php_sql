<?php include '../Includes/header.php';

?>

<div class='section-1'>

  <div class="col-md-12">

    <h2> Daily Reports </h2>
    <div class="row">
      <div class="col-md-7 mb-3">
        <!-- input group class start -->
        <div class="input-group">
          <span class="input-group-text">Search</span>
          <input type="date" aria-label="First name" placeholder="Date" class="form-control">
          <button type="button" id="Search" name="Search" class="btn btn-primary ml-3">Search</button>
          <button type="button" id="Print" name="Print" class="btn btn-primary ml-3">Print</button>
        </div>
        <!-- input group class ENd -->
      </div>

      <div class="col-md-12">
        <table id="reportTable" class="table table-dark">
          <thead>
            <tr>
            <th scope="col">Order ID</th>
              <th scope="col">Order Date</th>
              <th scope="col">Item Code</th>
              <th scope="col">Product Description</th>
              <th scope="col">QTY</th>
              <th scope="col">Total</th>
            </tr>
          </thead>

        </table>
      </div>
    </div>
  </div>



  <?php include '../Includes/footer.php' ?>

  <script>
    get_products();
    $(document).ready(function() {
      $('#reportTable').DataTable();
    });



    getByReportdata();


function getByReportdata(){

    $.ajax({
    type: "POST",
    url: "../library/php/getByReportdata.php",
    data:{
      order_date:"2021-09-10"
    },
    dataType: "JSON",
    success: function (data) {

     $("#reportTable").dataTable({

       "destroy":true,
       "aaData":data,
       "scrollX":true,
       "aoColumns":[
         {
           "sTitle":"#order_id",
           "mData":"order_id"
         },
         {
           "sTitle":"order_date",
           "mData":"order_date"
         },
         {
           "sTitle":"product_id",
           "mData":"product_id"
         },
         {
           "sTitle":"product_description",
           "mData":"product_description"
         },
         {
           "sTitle":"quantity",
           "mData":"quantity"
         },
         {
           "sTitle":"total",
           "mData":"total"
         },
         

       ]

     });
        
    }
});
    
}
  </script>