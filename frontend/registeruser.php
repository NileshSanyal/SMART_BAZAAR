<?php
	include "../connection/connection.php";
	$user_name = $_POST['uname'];
	$user_email = $_POST['uemail'];
	$user_password = $_POST['upass'];
	$user_mobilenum = $_POST['umobile'];

	$res = array();

	// check if email already exists or not
	$get_prev_emails = "select * from `user_details` where email='$user_email'";
	
	$result = mysqli_query($conn,$get_prev_emails);

	if(mysqli_num_rows($result) > 0){
		//echo "0";
		$res['success']='0';
		$res['error']='1';
		$res['msg'] = 'Email already exists!';
	}
	else{
		$user_password = password_hash($user_password,PASSWORD_DEFAULT); 

		$insert_sql = "insert into `user_details`(full_name,email,password,mobile) values('$user_name','$user_email','$user_password','$user_mobilenum')";

		mysqli_query($conn,$insert_sql);
		if(mysqli_affected_rows($conn) > 0){
			//echo "1";

			$res['success']='1';
			$res['error']='0';	
		}
		else{
			//echo "0";

			$res['success']='0';
			$res['error']='1';
			$res['msg'] = 'Error occurred!,try again later';
		}
	}

	echo json_encode($res);exit(0);

