<?php
include 'includes/header.php';
include 'includes/sidenav.php';

?>
<main class="login_section" style="height: 100vh;">
    <!-- top bar login  -->
    <div class="main_bar">
        <div class="top_heading">
            <h3 class="cutsomer">Customer Account</h3>
            <h4 class="loginreg">Login / Register</h4>
        </div>
    </div>

    <!-- login and register form -->

    <div class="account_form">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-5 col-sm-12">

                            <h4 class="text-center mt-5 form_header">Login</h4>

                            <div class="Login_form">
                                <input type="email" id="txtusername" placeholder="Email Address" class="master_input email_address">
                                <input type="password" id="txtpass" placeholder="Password" class="master_input">
                                <button class="button_master btn_primary" id="btnlogin">Submit</button>
                            </div>

                        </div>

                        <div class="col-md-1">
                            <div class="vertical_line"></div>
                        </div>

                        <div class="col-md-5 col-sm-12">

                            <h4 class="text-center mt-5 form_header">Register</h4>

                            <div class="Login_form register">

                                <div class="mb-3">
                                    <input type="text" id="customerName" placeholder="Full Name" name="customerName" class="master_input">
                                </div>

                                <div class="mb-3">
                                    <input type="number" id="mNumber" placeholder="Mobile Number" name="mNumber" class="master_input" min="1" max="10">
                                </div>

                                <div class="mb-3">
                                    <input type="email" id="email" placeholder="E-mail" name="email" class="master_input">
                                </div>

                                <div class="mb-3">
                                    <input type="password" id="password" placeholder="Password" name="password" class="master_input">
                                </div>

                                <div class="mb-3">
                                    <input type="password" id="conPassword" placeholder="Confirm Password" name="conPassword" class="master_input">
                                </div>

                                <div class="mb-3">
                                    <button class="button_master btn_primary" name="btnregister" id="btnregister">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</div>
</div>

<main class="section_name">

</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    // Digits only validation
    $("#mNumber").keypress(function(e) {

        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            //display error message
            Swal.fire({
                icon: 'error',
                title: 'Should contains only Digits!',
                showConfirmButton: false,
                timer: 1500,
                toast: 'true'
            });
            return false;
        }
    });


    //start length validation
    $("input[name=mNumber]").attr("maxlength", "10");

    $('mNumber').keypress(function(e) {

        var arr = [];

        var kk = e.which;

        for (i = 48; i < 58; i++)

            arr.push();

        if (!(arr.indexOf(kk) >= 0))

            e.preventDefault();

    });
    //end length validation

    // // check user already exist or not before login ****************
    $("#txtusername").focusout(function() {

        if ($("#txtusername").val() != '') {
            $.ajax({
                type: "POST",
                url: "../app/includes/user/login.php",
                dataType: "JSON",
                data: {
                    email: $("#txtusername").val(),
                    form_name: "check_user"
                },
                success: function(data) {
                    console.log(data.username);
                    if (data.email == $("#txtusername").val()) {
                        // login();
                    } else {
                        Swal.fire({

                            icon: 'error',
                            title: 'user not found!',
                            showConfirmButton: false,
                            timer: 1500,
                            toast: 'true'
                        });
                        $("#txtusername").val("");
                        $("#txtusername").focus();
                    }


                },
                error: function(xhr) {

                    console.log(xhr.responseText);
                }
            });
        }


    });


    $("#btnregister").on('click', function() {

        var email = $("#email").val();
        var password = $("#password").val();
        var conPassword = $("#conPassword").val();

        checkEmail();

        if ($("#customerName").val() == "") {
            Swal.fire({

                icon: 'error',
                title: 'Full Name Required',
                showConfirmButton: false,
                timer: 1500,
                toast: 'true'
            });
        } else if ($("#email").val() == "") {
            Swal.fire({

                icon: 'error',
                title: 'E-mail Required',
                showConfirmButton: false,
                timer: 1500,
                toast: 'true'
            });
        } else if ($("#mNumber").val() == "") {
            Swal.fire({

                icon: 'error',
                title: 'Contact Number Required',
                showConfirmButton: false,
                timer: 1500,
                toast: 'true'
            });
        } else if ($("#mNumber").val().length < 10) {
            Swal.fire({

                icon: 'error',
                title: 'Contact Number should have 10 digits',
                showConfirmButton: false,
                timer: 1500,
                toast: 'true'
            });
        } else if ($("#password").val() == "") {
            Swal.fire({

                icon: 'error',
                title: 'Password Required',
                showConfirmButton: false,
                timer: 1500,
                toast: 'true'
            });
        } else if ($("#conPassword").val() == "") {
            Swal.fire({

                icon: 'error',
                title: 'Confirm Password Required',
                showConfirmButton: false,
                timer: 1500,
                toast: 'true'
            });
            //--------------------------
        } else if (email.indexOf("@") < 0 || email.indexOf(".") < 0) {

            //error message
            Swal.fire({
                icon: 'error',
                title: 'Invalid E-mail',
                showConfirmButton: false,
                timer: 1500,
                toast: 'true'
            });
        } else if (password.length <= 4) {

            //error message
            Swal.fire({
                icon: 'error',
                title: 'Atleast 5 Characters required for Password',
                showConfirmButton: false,
                timer: 1500,
                toast: 'true'
            });
        } else if (password !== conPassword) {

            //error message
            Swal.fire({
                icon: 'error',
                title: 'Password did not matched',
                showConfirmButton: false,
                timer: 1500,
                toast: 'true'
            });
        } else {


            $.ajax({
                type: "POST",
                url: "../app/includes/user/login.php",
                dataType: "JSON",
                data: {

                    customerName: $("#customerName").val(),
                    mNumber: $("#mNumber").val(),
                    email: $("#email").val(),
                    password: $("#password").val(),
                    form_name: "register_form"
                },
                success: function(data) {

                    console.log(data);

                    Swal.fire({
                        position: 'top-end',
                        toast: true,
                        icon: 'success',
                        title: 'Successfully Registered',
                        showConfirmButton: false,
                        timer: 1500
                    });

                    formRefresh();

                },
                error: function(xhr) {

                    console.log(xhr.responseText);
                }
            });

        }

    });

    function formRefresh() {

        $("#customerName").val("");
        $("#mNumber").val("");
        $("#email").val("");
        $("#password").val("");
        $("#conPassword").val("");
        $("#customerName").focus();


    }
    //check email validations

    function checkEmail() {

        var email = $("#txtusername,#email").val();

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
    $("#mNumber").keypress(function(e) {
        if ($(this).val().length >= 10) {
            return false;
        }
    });
    // customer login query
    $("#btnlogin").click(function() {

        checkEmail();

        var email = $("#txtusername").val();
        if (email.indexOf("@") < 0 || email.indexOf(".") < 0) {

            //error message
            Swal.fire({
                icon: 'error',
                title: 'Invalid E-mail',
                showConfirmButton: false,
                timer: 1500,
                toast: 'true'
            });

        } else if ($("#txtusername").val() == "") {
            Swal.fire({

                icon: 'error',
                title: 'Username Required',
                showConfirmButton: false,
                timer: 1500,
                toast: 'true'
            });
        } else if ($("#txtpass").val() == "") {
            Swal.fire({

                icon: 'error',
                title: 'Password Required',
                showConfirmButton: false,
                timer: 1500,
                toast: 'true'
            });
        } else {

            $.ajax({

                type: 'POST',
                url: '../app/includes/user/login.php',
                dataType: 'JSON',
                data: {
                    username: $("#txtusername").val(),
                    password: $("#txtpass").val(),
                    form_name: "login_form"
                },
                success: function(data) {
                    if (data.username == $("#txtusername").val()) {

                        Swal.fire({

                            icon: 'success',
                            title: 'Welcome, ' + " " + $("#txtusername").val(),
                            showConfirmButton: false,
                            timer: 1500,
                            toast: 'true'
                        });
                        setTimeout(loadHome, 2000);
                    } else {
                        Swal.fire({

                            icon: 'error',
                            title: 'Username or password incorrect!',
                            showConfirmButton: false,
                            timer: 1500,
                            toast: 'true'
                        });
                    }

                },

                error: function(xhr) {

                    console.log(xhr.responseText);
                    Swal.fire({

                        icon: 'error',
                        title: 'Username or Password Invalid!',
                        showConfirmButton: false,
                        timer: 1500,
                        toast: 'true'
                    });

                    $("#txtusername").val("");
                    $("#txtpass").val("");
                    $("#txtusername").focus();

                }


            });
        }
    });

    function loadHome() {

        window.location = "index.php";
    }
</script>

<?php
include 'includes/footer.php';

?>