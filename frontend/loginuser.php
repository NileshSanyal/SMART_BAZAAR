<?php
	session_start();
	include "../connection/connection.php";
	$user_email = $_POST['uemail'];
	$user_password = $_POST['upassword'];
	$verify_sql = "select * from `user_details` where email='$user_email'";

	$result = mysqli_query($conn,$verify_sql);
	$row = mysqli_fetch_assoc($result);
	if(mysqli_num_rows($result) > 0){
		
		$checked_pass = password_verify($user_password,$row['password']);	

		if($checked_pass == '1'){ // match found
			$_SESSION['user_email'] = $user_email;
			echo "1";
		}	
		else{
			echo "0";
		}
	}
	else{
		echo "0";

	}