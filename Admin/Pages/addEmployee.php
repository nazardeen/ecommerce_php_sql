<?php include '../Includes/header.php';

$date = date("Y-m-d");

?>


<div class="details">

  <h2 class="text-center mb-5">Employee Manage</h2>

  <form action="" id="employee_manage_form" enctype="multipart/form-data">

    <div class="row">

      <div class="col-md-6 col-sm-12">

        <div class="mb-3">
          <div class="">
            <span class="inputs">Employee Name</span>
            <input class="input-dark" type="text" placeholder="Employee Name" id="emp_name" name="emp_name" />
          </div>
        </div>

        <div class="mb-3">
          <div class="">
            <span class="inputs">NIC No</span>
            <input class="input-dark" type="text" placeholder="NIC NO" id="emp_nic" name="emp_nic" />
          </div>
        </div>

        <div class="mb-3">
          <div class="">
            <span class="inputs">Contact No</span>
            <input class="input-dark" type="text" placeholder="Contact No" id="emp_contact_number" name="emp_contact_number" />
          </div>
        </div>

        <div class="mb-3">
          <div class="">
            <span class="inputs">Email</span>
            <input class="input-dark" type="text" placeholder="Email" id="emp_email" name="emp_email" />
          </div>
        </div>

        <div class="mb-3">
          <div class="">
            <span class="inputs">Address</span>
            <input class="input-dark" type="text" placeholder="Address" id="emp_address" name="emp_address" />
          </div>
        </div>

      </div>


      <div class="col-md-6 col-sm-12">

        <div class="mb-3">
          <div class="">
            <span class="inputs">Date Of Birth</span>
            <input class="input-dark" type="date" placeholder="Date Of Birth" id="emp_DOB" name="emp_DOB" />
          </div>
        </div>

        <div class="mb-3">
          <div class="">
            <span class="inputs">Joined Date</span>
            <input class="input-dark" type="date" placeholder="Joined Date" id="emp_joinedDate" name="emp_joinedDate" value="<?=$date?>"/>
          </div>
        </div>

        <div class="mb-3">
          <div class="">
            <span class="inputs">Status</span>
            <select class="input-dark" id="emp_status" name="emp_status">
              <option value="" disabled selected>Please Select</option>
              <option value="active">Active</option>
              <option value="deactivated">Deactivate</option>
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

        <div class="mb-3">
          <div class="">
            <span class="inputs">Username</span>
            <input class="input-dark" type="text" placeholder="Username" id="emp_username" name="emp_username" />
          </div>
        </div>

        <div class="mb-3">
          <div class="">
            <span class="inputs">Password</span>
            <input class="input-dark" type="password" placeholder="Password" id="emp_password" name="emp_password" />
          </div>
        </div>

      </div>

      <div class="col-md-3 offset-md-4">
        <button id="addBtn" type="submit" class="button_master btn_primary">Add</button>
      </div>
    </div>

  </form>
</div>

<!-- </div>

</div> -->

<?php include '../Includes/footer.php' ?>

<script>
  //Start of the validation

  //digits only validation start
  $("#emp_contact_number").keypress(function(e) {

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
  //digits only validation end


  // spaces validation start
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
  // spaces validation end


  //start length validation
  $("input[name=emp_nic]").attr("maxlength", "12");
  $("input[name=emp_contact_number]").attr("maxlength", "10");

  $('.emp_nic,.emp_contact_number').keypress(function(e) {

    var arr = [];

    var kk = e.which;

    for (i = 48; i < 58; i++)

      arr.push();

    if (!(arr.indexOf(kk) >= 0))

      e.preventDefault();

  });
  //end length validation

  $("#employee_manage_form").submit(function(e) {

    e.preventDefault();
    if ($("#emp_name").val() == "") {
      Swal.fire({

        icon: 'error',
        title: 'Employee Name Required',
        showConfirmButton: false,
        timer: 1500,
        toast: 'true'
      });
    } else if ($("#emp_nic").val() == "") {
      Swal.fire({

        icon: 'error',
        title: 'Employee NIC Required',
        showConfirmButton: false,
        timer: 1500,
        toast: 'true'
      });
    } else if ($("#emp_contact_number").val() == "") {
      Swal.fire({

        icon: 'error',
        title: 'Contact Number Required',
        showConfirmButton: false,
        timer: 1500,
        toast: 'true'
      });
    } else if ($("#emp_email").val() == "") {
      Swal.fire({

        icon: 'error',
        title: 'E-mail Required',
        showConfirmButton: false,
        timer: 1500,
        toast: 'true'
      });
    } else if ($("#emp_address").val() == "") {
      Swal.fire({

        icon: 'error',
        title: 'Employee Address Required',
        showConfirmButton: false,
        timer: 1500,
        toast: 'true'
      });
    } else if ($("#emp_DOB").val() == "") {
      Swal.fire({

        icon: 'error',
        title: 'Employee Date of birth Required',
        showConfirmButton: false,
        timer: 1500,
        toast: 'true'
      });
    } else if ($("#emp_joinedDate").val() == "") {
      Swal.fire({

        icon: 'error',
        title: 'Employee joined date Required',
        showConfirmButton: false,
        timer: 1500,
        toast: 'true'
      });
    } else if ($("#emp_status").val() == null) {
      Swal.fire({

        icon: 'error',
        title: 'Employee status Required',
        showConfirmButton: false,
        timer: 1500,
        toast: 'true'
      });
    } else if ($("#usertype").val() == null) {
      Swal.fire({

        icon: 'error',
        title: 'User Type Required',
        showConfirmButton: false,
        timer: 1500,
        toast: 'true'
      });
    } else if ($("#emp_username").val() == "") {
      Swal.fire({

        icon: 'error',
        title: 'Username Required',
        showConfirmButton: false,
        timer: 1500,
        toast: 'true'
      });
    } else if ($("#emp_password").val() == "") {
      Swal.fire({

        icon: 'error',
        title: 'Password Required',
        showConfirmButton: false,
        timer: 1500,
        toast: 'true'
      });
    } else {
      $.ajax({
        type: "POST",
        url: "../Library/php/employee.php",
        processData: false,
        contentType: false,
        cache: false,
        data: new FormData(this),
        success: function(response) {
          Swal.fire({
            position: 'top-end',
            toast: true,
            icon: 'success',
            title: 'New Employee Added',
            showConfirmButton: false,
            timer: 1500
          });
          formRefresh();
        }
      });
    }


  });

  $("input[name=emp_nic]").attr("maxlength", "10");
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

  function formRefresh() {

    $("#emp_name").val("");
    $("#emp_nic").val("");
    $("#emp_contact_number").val("");
    $("#emp_email").val("");
    $("#emp_address").val("");
    $("#emp_DOB").val("");
    $("#emp_joinedDate").val("");
    $("#emp_status").val("");
    $("#emp_username").val("");
    $("#emp_password").val("");
    $("#emp_name").focus();

  }
</script>