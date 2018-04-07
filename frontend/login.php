<?php include "templates/header.php"; ?>
<!-- login-page -->
	<div class="login-page">
		<div class="container"> 
			<h3 class="w3ls-title w3ls-title1">Login to your account</h3>  
			<div class="login-body">
				<form action="" method="post" name="frontloginfrm" id="frontloginfrm">
					<div class="alert alert-danger" id="loginerr"></div>

					<input type="text" class="user" name="uemail" id="uemail" placeholder="Enter your email">
					<div class="loader" style="display: none;z-index: 100; position: absolute;right: 633px;top:648px; margin: auto;"><img src="assets/images/loader.gif" class="text-center" />
					</div>
					<input type="password" name="upassword" id="upassword" class="lock" placeholder="Password">
					<input type="submit" value="Login" id="loginBtn" name="loginBtn">
					<div class="forgot-grid">
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Remember me</label>
						<div class="forgot">
							<a href="#">Forgot Password?</a>
						</div>
						<div class="clearfix"> </div>
					</div>
				</form>
			</div>  
			<h6> Not a Member? <a href="signup.php">Sign Up Now »</a> </h6> 
			<div class="login-page-bottom social-icons">
				<h5>Recover your social account</h5>
				<ul>
					<li><a href="#" class="fa fa-facebook icon facebook"> </a></li>
					<li><a href="#" class="fa fa-twitter icon twitter"> </a></li>
					<li><a href="#" class="fa fa-google-plus icon googleplus"> </a></li>
					<li><a href="#" class="fa fa-dribbble icon dribbble"> </a></li>
					<li><a href="#" class="fa fa-rss icon rss"> </a></li> 
				</ul> 
			</div>
		</div>
	</div>
	<!-- //login-page --> 
<?php include "templates/footer.php"; ?>	
<script type="text/javascript" src="assets/js/login/frontlogin.js"></script>