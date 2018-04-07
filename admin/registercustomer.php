<?php
	include "../connection/connection.php";

	//echo "connection successful";
	$admin_name = $_POST['fullname'];
	$admin_email = $_POST['email'];
	$admin_password = $_POST['password'];

	$admin_password = base64_encode($admin_password);

	$insert_sql = "insert into `admin`(fullname,email_id,password) values('$admin_name','$admin_email','$admin_password')";

	mysqli_query($conn,$insert_sql);
	if(mysqli_affected_rows($conn) > 0){
		echo "1";
	}
	else{
		echo "0";

	}

