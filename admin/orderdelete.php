<?php
	include "../connection/connection.php";
	$orderId = $_POST['orderId'];
	$delete_order = "delete from `orders` where id='$orderId'";
	$res = mysqli_query($conn,$delete_order);
	if($res){
		echo "1";
	}
	else{
		echo "0";
	}