<?php include '../Includes/header.php' ?>


<div class="details">

  <h2 class="text-center mb-5">Employee Manage</h2>
  <div class="row">
    <div class="col-md-12 p-3">
      <table width="100%" class="table table-dark" id="EmployeeTable">
        <thead>
          <tr>
            <th>#EMPLOYEE ID</th>
            <th>Full Name</th>
            <th>Address</th>
            <th>Email</th>
            <th>NIC Number</th>
            <th>Joined date</th>
            <th>Update</th>
            <th>Delete</th>

          </tr>
        </thead>
        <tbody>


        </tbody>
      </table>
    </div>

    <div class="row employee-details" style="display: none;">

      <div class="col-md-6 col-sm-12">

        <div class="mb-3">
          <div class="">
            <span class="inputs">Employee ID</span>
            <input type="text" id="emp_id" placeholder="Employee ID" readonly class="input-dark" name="emp_id" />
          </div>
        </div>

        <div class="mb-3">
          <div class="">
            <span class="inputs">Employee Name</span>
            <input type="text" id="emp_name" placeholder="Employee Name" class="input-dark" name="emp_name" />
          </div>
        </div>

        <div class="mb-3">
          <div class="">
            <span class="inputs">NIC No</span>
            <input type="text" id="emp_nic" placeholder="NIC NO" class="input-dark" name="emp_nic" />
          </div>
        </div>

        <div class="mb-3">
          <div class="">
            <span class="inputs">Contact No</span>
            <input type="text" placeholder="Contact No" id="emp_contact_number" class="input-dark" name="emp_contact_number" />
          </div>
        </div>



      </div>


      <div class="col-md-6 col-sm-12">
        <div class="mb-3">
          <div class="">
            <span class="inputs">Address</span>
            <input type="text" placeholder="Address" id="emp_address" class="input-dark" name="emp_address" />
          </div>
        </div>
        <div class="mb-3">
          <div class="">
            <span class="inputs">Email</span>
            <input type="text" placeholder="Username" id="emp_email" class="input-dark" name="emp_email" />
          </div>
        </div>
        <div class="mb-3">
          <div class="">
            <span class="inputs">Status</span>
            <select id="emp_status" name="emp_status" class="input-dark">
              <option value="" disabled selected>Please Select</option>
              <option value="active">Active</option>
              <option value="deacivated">Deactivate</option>
            </select>
          </div>
        </div>
        <div class="mb-3">
          <div class="">
            <span class="inputs">user Type</span>
            <select class="input-dark" id="usertype" name="usertype">
              <option value="" disabled selected>Please Select</option>
              <option value="1">Admin</option>
              <option value="0">User</option>
            </select>
          </div>
        </div>
      </div>


      <div class="col-md-3 float-end">
        <button id="btnUpdate" class="button_master btn_primary">Update</button>
      </div>
      <div class="col-md-3 offset-md-4">
        <button id="btnCancel" class="button_master admin_btn_cancel">Cancel</button>
      </div>
    </div>


  </div>

  <!-- </div>

</div> -->

  <?php include '../Includes/footer.php' ?>

  <script>
    $("#emp_contact_number").keypress(function(e) {
      //if the letter is not digit then display error and don't type anything
      if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        Swal.fire({
          icon: 'error',
          title: 'Contains only Digits!',
          showConfirmButton: false,
          timer: 1500,
          toast: 'true'
        })
        return false;
      }
    });


    $(document).on('keypress keydown', function(e) {
      /* I changed it to ':focus' to demonstrate how it works inside the input */
      if ($("#emp_username,#emp_nic").is(":focus") && e.which == 32) {

        Swal.fire({
          icon: 'error',
          title: 'Spaces not allowed!',
          showConfirmButton: false,
          timer: 1500,
          toast: 'true'
        })

        return false;
      }
    });



    $("input[name=emp_nic]").attr("maxlength", "12");
    $("input[name=emp_contact_number]").attr("maxlength", "10");



    $('.emp_name,.emp_nic,.emp_contact_number').keypress(function(e) {

      var arr = [];

      var kk = e.which;



      for (i = 48; i < 58; i++)

        arr.push();



      if (!(arr.indexOf(kk) >= 0))

        e.preventDefault();

    });
    //check email validations

    function checkEmail() {

      var email = $("#emp_email").val();

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

    $("#emp_email").focusout(function() {

      checkEmail();

    });
    $(document).ready(function() {
      $('#EmployeeTable').DataTable();
    });

    get_by_Emp_ID();

    //end employee
    var Emp_ID = '';

    function get_employee_details(id) {

      $.ajax({
        type: "POST",
        url: "../Library/PHP/getByEmpID.php",
        data: {
          Emp_ID: id,
          form_name: "UpdateEmployee"
        },
        dataType: "JSON",
        success: function(data) {

          $("#emp_id").val(data.Emp_ID);
          $("#emp_name").val(data.Full_Name),
            $("#emp_nic").val(data.nic_no),
            $("#emp_contact_number").val(data.contact_no),
            $("#emp_email").val(data.email),
            $("#emp_address").val(data.Address),
            $("#emp_status").val(data.status),
            $("#usertype").val(data.userType),
            $(".employee-details").slideDown();
        }
      });
    }
    //start update employee

    $("#btnUpdate").click(function() {

      $.ajax({
        type: "POST",
        url: "../Library/PHP/getByEmpID.php",
        data: {
          emp_id: $("#emp_id").val(),
          emp_name: $("#emp_name").val(),
          emp_nic: $("#emp_nic").val(),
          emp_contact_number: $("#emp_contact_number").val(),
          emp_email: $("#emp_email").val(),
          emp_address: $("#emp_address").val(),
          emp_status: $("#emp_status").val(),
          userType: $("#usertype").val(),
          form_name: "UpdateCurrentEmployees"
        },
        dataType: "JSON",
        success: function(data) {

          Swal.fire({
            position: 'top-end',
            toast: true,
            icon: 'success',
            title: 'Updated Employee',
            showConfirmButton: false,
            timer: 1500
          });
          clear();
          get_by_Emp_ID();
          $(".employee-details").slideUp();
        }
      });



    });

    function delete_employee_details(id) {

      $.ajax({
        type: "POST",
        url: "../Library/PHP/getByEmpID.php",
        data: {
          Emp_ID: id,
          form_name: "deleteEmployees"
        },
        dataType: "JSON",
        success: function(data) {
          Swal.fire({
            position: 'top-end',
            toast: true,
            icon: 'danger',
            title: 'Deleted One record!',
            showConfirmButton: false,
            timer: 1500
          });
          get_by_Emp_ID();
        }
      });
    }

    // get all details from employee table 
    function get_by_Emp_ID() {


      $.ajax({
        type: "POST",
        url: "../Library/PHP/getByEmpID.php",
        dataType: "JSON",
        data: {
          form_name: "getAllEmployees"
        },
        success: function(data) {

          console.log(data);

          $("#EmployeeTable").dataTable({

            "destroy": true,
            "aaData": data,
            "scrollX": true,
            "aoColumns": [{
                "sTitle": "#Employee ID",
                "mData": "Emp_ID"
              },
              {
                "sTitle": "Full name",
                "mData": "Full_name"
              },
              {
                "sTitle": "Address",
                "mData": "Address"
              },
              {
                "sTitle": "Email",
                "mData": "email"
              },
              {
                "sTitle": "NIC Number",
                "mData": "nic_no"
              },
              {
                "sTitle": "Joined date",
                "mData": "Joined_date"
              },
              {
                "sTitle": "Update",
                "mData": "Emp_ID",
                "render": function(mData, type, row, meta) {
                  return '<button class ="Admin_button_master admin_btn_primary" onclick="get_employee_details(' + mData + ')" > Update </button>';

                }
              },
              {
                "sTitle": "Delete",
                "mData": "Emp_ID",
                "render": function(mData, type, row, meta) {
                  return '<button class ="Admin_button_master admin_btn_delete" onclick="delete_employee_details(' + mData + ')" >Delete</button>';

                }
              },
            ]

          });


        }
      });
    }

    function clear() {
      $(".employee-details").slideUp();

      $("#emp_id").val("");
      $("#emp_name").val("");
      $("#emp_nic").val("");
      $("#emp_contact_number").val("");
      $("#emp_email").val("");
      $("#emp_address").val("");
      $("#emp_username").val("");
      $("#emp_password").val("");
      $("#emp_status").val("");
    }


    $("#btnCancel").click(() => {

      clear();
    });
  </script>