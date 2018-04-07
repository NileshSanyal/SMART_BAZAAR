<?php
	include "templates/header.php";
	include "../connection/connection.php";
	
	$cart_items = !empty($_SESSION['cart']) ? $_SESSION['cart'] : '';
?>


<?php
	if(empty($_SESSION['cart'])){


?>	
	<div class="container">
		<div class="row">	
			<h2 class="text-danger text-center">Your Shopping Cart is Empty!</h2>
			<a href="index.php" style="width:15%;margin-top: 12px;" class="w3ls-cart">Go Back To Home</a>
		</div>
	</div>
<?php
	}else{
?>


<div class="container">
	<div class="row">
		 
		  <table class="table">
		  	<tr>
		  		<th>S.NO</th>
		  		<th>Item Name</th>
		  		<th>Total Price</th>
		  		<th>Quantity</th>
		  		<th>Remove Product</th>
		  	</tr>
	  		<?php
	  			 $total = 0;
				 $i=1;
				 if(isset($cart_items) && !empty($cart_items)){
				 	foreach ($cart_items as $ckey => $cval) {
						$item_price = $cval['cart_item_price'] * $cval['cart_item_qty'];

	  		?>
		  		<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $cval['cart_item_name']; ?></td>
					<td><?php echo number_format($item_price,2); ?></td>
					
					<!-- <td><?php //echo $cval['cart_item_qty']; ?></td> --> <!-- previously worked -->
					
					<!-- newly added blocks -->
					<td>
						<div class="input-append">
							<input class="span1" style="max-width:34px;height: 25px;" placeholder="<?php echo $cval['cart_item_qty'];?>" id="appendedInputButtons" size="16" type="text">

							<a href="cart_update.php?update_plus_id=<?php echo $cval['cart_item_id'].'&item_counts='.$cval['cart_item_qty'];?>">
								<button class="btn" type="button">
									<i class="fa fa-plus" aria-hidden="true"></i>
								</button>
							</a>
							<a href="cart_update.php?update_minus_id=<?php echo $cval['cart_item_id'].'&item_counts='.$cval['cart_item_qty'];?>">
								<button class="btn" type="button">
									<i class="fa fa-minus" aria-hidden="true"></i>
								</button>
							</a>
					
						</div>
					</td>
					<!-- end of newly added blocks -->

					<td><a href="remove_cart_item.php?action=remove&id=<?php echo $cval['cart_item_id']; ?>">Remove</a></td>
				</tr>
			<?php 
					$total = $total + $item_price;
					$i++; 
				}
			?>	
				<tr>
					
					<?php 
						$total = $total + ($total * 12.5)/100;
					?>
					<td colspan="3" align="right">Grand Total</td>
					<td align="right">Rs.<?php echo number_format($total,2); ?>(Vat: 12.5%)</td>
				</tr>
			<?php
			}
			?>
		  </table>
			<a style="width:15%;text-decoration: none;" href="my_profile.php?action=buy" class="w3ls-cart">Checkout                               
            </a>
	</div>
</div>
<?php
	}
?>
<?php include "templates/footer.php"; ?>