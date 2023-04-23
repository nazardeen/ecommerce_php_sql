<?
session_start();
if(!isset($_SESSION['username'])){
	header('location: dashboard.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" integrity="sha512-gOQQLjHRpD3/SEOtalVq50iDn4opLVup2TF8c4QPI3/NmUPNZOk2FG0ihi8oCU/qYEsw4P6nuEZT2lAG0UNYaw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
	<link rel="stylesheet" href="../components/css/Login.css">
	<link rel="stylesheet" href="../components/css/button.css">
	<!-- <link rel="stylesheet" href="../components/css/style.css"> -->
	<!-- <link rel="stylesheet" href="../components/css/section.css"> -->


	<title>Admin/Employee Login Page</title>
</head>

<body>
	<div class="login-box">
		<div class="login_header">
			<h1>CELLENTRIC </h1>
			<!-- <div class="line"></div> -->
			<h2 class="text-center login_text">Login</h2>
		</div>


		<div class="textbox">
			<i class="fa fa-user" aria-hidden="true"></i>
			<input type="text" placeholder="Username" id="txtusername" name="adminname" value="" class="TXT_username" required>
		</div>

		<div class="textbox">
			<i class="fa fa-lock" aria-hidden="true"></i>
			<input type="password" placeholder="Password" id="txtpass" name="password" value="" class="TXT_username" required>
		</div>

		<button class="button_master btn_primary" name="login" id="loginbtn">Login</button>
	</div>


	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

	<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->

	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script> -->

	<script>
		// // check user already exist or not before login ****************
		$("#txtusername").focusout(function() {

			if ($("#txtusername").val() != '') {
				$.ajax({
					type: "POST",
					url: "../library/php/login.php",
					dataType: "JSON",
					data: {
						username: $("#txtusername").val(),
						form_name: "check_user"
					},
					success: function(data) {
						console.log(data.username);
						if (data.username == $("#txtusername").val()) {
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


		// Admin login query
		$("#loginbtn").click(function() {

			if ($("#txtusername").val() == "") {
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
					url: '../library/php/login.php',
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

			window.location = "dashboard.php";
		}
	</script>




</body>

</html>