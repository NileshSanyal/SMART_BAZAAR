<?php
	session_start();
	include("../connection/connection.php");
	$uname = $_POST['usernamefield'];
	$umobile = $_POST['mobilefield'];
	$uaddress = trim($_POST['userAddress']);
	$uemail = $_SESSION['user_email'];

	$customer_name = $_POST['customer_name'];
	$customer_id = $_POST['customer_id'];

	$update_profile = "update `user_details` set full_name='$uname',mobile='$umobile',Address='$uaddress' where email='$uemail' ";
	mysqli_query($conn,$update_profile);
	$status = mysqli_affected_rows($conn);
	
	if($status >=0){
		echo "1";
	}
	else{
		echo "0";
	}