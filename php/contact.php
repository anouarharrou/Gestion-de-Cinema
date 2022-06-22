<!doctype html>
<html lang="en">
	<head>
		<?php include '../components/header.php';?>

		<title>BookMyMovie | Contact Us</title>
	</head>
	<body>
		<?php include '../components/navbar.php';?>

		<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Contact Us</h1>
        <ol class="breadcrumb">
          <li><a href="index.php">Home</a>
          </li>
          <li class="active">Contact Us</li>
        </ol>
      </div>
    </div>
    <!-- /.row -->

    <!-- Content Row -->
    <div class="row">
      <!-- Map Column -->
      <div class="col-md-8">
        <!-- Embedded Google Map -->
        <iframe src="https://www.google.com/maps/place/%C3%89cole+Nationale+des+Sciences+Appliqu%C3%A9es+d'Oujda/@34.6504031,-1.8985283,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0x23a99f5d4e9a3161!8m2!3d34.6504031!4d-1.8963396" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
      <!-- Contact Details Column -->
      <div class="col-md-4">
        <h3>Contact Details</h3>
        <p>
        École Nationale des Sciences Appliquées d'Oujda<br>
        </p>
        <p><i class="fa fa-phone"></i>
           (0212) 05-365-05470</p>
        <p><i class="fa fa-envelope-o"></i>
          <a href="#" class="text-danger"> http://ensao.ump.ma/</a>
        </p>
        <p><i class="fa fa-clock-o"></i>
          Monday - Friday: 9:00 AM to 5:00 PM</p>
        <ul class="list-unstyled list-inline list-social-icons">
          <li>
            <a class="text-danger" href="http://www.facebook.com"><i class="fa fa-facebook-square fa-2x"></i></a>
          </li>
          <li>
            <a class="text-danger" href="http://www.twitter.com"><i class="fa fa-twitter-square fa-2x"></i></a>
          </li>
          <li>
            <a class="text-danger" href="http://plus.google.com"><i class="fa fa-google-plus-square fa-2x"></i></a>
          </li>
        </ul>
      </div>
    </div>

    <div class="row">
      <div class="col-md-8">
        <h3>Send us a Message</h3>
        <form name="sentMessage" id="contactForm" novalidate>
          <div class="control-group form-group">
            <div class="controls">
              <label>Full Name:</label>
              <input type="text" class="form-control" id="name" required data-validation-required-message="Please enter your name.">
              <p class="help-block"></p>
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Phone Number:</label>
              <input type="tel" class="form-control" id="phone" required data-validation-required-message="Please enter your phone number.">
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Email Address:</label>
              <input type="email" class="form-control" id="email" required data-validation-required-message="Please enter your email address.">
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Message:</label>
              <textarea rows="10" cols="100" class="form-control" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
            </div>
          </div>
          <div id="success"></div>
          <button type="submit" class="btn btn-danger">Send Message</button>
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
