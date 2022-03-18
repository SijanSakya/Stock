<?php include
	'./php/config/autoload.php';

extract($_POST);


if (isset($submit)) {
	$user = new user("", "", $email, $password);
	$result = $user->read_user();

	if ($result) {
		header("Location: ./dashboard.php");
	} else {
		echo "Login Failed...... Try again";
		die;
	}
}


?>

<!DOCTYPE html>
<html lang="en">


<head>
	<meta charset="utf-8" />
	<title>AspStudio | Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="" />
	<meta name="author" content="" />

	<link href="assets/css/app.min.css" rel="stylesheet" />

</head>

<body>

	<div id="app" class="app app-full-height app-without-header">

		<div class="login">

			<div class="login-content">
				<form action="#" method="POST" name="login">
					<h1 class="text-center">Sign In</h1>
					<div class="text-muted text-center mb-4">
						For your protection, please verify your identity.
					</div>
					<div class="mb-3">
						<label class="form-label">Email Address</label>
						<input name="email" type="text" class="form-control form-control-lg fs-15px" value="" placeholder="username@address.com" required />
					</div>
					<div class="mb-3">
						<div class="d-flex">
							<label class="form-label">Password</label>
							<a href="#" class="ms-auto text-muted">Forgot password?</a>
						</div>
						<input name="password" type="password" class="form-control form-control-lg fs-15px" value="" placeholder="Enter your password" required />
					</div>
					<div class="mb-3">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="customCheck1" />
							<label class="form-check-label fw-500" for="customCheck1">Remember me</label>
						</div>
					</div>
					<input class="btn btn-primary btn-lg d-block w-100 fw-500 mb-3" value="login" type="submit" class="btn btn-primary" name="submit"></input>
					<div class="text-center text-muted">
						Don't have an account yet? <a href="register.php">Sign up</a>.
					</div>
				</form>
			</div>

		</div>

		<?php include './layout/footer.php'; ?>