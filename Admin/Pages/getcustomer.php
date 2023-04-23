<?php include '../Includes/header.php';

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

    <h2> Customers </h2>
    <div class="row">
      <div class="col-md-7 mb-3">

      </div>

      <div class="col-md-12">
        <table id="customerTable" style="width: 100%" class="table table-dark">
          <thead>
            <tr>
              <th scope="col">Customer ID</th>
              <th scope="col">Full Name</th>
              <th scope="col">Number</th>
              <th scope="col">Email</th>
              <th scope="col">Gender</th>
              <th scope="col">Birthday</th>
              <th scope="col">Address</th>

            </tr>
          </thead>

        </table>
      </div>
    </div>
  </div>



  <?php include '../Includes/footer.php' ?>

  <script>
    $(document).ready(function() {
      $('#customerTable').DataTable();
    });

    getcustomer();


    function getcustomer() {

      $.ajax({
        type: "POST",
        url: "../Library/php/getByCustomer.php",
        // data:{
        // order_date:"2021-09-04 19:20"
        //  },
        dataType: "JSON",
        success: function(data) {

          $("#customerTable").dataTable({

            "destroy": true,
            "aaData": data,
            "scrollX": true,
            "aoColumns": [{
                "sTitle": "Customer Id",
                "mData": "Customer_Id"
              },
              {
                "sTitle": "Full Name",
                "mData": "Fll_Name"
              },
              {
                "sTitle": "Mobile No",
                "mData": "Mobile_No"
              },
              {
                "sTitle": "Email",
                "mData": "Email"
              },
              {
                "sTitle": "Gender",
                "mData": "Gender"
              },
              {
                "sTitle": "Birthday",
                "mData": "Birthday"
              },
              {
                "sTitle": "Address",
                "mData": "Address"
              },



            ]

          });

        }
      });

    }
    //end get by category

    // start get product details

    //function get_product_details(id){




    //}
  </script>