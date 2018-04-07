<?php
	session_start();
	include "../connection/connection.php";

	//echo "connection successful";
	$admin_email = $_POST['email'];
	$admin_password = $_POST['password'];

	$admin_password = base64_encode($admin_password);

	$verify_sql = "select * from admin where password='$admin_password'";

	$result = mysqli_query($conn,$verify_sql);
	if(mysqli_num_rows($result) > 0){
		$_SESSION['session_email'] = $admin_email;
		echo "1";
	}
	else{
		echo "0";

	}


