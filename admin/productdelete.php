<?php
    include "../connection/connection.php";
	$prodId = $_POST['prodId'];
	$upload_dir = "./uploaded_product_images/";
	$get_prev_image = "select image from `products` where id='$prodId'";
	$result = mysqli_query($conn,$get_prev_image);
    $row = mysqli_fetch_assoc($result);
    $deleted_filename = $upload_dir.$row['image'];
	$delete_product = "delete from `products` where id='$prodId'";
	$res = mysqli_query($conn,$delete_product);
	if($res){
		unlink($deleted_filename);
		echo "1";
	}
	else{
		echo "0";
	}
