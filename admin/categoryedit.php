<?php
    include "../connection/connection.php";
    $cat_name = $_POST['catname'];
	$cat_status = $_POST['catstatus'];
	$cat_id = $_POST['catId'];
	$cat_update_sql = "update `category` set cat_name='$cat_name',is_active='$cat_status' where id='$cat_id'";
	mysqli_query($conn,$cat_update_sql);
	if(mysqli_affected_rows($conn) >= 0){
		echo "1";
	}
	else{
		echo "0";

	}