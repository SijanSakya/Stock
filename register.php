<?php
include './php/config/autoload.php';

extract($_POST);

if (isset($submit)) {

	$user = new user('', $username, $email, $password, '', '$created_at');
	$Usercreate = $user->create_user($user);
	if ($user) {

		echo 'Register successfully!';
	}
}



?>

<!DOCTYPE html>
<html lang="en">



<head>
	<meta charset="utf-8" />
	<title>AspStudio | Register</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="" />
	<meta name="author" content="" />

	<link href="assets/css/app.min.css" rel="stylesheet" />

</head>

<body>

	<div id="app" class="app app-full-height app-without-header">

		<div class="register">

			<div class="register-content">
				<form action="#" method="POST" name="register_form">
					<h1 class="text-center">Sign Up</h1>
					<p class="text-muted text-center">One Admin ID is all you need to access all the Admin services.</p>
					<div class="mb-3">
						<label class="form-label">UserName <span class="text-danger"></span></label>
						<input type="text" name="username" class="form-control form-control-lg fs-15px" placeholder="" value="" />
					</div>
					<div class="mb-3">
						<label class="form-label">Email Address <span class="text-danger">*</span></label>
						<input type="text" name="email" class="form-control form-control-lg fs-15px" placeholder="username@address.com" value="" />
					</div>
					<div class="mb-3">
						<label class="form-label">Password <span class="text-danger">*</span></label>
						<input type="password" name="password" class="form-control form-control-lg fs-15px" value="" />
					</div>



					<div class="mb-3">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="customCheck1" />
							<label class="form-check-label fw-500" for="customCheck1">I have read and agree to the <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>.</label>
						</div>
					</div>
					<div class="mb-3">
						<input value="Sign up" type="submit" class="btn btn-primary btn-lg fs-15px fw-500 d-block w-100" name="submit"></input>

					</div>
					<div class="text-muted text-center">
						Already have an Admin ID? <a href="login.php">Sign In</a>
					</div>
				</form>
			</div>

		</div>


		<a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>

	</div>


	<?php include './layout/footer.php'; ?>