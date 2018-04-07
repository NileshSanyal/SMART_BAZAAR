<?php
	session_start();
	include "../connection/connection.php";
	
	$quantity = $_POST['qty'];
	$prod_id = $_GET['id'];

	if(!isset($_SESSION['cart'])){ // check if session stores cart for the first time
		$cart_items = array(
			'cart_item_id' => $prod_id,
			'cart_item_name' => $_POST['prod_name'],
			'cart_item_price' => $_POST['prod_price'],
			'cart_item_qty' => $_POST['qty']
		);

		$_SESSION['cart'][$prod_id] = $cart_items;
		header('location: cart_view.php?status=success');
	}
	else{ 						// cart already have some items
		//echo "Else part";die;
		$cart_items_id = array_column($_SESSION['cart'], "cart_item_id");
		if(in_array($prod_id, $cart_items_id)){
			// qty +=1;
			$_SESSION['cart'][$prod_id]['cart_item_qty'] += $quantity;
		}
		else{
			$_SESSION['cart'][$prod_id]['cart_item_id'] = $prod_id;
			$_SESSION['cart'][$prod_id]['cart_item_name'] = $_POST['prod_name'];
			$_SESSION['cart'][$prod_id]['cart_item_price'] = $_POST['prod_price'];
			$_SESSION['cart'][$prod_id]['cart_item_qty'] = $quantity;
		}

		header('location: cart_view.php?status=success');
	}
	//print "<pre>";
	//print_r($_SESSION['cart']);
	
