<?php 
	include "templates/header.php";
	include "../functions/strfunctions.php";
 ?>

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
					<?php
						$catId = $_GET['catid'];
						$cat_name = "SELECT cat_name FROM `category` WHERE id='$catId' ";
						$catnameresult = mysqli_query($conn,$cat_name);    
	                	$catnamerow = mysqli_fetch_assoc($catnameresult);
					?>
					<h4><?php echo $catnamerow['cat_name']; ?></h4>
					<div class="clearfix"> </div>
				</div>

				

				<div class="products-row">

					<?php
						$catId = $_GET['catid'];
						$product_img_dir = "../admin/uploaded_product_images/";
						$specific_products = "SELECT * FROM `products` where is_active='y' and cid='$catId' ";
						$cresult = mysqli_query($conn,$specific_products);  
						
						$tot_spec_products = mysqli_num_rows($cresult);

						$limit = 4;
						$start = 0;

						$total_pages = ceil( $tot_spec_products / $limit); 	
						$page = '';
						if(isset($_REQUEST['page'])){
							$start = ($_REQUEST['page'] - 1) * $limit;
						}
						

						$specific_products = "SELECT * FROM `products` where is_active='y' and cid='$catId' LIMIT $start,$limit ";
						$cresult = mysqli_query($conn,$specific_products);	

	                	while($productrow = mysqli_fetch_assoc($cresult)){
					?>	

					<div class="col-md-3 product-grids"> 
						<div class="agile-products">
							<a href="single_product.php?pid=<?php echo $productrow['id']; ?>"><img src="<?php echo $product_img_dir.$productrow['image']; ?>" height="80px" width="80px" class="img-responsive" alt="img"></a>
							<div class="agile-product-text">              
								<h5><a href="single_product.php?pid=<?php echo $productrow['id']; ?>"><?php echo $productrow['name']; ?></a></h5> 
								<h6>Rs.<?php echo $productrow['price']; ?></h6> 
								<form action="cart_add.php?id=<?php echo $productrow['id'] ?>" method="post">
									<input type="hidden" name="qty" value="1" />
									<input type="hidden" name="prod_name" value="<?php echo $productrow['name']; ?>">
									<input type="hidden" name="prod_price" value="<?php echo $productrow['price']; ?>">
									<button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
								</form> 
							</div>
						</div> 
					</div>

					<?php
							
						}
					?>

					<div class="clearfix"> </div>
				</div> <!-- end .products-row -->
				
				<!-- pagination -->
				<div class="text-center">
					<ul class="pagination pagination-md">
					<?php

						for($i=1;$i<=$total_pages;$i++){
							echo "<li><a href='?page=$i&catid=$catId'>$i</a></li>";
						}

					?>
					</ul>
				</div>
				<!-- end of pagination -->

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

<?php include "templates/footer.php"; ?>	