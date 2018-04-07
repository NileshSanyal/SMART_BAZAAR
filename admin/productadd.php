<?php
	 include "../connection/connection.php";
	$prod_name = $_POST['productnamefield'];
	$prod_price = $_POST['productpricefield'];
	$prod_desc = trim(addslashes($_POST['product-description']));
	$prod_image = time().$_FILES['prodImage']['name'];
	$prod_stock = $_POST['productstockfield'];
	$prod_status = $_POST['productstatus'];
	$prod_catid = $_POST['productcategory'];

	$temp_img = $_FILES['prodImage']['tmp_name'];
	$upload_dir = "./uploaded_product_images/";

	if(move_uploaded_file($temp_img,$upload_dir.$prod_image) && 
		is_writable($upload_dir)){
		$prod_insert_sql = "insert into `products`(cid,name,price,description,image,stock,is_active)";
		$prod_insert_sql .= " values('".$prod_catid."','".$prod_name."','".$prod_price."','".$prod_desc."','".$prod_image."','".$prod_stock."','".$prod_status."')"; 
		mysqli_query($conn,$prod_insert_sql);
		if(mysqli_affected_rows($conn) > 0){
			echo "1";
		}
		else{
			echo "0";

		}	
	}
	else{
		echo "0";
	}

	