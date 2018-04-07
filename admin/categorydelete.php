<?php
    include "../connection/connection.php";
	$catId = $_POST['catid'];
	$delete_category = "delete from category where id='$catId'";
	$res = mysqli_query($conn,$delete_category);
	if($res){
		echo "1";
	}
	else{
		echo "0";
	}
