<?php 
	include "templates/header.php";
	include "../functions/strfunctions.php";
 ?>

<?php
	if(isset($_POST['searchBtn'])){
		$keyword = $_POST['searchTerm'];
		if($keyword !=''){ ?>

	<div class="products">	 
		<div class="container">
					<div class="col-md-9 product-w3ls-right">
				<!-- breadcrumbs --> 
				<ol class="breadcrumb breadcrumb1">
					<li><a href="index.php">Home</a></li>
					<li class="active">Products</li>
				</ol> 
				<div class="clearfix"> </div>
				<!-- //breadcrumbs -->
				<div class="product-top">
					<h4>Searched For <?php echo ucwords($keyword); ?></h4>
					  
					<div class="clearfix"> </div>
				</div>

				

				<div class="products-row">

					<?php

					$product_img_dir = "../admin/uploaded_product_images/";
					$sql_search ="select * from `products` where is_active='y' and  name LIKE '%" . $keyword ."%'";
      				$res_search =mysqli_query($conn, $sql_search) or die(mysqli_error($conn));
	  				$count_search=mysqli_num_rows($res_search);
	  				if($count_search >0){
	  					while($product_row = mysqli_fetch_assoc($res_search)){ ?>
					
					<div class="col-md-3 product-grids"> 

						<div class="agile-products">
							<a href="single_product.php?pid=<?php echo $product_row['id']; ?>"><img src="<?php echo $product_img_dir.$product_row['image']; ?>" height="80px" width="80px" class="img-responsive" alt="img"></a>
							<div class="agile-product-text">              
								<h5><a href="single_product.php?pid=<?php echo $product_row['id']; ?>"><?php echo $product_row['name']; ?></a></h5> 
								<h6>Rs.<?php echo $product_row['price']; ?></h6> 
								<form action="cart_add.php?id=<?php echo $product_row['id'] ?>" method="post">
									<input type="hidden" name="qty" value="1" />
									<button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
								</form> 
							</div>
						</div> 
					</div>

	  			<?php		}
	  				}else{
	  					echo '<div class="msg">';
						echo "<div class='alert alert-block alert-error fade in'>";
						echo "<strong><center><h3>No match found !</h3></strong>";
						echo "</div>";
					  	echo "</div>";
	  				}

	  			?>	
					<?php
						/*$catId = $_GET['catid'];
						$product_img_dir = "../admin/uploaded_product_images/";
						$specific_products = "SELECT * FROM `products` where is_active='y' and cid='$catId' ";
						$cresult = mysqli_query($conn,$specific_products);    
	                	while($productrow = mysqli_fetch_assoc($cresult)){*/
					?>	

					

					<?php
							
						//}
					?>

					<div class="clearfix"> </div>
				</div>
				
				

				<!-- add-products --> 
				<div class="w3ls-add-grids w3agile-add-products">
					<a href="#"> 
						<h4>TOP 10 TRENDS FOR YOU FLAT <span>20%</span> OFF</h4>
						<h6>Shop now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></h6>
					</a>
				</div> 
				<!-- //add-products -->
			</div>

			<div class="clearfix"> </div>
			<!-- recommendations -->
			<div class="recommend">
				<h3 class="w3ls-title">Our Recommendations </h3>
				<script>
					$(document).ready(function() { 
						$("#owl-demo5").owlCarousel({
					 
						  autoPlay: 3000, //Set AutoPlay to 3 seconds
					 
						  items :4,
						  itemsDesktop : [640,5],
						  itemsDesktopSmall : [414,4],
						  navigation : true
					 
						});
						
					}); 
				</script>
				<div id="owl-demo5" class="owl-carousel">

					<?php
						$products_img_dir = "../admin/uploaded_product_images/";
						
						$all_products = "SELECT * FROM `products` where is_active='y' order by RAND()";
						$allprodresult = mysqli_query($conn,$all_products);    
	                	while($allproductsrow = mysqli_fetch_assoc($allprodresult)){

					?>

					<div class="item">
						<div class="glry-w3agile-grids agileits">
							<!-- <div class="new-tag"><h6>20% <br> Off</h6></div> -->
							<a href="single_product.php?pid=<?php echo $allproductsrow['id']; ?>"><img src="<?php echo $products_img_dir.$allproductsrow['image']; ?>" alt="img"></a>
							<div class="view-caption agileits-w3layouts">           
								<h4><a href="single_product.php?pid=<?php echo $allproductsrow['id']; ?>"><?php echo $allproductsrow['name']; ?></a></h4>
								<p><?php echo custom_echo($allproductsrow['description'], 30); ?></p>
								<h5>Rs.<?php echo $allproductsrow['price']; ?></h5>
								<!-- <form action="#" method="post">
									<input type="hidden" name="cmd" value="_cart" />
									<input type="hidden" name="add" value="1" /> 
									<input type="hidden" name="w3ls_item" value="Women Sandal" /> 
									<input type="hidden" name="amount" value="20.00" /> 
									<button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
								</form> -->
							</div>        
						</div> 
					</div>

					<?php
						}
					?>

				</div>    
			</div>
			<!-- //recommendations -->
		</div>
	</div>

<?php	}
	}

?>	



<?php include "templates/footer.php"; ?>	
<script type="text/javascript">
	$('input.typeahead').typeahead({
	    source:  function (query, process) {
        return $.get('search_suggestions.php', { query: query }, function (data) {
        		console.log(data);
        		data = $.parseJSON(data);
	            return process(data);
	        });
	    }
	});
</script>