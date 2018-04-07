<?php
	include "templates/header.php"; 
	include "../functions/strfunctions.php";
	if(!isset($_SESSION['user_email'])){
        //header('location: login.php');
        echo '<script>window.location.href="login.php";</script>';
    }else{
?>

	<div class="welcome"> 
		<div class="container"> 
			<div class="welcome-info">
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
				
					<div class="clearfix"> </div>
					<div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
							<h2 class="text-info text-center">Your Order Has Been Placed, thank you for shopping with Us!!</h2>  
			</div>  	
		</div>  	
	</div>

<?php include "templates/footer.php"; ?>	

<?php 
	}
?>