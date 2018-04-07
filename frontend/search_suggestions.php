<?php
	include("../connection/connection.php");

	$sql = "SELECT name FROM `products` 
			WHERE name LIKE '%".$_GET['query']."%'
			LIMIT 10"; 
	$result = mysqli_query($conn,$sql);
	

	$json = [];
	while($row = mysqli_fetch_assoc($result)){
	     $json[] = $row['title'];
	}


	echo json_encode($json);