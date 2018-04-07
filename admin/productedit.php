<?php
    include "../connection/connection.php";

    $prod_name = $_POST['productnamefield'];
   
    $prod_cat = $_POST['productcategory'];
    $prod_price = $_POST['productpricefield'];
    $prod_desc = trim($_POST['product-description']);
    $stock = $_POST['productstockfield'];
    $prod_status = $_POST['productstatus'];
    $prod_id = $_POST['prodid'];

	$upload_dir = "./uploaded_product_images/";

    if(!empty($_FILES['prodImage']['name'])){
    	 $prod_image = time().$_FILES['prodImage']['name'];
		 $temp_img = $_FILES['prodImage']['tmp_name'];

		 // get previous image and delete that, then upload new image if available
		$get_prev_image = "select image from `products` where id='$prod_id'";
		$result = mysqli_query($conn,$get_prev_image);
		$row = mysqli_fetch_assoc($result);
		$deleted_filename = $upload_dir.$row['image'];

		if($deleted_filename!=''){
			unlink($deleted_filename);
			if(move_uploaded_file($temp_img,$upload_dir.time().$_FILES['prodImage']['name']) && 
		is_writable($upload_dir)){
		 		$prod_update_sql = "update `products` set name='$prod_name',cid='$prod_cat',price='$prod_price',description='$prod_desc',is_active='$prod_status',image='$prod_image',stock='$stock' where id='$prod_id'";
				mysqli_query($conn,$prod_update_sql);
				if(mysqli_affected_rows($conn) >= 0){
					echo "1";
				}
				else{
					echo "0";

				}
		 }

		} 
    }
    else{
    	 $prod_update_sql = "update `products` set name='$prod_name',cid='$prod_cat',price='$prod_price',description='$prod_desc',is_active='$prod_status',stock='$stock' where id='$prod_id'";
		mysqli_query($conn,$prod_update_sql);
		if(mysqli_affected_rows($conn) >= 0){
			echo "1";
		}
		else{
			echo "0";

		}
    }


	