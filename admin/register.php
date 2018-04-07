<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Smart Bazaar Admin Register</title>
      <link rel="stylesheet" href="assets/css/register/adminregister.css">
      <link rel="stylesheet" href="assets/css/register/components-md.min.css">
      <link rel="stylesheet" href="assets/css/register/bootstrap.min.css">
      <!-- BEGIN EXTRA PLUGINS DOWNLOADED SEPARATELY -->
        <link href="assets/global/plugins/toastr/css/toastr.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form action="" method="post">
  <div class="alert alert-danger" id="registererr"></div>
   <div class="group">
    <input type="text" name="fullnamefield" id="fullnamefield"><span class="highlight"></span><span class="bar"></span>
    <label>Full Name</label>
  </div> 
  <div class="group">
    <input type="text" name="emailfield" id="emailfield"><span class="highlight"></span><span class="bar"></span>
    <label>Email</label>
  </div>
  <div class="group">
    <input type="password" name="passwordfield" id="passwordfield"><span class="highlight"></span><span class="bar"></span>
    <label>Password</label>
    <div class="loader" style="display: none;z-index: 100; position: absolute;right: 117px; margin: auto;"><img src="assets/images/loader.gif" class="text-center" /></div>
  </div>
  <div class="group">
    <a href="index.php">Already have an account? Login Here</a>
  </div>
  <button type="submit" class="button buttonBlue" name="registerBtn" id="registerBtn">Register
    <div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
  </button>
</form>
  <script src='assets/global/plugins/jquery.min.js'></script>
    <script  src="assets/js/register/adminregister.js"></script>
     <!-- BEGIN EXTRA PLUGIN SCRIPTS DOWNLOADED LATER -->
        <script src="assets/global/plugins/toastr/js/toastr.min.js" type="text/javascript"></script>
</body>

</html>
