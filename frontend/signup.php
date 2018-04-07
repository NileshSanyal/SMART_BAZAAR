<?php include "templates/header.php"; ?>

<!-- sign up-page -->
	<div class="login-page">
		<div class="container"> 
			<h3 class="w3ls-title w3ls-title1">Create your account</h3>  
			<div class="login-body">
				<form action="" method="post" id="usrsignupfrm" name="usrsignupfrm">
					<div class="alert alert-danger" id="signuperr"></div>
					<input type="text" class="user" name="usrname" id="usrname" placeholder="Enter your Name">
					<input type="text" class="user" name="usremail" id="usremail" placeholder="Enter your email">
					<input type="password" name="usrpassword" id="usrpassword" class="lock" placeholder="Password">
					<input type="text" class="user" name="mobile_num" id="mobile_num" placeholder="Enter your mobile number">
					<input type="submit" value="Sign Up" name="signupBtn" id="signupBtn">
				</form>
			</div>  
			<h6>Already have an account? <a href="login.php">Login Now »</a> </h6>  
		</div>
	</div>
	<!-- //sign up-page --> 
<?php include "templates/footer.php"; ?>	
<script type="text/javascript" src="assets/js/bootstrap-growl/jquery.bootstrap-growl.min.js"></script>
<script type="text/javascript" src="assets/js/signup/frontsignup.js"></script>