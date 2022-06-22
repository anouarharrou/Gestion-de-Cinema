<!doctype html>
<html lang="en">
	<head>
		<?php include '../components/header.php';?>

		<title>Home Cinema | Add Clients</title>
	</head>
	<body>
		<?php include '../components/navbar.php';?>

		<div class="container">

			<!-- Page Heading -->
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Add New Client</h1>
				</div>
			</div>


			<br>

			<!-- Signup Form -->
			<div class="row">
				<div class="col-md-8">
					<form name="signupForm" id="signupForm" action="signupProcess.php" method="post" novalidate>
						<div class="control-group form-group">
							<div class="controls">
								<label>Username:</label>
								<input type="text" class="form-control" name="username" id="name" required data-validation-required-message="Please enter your name.">
								<p class="help-block"></p>
							</div>
						</div>
						
						<div class="control-group form-group">
							<div class="controls">
								<label>Phone Number:</label>
								<input type="tel" class="form-control" id="phone"  name="tele"required data-validation-required-message="Please enter your phone number.">
							</div>
						</div>
						<div class="control-group form-group">
							<div class="controls">
								<label>Email Address:</label>
								<input type="email" class="form-control" id="email" name="email" required data-validation-required-message="Please enter your email address.">
							</div>
						</div>
						<div class="control-group form-group">
							<div class="controls">
								<label>Password:</label>
								<input type="password" class="form-control" id="password" name="password" required data-validation-required-message="Please enter a password.">
							</div>
						</div>
						<div id="success"></div>
						<!-- For success/fail messages -->
						<br>
						<button type="submit" class="btn btn-danger" name="submit" id="submit" value="submit">Add</button>
					</form>
				 </div>
			</div>
		</div>

	  <div>
	    <p class="spacer"></p>
	  </div>

		<?php include '../components/footer.php';?>
		
	</body>
</html>
