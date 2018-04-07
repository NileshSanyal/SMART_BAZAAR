<?php
	session_start();
	if(isset($_GET['action'])){
		if($_GET['action'] == 'remove'){
			foreach($_SESSION['cart'] as $key => $value){
				if($value['cart_item_id'] == $_GET['id']){
					unset($_SESSION['cart'][$key]);
					header('location: cart_view.php');
				}
			}
		}
	}
