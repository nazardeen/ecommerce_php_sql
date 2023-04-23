<?php
require_once '../public/includes/checksession.php';
include 'includes/header.php';
include 'includes/customerSideNav.php';


$splitbday = explode("/", $bday);





?>
<main class="section_01">

  <ul class="nav nav-tabs userProfile" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">User Profile</button>

    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Update Profile</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#password" type="button" role="tab" aria-controls="password" aria-selected="false">Update Password</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#changeImage" type="button" role="tab" aria-controls="password" aria-selected="false">Change Image</button>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
      <div id="home" class="container tab-pane active"><br>
        <div class="container">
          <div class="main-body text-transform-uppercase">

            <div class="row gutters-sm">
              <div class="col-md-4 mb-3">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                      <div class="image_box_user">
                        <?php
                        if ($image != '') {
                        ?>
                          <img src="../app/includes/user/<?= $image ?>" alt="User-01" class="profileImage">
                        <?php
                        } else {
                        ?>
                          <img src="components/img/avatar7.png" alt="User-01" class="profileImage">

                        <?php

                        }
                        ?>
                      </div>
                      <div class="mt-3">
                        <h4><?= $full_name ?></h4>


                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-8">
                <div class="card mb-3 userDetails">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-3">
                        <h4 class="mb-0">Full Name : </h4>
                      </div>
                      <div class="col-md-9 text-secondary">
                        <h4><?= $full_name ?></h4>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-3">
                        <h4 class="mb-0">Mobile Number : </h4>
                      </div>
                      <div class="col-md-9 text-secondary">
                        <h4><?= $mobile_number ?></h4>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-3">
                        <h4 class="mb-0">Email : </h4>
                      </div>
                      <div class="col-md-9 text-secondary">
                        <h4><?= $email ?></h4>
                      </div>
                    </div>

                    <hr>
                    <div class="row">
                      <div class="col-md-3">
                        <h4 class="mb-0">Address :</h4>
                      </div>
                      <div class="col-md-9 text-secondary">
                        <h4><?= $Address ?></h4>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-3">
                        <h4 class="mb-0">Gender : </h4>
                      </div>
                      <div class="col-md-9 text-secondary">
                        <h4><?= $gender ?></h4>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-3">
                        <h4 class="mb-0">Birthday : </h4>
                      </div>
                      <div class="col-md-9 text-secondary">
                        <h4><?= $bday ?></h4>
                      </div>
                    </div>
                    <hr>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
      <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
        <div class="card h-100">
          <div class="card-body">
            <div class="row gutters">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <h2 class="mb-2 personalDetails">Personal Details</h2>
              </div>
              <input type="hidden" id="txtCustomerID" class="master_input" placeholder="Full Name" value="<?= $customer_id ?>">
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                  <label for="fullName">Full Name</label>
                  <input type="text" id="txtfullname" class="master_input" placeholder="Full Name" value="<?= $full_name ?>">
                </div>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                  <label for="MobileNumber">Mobile Number</label>
                  <input type="text" id="txtMobileNo" class="master_input" placeholder="Mobile Number" value="<?= $mobile_number ?>">
                </div>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                  <label for="phone">Email</label>
                  <input type="email" id="txtemail" class="master_input" placeholder="Email" value="<?= $email ?>" readonly>
                </div>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                  <label for="website">Address</label>
                  <input type="text" id="txtaddress" class="master_input" placeholder="Address" value="<?= $Address ?>">
                </div>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                  <div class="">
                    <div class="row">
                      <label class="text-muted">Select Your Gender</label>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        </div>
                        <select class="form-control" id="txtGender">
                          <option>Select Gender</option>

                          <?php if ($gender == "Male") {
                          ?>
                            <option value="Male" selected="selected">Male</option>
                            <option value="Female">Female</option>
                          <?php
                          } else {

                          ?>
                            <option value="Male">Male</option>
                            <option value="Female" selected="selected">Female</option>
                          <?php

                          }

                          ?>

                        </select>
                      </div>

                    </div>
                  </div>

                </div>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                  <label for="website">Birthday</label>
                  <div class="row">
                    <div class="col-md-4">
                      <input id="day" type="text" onkeypress="return DayValidate(event)" placeholder="Day" class="master_input" value="<?= $splitbday[0] ?>">
                    </div>
                    <div class="col-md-4">
                      <input id="month" type="text" onkeypress="return MonthValidate(event)" placeholder="Month" class="master_input" value="<?= $splitbday[1] ?>">
                    </div>
                    <div class="col-md-4">
                      <input id="year" type="text" placeholder="Year" class="master_input" value="<?= $splitbday[2] ?>">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row gutters">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <br>
                <div class="text-right">
                  <div class="col-md-6">
                    <button type="button" id="submitupdate" name="submit" class="button_master btn_primary">Update</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="profile-tab">
      <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
        <div class="card">
          <h3 class="text-center mb-4">Update Password</h3>
          <div class="card-body">
            <div class="col-md-4 mb-3 offset-md-4">
              <label for="">New Password</label>
              <input id="newPassword" type="password" placeholder="New Password" class="master_input">
            </div>
            <div class="col-md-4 mb-3 offset-md-4">
              <label for="">Confirm Password</label>
              <input id="confirmPassword" type="password" placeholder="Confirm Password" class="master_input">
            </div>
            <div class="col-md-4 offset-md-4">
              <button id="updatePass" class="button_master darkGrey_primary">Update Password</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="changeImage" role="tabpanel" aria-labelledby="profile-tab">
      <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
        <div class="card">
          <h3 class="text-center mb-4">Change Image</h3>
          <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data" id="imageUpload">

              <div class="col-md-4 mb-3 offset-md-4">
                <label for="">New Password</label>
                <input id="newPassword" type="file" class="master_input" name="image">
              </div>
              <div class="col-md-4 offset-md-4">
                <button id="updateImage" type="submit" class="button_master green_primary">Change Profile Image</button>
              </div>
            </form>
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
  function DayValidate(e) {
    var currentChar = parseInt(String.fromCharCode(e.keyCode), 10);
    if (!isNaN(currentChar)) {
      var nextValue = $("#day").val() + currentChar; //It's a string concatenation, not an addition

      if (parseInt(nextValue, 10) <= 31) return true;
    }

    return false;
  }

  function MonthValidate(e) {
    var currentChar = parseInt(String.fromCharCode(e.keyCode), 10);
    if (!isNaN(currentChar)) {
      var nextValue = $("#month").val() + currentChar; //It's a string concatenation, not an addition

      if (parseInt(nextValue, 10) <= 12) return true;
    }

    return false;
  }

  $(document).ready(function() {

    $("#year").keypress(function(e) {
      if ($(this).val().length >= 4) {
        return false;
      }
    });
    // check characters when entering mobile no 
    $("#txtMobileNo").keypress(function(e) {
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


    // mobile no length validation 
    $("#txtMobileNo").keypress(function(e) {
      if ($(this).val().length >= 10) {
        return false;
      }
    });

    $("#submitupdate").click(function() {

      var email = $("#txtemail").val();

      var day = $("#day").val();
      var month = $("#month").val();
      var year = $("#year").val();
      var bday = day + "/" + month + "/" + year;

      if ($("#txtfullname").val() == "") {
        Swal.fire({
          icon: 'error',
          title: 'Name required',
          showConfirmButton: false,
          timer: 1500,
          toast: 'true'
        });

      } else if ($("#txtemail").val() == "") {
        Swal.fire({
          icon: 'error',
          title: 'Email required',
          showConfirmButton: false,
          timer: 1500,
          toast: 'true'
        });
      } else if ($("#txtGender").val() == null) {
        Swal.fire({
          icon: 'error',
          title: 'Gender required',
          showConfirmButton: false,
          timer: 1500,
          toast: 'true'
        });
      } else if ($("#txtMobileNo").val() == "") {
        Swal.fire({
          icon: 'error',
          title: 'Mobile No required',
          showConfirmButton: false,
          timer: 1500,
          toast: 'true'
        });
      } else if ($("#txtaddress").val() == "") {
        Swal.fire({
          icon: 'error',
          title: 'Address required',
          showConfirmButton: false,
          timer: 1500,
          toast: 'true'
        });
      } else if ($("#day").val() == "") {
        Swal.fire({
          icon: 'error',
          title: 'Day required',
          showConfirmButton: false,
          timer: 1500,
          toast: 'true'
        });
      } else if ($("#month").val() == "") {
        Swal.fire({
          icon: 'error',
          title: 'Month required',
          showConfirmButton: false,
          timer: 1500,
          toast: 'true'
        });
      } else if ($("#year").val() == "") {
        Swal.fire({
          icon: 'error',
          title: 'Year required',
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
        $.ajax({
          type: "POST",
          url: "../app/includes/user/updateuser.php",
          data: {

            customer_id: $("#txtCustomerID").val(),
            fullname: $("#txtfullname").val(),
            email: $("#txtemail").val(),
            gender: $("#txtGender").val(),
            mobileNo: $("#txtMobileNo").val(),
            address: $("#txtaddress").val(),
            birthday: bday,
            form_name: "update_user"

          },
          dataType: "JSON",
          success: function(data) {
            Swal.fire(
              'Updated!',
              'Your Personal Info has been changed successfully!',
              'success'

            );
            setTimeout(loadHome, 2000);
          }
        });
      }


    });


  });


  // update password 
  $("#updatePass").click(function() {

    var password = $("#newPassword").val();
    var conPassword = $("#confirmPassword").val();

    if (password !== conPassword) {

      //error message
      Swal.fire({
        icon: 'error',
        title: 'Password did not matched',
        showConfirmButton: false,
        timer: 1500,
        toast: 'true'
      });
    } else if (password.length <= 4 ||conPassword.length <= 4) {

      //error message
      Swal.fire({
        icon: 'error',
        title: 'Atleast 5 Characters required for Password',
        showConfirmButton: false,
        timer: 1500,
        toast: 'true'
      });
    } else {
      $.ajax({

        type: 'POST',
        url: "../app/includes/user/updateuser.php",
        dataType: 'JSON',
        data: {
          customer_id: $("#txtCustomerID").val(),
          password: $("#confirmPassword").val(),
          form_name: "update_password"
        },
        success: function(data) {

          Swal.fire({
            title: 'Are you sure?',
            text: "Do you need to update your password!",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirm!'
          }).then((result) => {
            if (result.isConfirmed) {
              Swal.fire(
                'Updated!',
                'Your password has been changed successfully!',
                'success'

              );
              setTimeout(loadHome, 2000);
            }
          })
          $("#confirmPassword").val('');
          $("#newPassword").val('');


        },

        error: function(xhr) {


        }


      });
    }





  });

  function loadHome() {

    window.location = "customerLogin";
  }

  // change profile image 
  $("#imageUpload").submit(function(e) {

    e.preventDefault();
    var formData = new FormData(this);
    formData.append('customer_ID', $("#txtCustomerID").val());

    $.ajax({
      type: "POST",
      url: "../app/includes/user/uploadImage.php",
      processData: false,
      contentType: false,
      cache: false,
      data: formData,
      success: function(response) {

        console.log(response);
        // alert("Image Uploaded");

        // Swal.fire({

        //     icon: 'success',
        //     title: 'Welcome',
        //     showConfirmButton: false,
        //     timer: 1500,
        //     toast: 'true'
        // });
      }
    });
  });
</script>