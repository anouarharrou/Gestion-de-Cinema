<?php 
session_start();
include "connection.php";
include "login.php";
$conn=cnxBD();
$login = $_SESSION["username"];
$sql = "SELECT * FROM clients where username='anouar'"; // where username='$login' not working 
// select from clients table
try {
    $st = $conn->prepare($sql);  
    $st->execute();
    $clients = $st->fetchAll();
} catch (PDOException $eror){
    echo ($eror ->getMessage());
}
foreach ($clients as $out) {
$username= $out['username'];
$email= $out['email'];
$tele= $out['tele'];
$password= $out['password'];
}
?>
<!doctype html>

<html lang="en">

<head>
	<?php include '../components/header.php';?>

	<title>Home Cinema | User Profile</title>
</head>

<body>
	<?php include '../components/navbar.php';?>

	<div class="container">

		<div class="row">
			<div class="col-sm-10">
				<h1 class="page-header">View Profile</h1>
			</div>
			<br>
			<div class="col-sm-2">
				<form action="deleteUser.php" method="post">
					<button class="btn btn-lg btn-danger">Delete Account</button>
				</form>
			</div>
		</div>

		<div class="row">
			<div class="col-md-8">
				<p>Here's the profile information that you gave us. Feel free to update your personal details anytime!
				</p>
			</div>
		</div>
		<br>

		<div class="row">
			<div class="col-md-8">
				<form name="updateForm" id="updateForm" action="updateUserInfo.php" method="POST" value="siginup"
					novalidate>
					<div class="control-group form-group">
						<div class="controls">
							<label>Full Name:</label>
							<p><?php echo $username;?>
								<span><button type="button" class="btn btn-default btn-sm"
										id="btnShowName">Update</button></span>
							</p>
							<input type="text" class="form-control" name="newUserName" id="newUserName" required
								disabled>
							<p class="help-block"></p>
						</div>
					</div>
					<div class="control-group form-group">
						<div class="controls">
							<label>Phone Number:</label>
							<p><?php echo $tele;?>
								<span><button type="button" class="btn btn-default btn-sm"
										id="btnShowNumber">Update</button></span>
							</p>
							<input type="tel" class="form-control" id="newPhone" name="newPhone" required disabled>
						</div>
					</div>
					<div class="control-group form-group">
						<div class="controls">
							<label>Email Address:</label>
							<p><?php echo $email;?></p>
						</div>
					</div>
					<div class="control-group form-group">
						<div class="controls">
							<label>Password:</label>
							<span><button type="button" class="btn btn-default btn-sm"
									id="btnShowPassword">Change</button></span>
							<br><br>
							<input type="password" class="form-control" id="newPassword" name="newPassword" required
								disabled>
						</div>
					</div>
					<div id="success"></div>
					<!-- For success/fail messages -->
					<br>
					<button type="submit" class="btn btn-success" name="submit" id="submit" value="submit">Save
						Changes</button>
				</form>
			</div>
		</div>

	</div>

	<div>
		<p class="spacer"></p>
	</div>

	<?php include '../components/footer.php';?>
	<script>
		$('#btnShowName').click(function() {
			$('#newUserName').prop("disabled", false);
		});
		$('#btnShowNumber').click(function() {
			$('#newPhone').prop("disabled", false);
		});
		$('#btnShowPassword').click(function() {
			$('#newPassword').prop("disabled", false);
		});
	</script>
</body>

</html>