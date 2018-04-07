<?php 
	include "templates/header.php";
	include "../functions/strfunctions.php";
 ?>

 <div class="products">	 
		<div class="container">  
	
			<?php
				$prodId = $_GET['pid'];
				$prod_details = "SELECT * from `products` where id='$prodId'";
                $prodresult = mysqli_query($conn,$prod_details);
                if(mysqli_num_rows($prodresult) >0){
                	$prodrow = mysqli_fetch_assoc($prodresult);
                	$products_img_dir = "../admin/uploaded_product_images/";
			?>

			<div class="single-page">
				<div class="single-page-row" id="detail-21">
					<div class="col-md-6 single-top-left">	
						<div class="flexslider">
							<ul class="slides">
								<li data-thumb="<?php echo $products_img_dir.$prodrow['image']; ?>">
									<div class="thumb-image detail_images"> <img src="<?php echo $products_img_dir.$prodrow['image']; ?>" data-imagezoom="true" class="img-responsive" alt=""> </div>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-md-6 single-top-right">
						<h3 class="item_name"><?php echo $prodrow['name']; ?></h3>
						<div class="single-price">
							<ul>
								<li>Rs.<?php echo $prodrow['price']; ?></li>
							</ul>	
						</div> 
						<p class="single-price-text"><?php echo $prodrow['description']; ?></p>

						<form action="cart_add.php?id=<?php echo $prodrow['id'] ?>" method="post">
							<input type="hidden" name="qty" value="1" />
							<input type="hidden" name="prod_name" value="<?php echo $prodrow['name']; ?>">
							<input type="hidden" name="prod_price" value="<?php echo $prodrow['price']; ?>">
							<button type="submit" class="w3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
						</form> 

						<button class="w3ls-cart w3ls-cart-like"><i class="fa fa-heart-o" aria-hidden="true"></i> Add to Wishlist</button>
					</div>
				   <div class="clearfix"> </div>  
				</div>
				<div class="single-page-icons social-icons"> 
					<ul>
						<li><h4>Share on</h4></li>
						<li><a href="#" class="fa fa-facebook icon facebook"> </a></li>
						<li><a href="#" class="fa fa-twitter icon twitter"> </a></li>
						<li><a href="#" class="fa fa-google-plus icon googleplus"> </a></li>
						<li><a href="#" class="fa fa-dribbble icon dribbble"> </a></li>
						<li><a href="#" class="fa fa-rss icon rss"> </a></li> 
					</ul>
				</div>
			</div> 
			
			<?php
				}
			?>	

			<!-- recommendations -->
			<div class="recommend">
				<h3 class="w3ls-title">Products In Same Category </h3> 
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
						$prodID = $_GET['pid'];
						$prod_specific_cid = "select cid from `products` where id='$prodID'";	

						$recommended_products_img_dir = "../admin/uploaded_product_images/";

						$get_cid = mysqli_query($conn,$prod_specific_cid);

						$actual_cid = mysqli_fetch_assoc($get_cid);

						$category_id = $actual_cid['cid'];

						$recommended_products = "SELECT * FROM `products` where is_active='y' and cid='$category_id' and id !='$prodID' order by RAND()";
						$relatedprodresult = mysqli_query($conn,$recommended_products);    
	                	while($relatedproductsrow = mysqli_fetch_assoc($relatedprodresult)){
					?>

					<div class="item">
						<div class="glry-w3agile-grids agileits">
							<a href="single_product.php?pid=<?php echo $relatedproductsrow['id']; ?>"><img src="<?php echo $recommended_products_img_dir.$relatedproductsrow['image']; ?>" alt="img"></a>
							<div class="view-caption agileits-w3layouts">           
								<h4><a href="single_product.php?pid=<?php echo $relatedproductsrow['id']; ?>"><?php echo $relatedproductsrow['name']; ?></a></h4>
								<p><?php echo custom_echo($relatedproductsrow['description'], 30); ?></p>
								<h5>Rs.<?php echo $relatedproductsrow['price']; ?></h5>
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
			<!-- offers-cards --> 
			<div class="w3single-offers offer-bottom"> 
				<div class="col-md-6 offer-bottom-grids">
					<div class="offer-bottom-grids-info2">
						<h4>Special Gift Cards</h4> 
						<h6>More brands, more ways to shop. <br> Check out these ideal gifts!</h6>
					</div>
				</div>
				<div class="col-md-6 offer-bottom-grids">
					<div class="offer-bottom-grids-info">
						<h4>Flat $10 Discount</h4> 
						<h6>The best Shopping Offer <br> On Fashion Store</h6>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<!-- //offers-cards -->
		</div>
	</div>

	<?php include "templates/footer.php"; ?>	