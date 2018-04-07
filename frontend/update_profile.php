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
		$cart_arr = $_SESSION['cart'];
		foreach($cart_arr as $ckey => $cval){

		$item_qty = $cval['cart_item_qty'];
		$item_id = $cval['cart_item_id'];
		$total_item_cost = $cval['cart_item_qty'] * $cval['cart_item_price'];	

			$order_insert_sql = "insert into `orders`(product_id,product_name,total_amount,quantity,user_name,user_id)";
			$order_insert_sql .= " values('".$cval['cart_item_id']."','".$cval['cart_item_name']."','".$total_item_cost."','".$cval['cart_item_qty']."','".$customer_name."','".$customer_id."')"; 
			mysqli_query($conn,$order_insert_sql);
			if(mysqli_affected_rows($conn) > 0){
				$update_product_stock = "update `products` set stock= stock - '$item_qty' where id='$item_id' ";
				mysqli_query($conn,$update_product_stock);
				$update_status = mysqli_affected_rows($conn);

				if($update_status >0){
					unset($_SESSION["cart"]);
					echo "1";
				}
				else{
					echo "0";
				}
			}
			else{
				echo "0";

			}	

		}
	}