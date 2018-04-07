<?php
  session_start();
  if(empty($_SESSION['session_email'])){
  
?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Smart Bazaar Admin Login</title>
      <link rel="stylesheet" href="assets/css/login/adminlogin.css">
      <link rel="stylesheet" href="assets/css/login/components-md.min.css">
      <link rel="stylesheet" href="assets/css/login/bootstrap.min.css">
</head>

<body>
<form action="" method="post">
  <div class="alert alert-danger" id="loginerr">
  </div> 
  <div class="group">
    <input type="text" name="emailfield" id="emailfield"><span class="highlight"></span><span class="bar"></span>
    <label>Email</label>
  </div>
  <div class="group">
    <input type="password" name="passwordfield" id="passwordfield"><span class="highlight"></span><span class="bar"></span>
    <label>Password</label>
  </div>
  <div class="loader" style="display: none;z-index: 100; position: absolute;right: 633px; margin: auto;"><img src="assets/images/loader.gif" class="text-center" /></div>
  <div class="group">
    <a href="register.php">Don't have an account? Register Here</a>
  </div>
  <button type="submit" class="button buttonBlue" name="loginBtn" id="loginBtn">Login
    <div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
  </button>
</form>
  <script src='assets/global/plugins/jquery.min.js'></script>
    <script  src="assets/js/login/adminlogin.js"></script>
</body>

</html>
<?php
  }else{
?>
<?php header('location: dashboard.php'); ?>
<?php
}
?>