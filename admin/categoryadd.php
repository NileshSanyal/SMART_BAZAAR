<?php
    include "../connection/connection.php";
	$cat_name = $_POST['catname'];
	$cat_status = $_POST['catstatus'];

	$cat_insert_sql = "insert into `category`(cat_name,is_active) values('$cat_name','$cat_status')";

	mysqli_query($conn,$cat_insert_sql);
	if(mysqli_affected_rows($conn) > 0){
		echo "1";
	}
	else{
		echo "0";

	}
