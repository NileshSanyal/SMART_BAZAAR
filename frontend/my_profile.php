<?php
	include("templates/header.php");
 	include "../connection/connection.php";
    if(!isset($_SESSION['user_email'])){
        //header('location: login.php');
        echo '<script>window.location.href="login.php";</script>';
    }
    if(isset($_SESSION['user_email']) && !empty($_SESSION['user_email'])){
    	$uemail = $_SESSION['user_email'];
 ?>
<?php
    if(isset($_GET['action'])){
        if($_GET['action'] == 'buy'){


?> 
<div class="container">
<div class="row">
                            <div class="col-lg-12 col-xs-12 col-sm-12">
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-share font-dark hide"></i>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
    
                                        <?php
                                                $get_user_details = "select * from `user_details` where email='$uemail'";  
                                                $result = mysqli_query($conn,$get_user_details);
                                                $rowcount = mysqli_num_rows($result);
                                                if($rowcount >0){
                                                    $prow = mysqli_fetch_assoc($result);
                                        ?>
    
                                         <form action="" id="moreInfofrm" name="moreInfofrm" method="post">
                                         	<div class="alert alert-danger" id="profileErr"></div>
                                               <div class="form-group">
                                                <label class="control-label">Name</label>
                                                <input type="text" class="form-control" name="usernamefield" id="usernamefield" placeholder="Name" value="<?php echo isset($prow['full_name']) ? $prow['full_name'] : ''; ?>"><span class="highlight"></span><span class="bar"></span>
                                              </div> 
                                              <div class="form-group">     

                                                    <label class="control-label">Mobile Number</label>
                                                <input type="text" class="form-control" name="mobilefield" id="mobilefield" placeholder="Mobile Number" value="<?php echo isset($prow['mobile']) ? $prow['mobile'] : ''; ?>"><span class="highlight"></span><span class="bar"></span>
                                              </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Address</label>
                                                        <textarea name="userAddress" id="userAddress" class="wysihtml5 form-control" rows="5">
                                                            <?php echo isset($prow['Address']) ? $prow['Address'] : ''; ?>
                                                        </textarea>
                                                    </div>
                                                
                                                <input type="hidden" name="customer_name" id="customer_name" value="<?php echo $prow['full_name']; ?>" />

                                                <input type="hidden" name="customer_id" id="customer_id" value="<?php echo $prow['id']; ?>" />                                                
                                              <button style="width:15%;" type="submit" class="w3ls-cart" name="saveProfileBtn" id="saveProfileBtn">Place Order
                                                
                                              </button>
                                          </form>     
                                        <?php 
                                        
                                            }

                                        
                                        ?> 
                                    </div>
                                </div>
                            </div>
                        </div>
</div>

<?php
        }
    }
?>

<?php
    if(!isset($_GET['action'])){
?>

<div class="container">
<div class="row">
                            <div class="col-lg-12 col-xs-12 col-sm-12">
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-share font-dark hide"></i>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
    
                                        <?php
                                                $take_user_details = "select * from `user_details` where email='$uemail'";  
                                                $uresult = mysqli_query($conn,$take_user_details);
                                                $urowcount = mysqli_num_rows($uresult);
                                                if($urowcount >0){
                                                    $uprow = mysqli_fetch_assoc($uresult);
                                        ?>
    
                                         <form action="" id="saveInfofrm" name="saveInfofrm" method="post">
                                            <div class="alert alert-danger" id="profileErr"></div>
                                               <div class="form-group">
                                                <label class="control-label">Name</label>
                                                <input type="text" class="form-control" name="usernamefield" id="usernamefield" placeholder="Name" value="<?php echo isset($uprow['full_name']) ? $uprow['full_name'] : ''; ?>"><span class="highlight"></span><span class="bar"></span>
                                              </div> 
                                              <div class="form-group">     

                                                    <label class="control-label">Mobile Number</label>
                                                <input type="text" class="form-control" name="mobilefield" id="mobilefield" placeholder="Mobile Number" value="<?php echo isset($uprow['mobile']) ? $uprow['mobile'] : ''; ?>"><span class="highlight"></span><span class="bar"></span>
                                              </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Address</label>
                                                        <textarea name="userAddress" id="userAddress" class="wysihtml5 form-control" rows="5">
                                                            <?php echo isset($uprow['Address']) ? $uprow['Address'] : ''; ?>
                                                        </textarea>
                                                    </div>
                                                
                                                <input type="hidden" name="customer_name" id="customer_name" value="<?php echo $uprow['full_name']; ?>" />

                                                <input type="hidden" name="customer_id" id="customer_id" value="<?php echo $uprow['id']; ?>" />                                                
                                              <button style="width:15%;" type="submit" class="w3ls-cart" name="saveProfileBtn" id="saveProfileBtn">Update Profile
                                                
                                              </button>
                                          </form>     
                                        <?php 
                                        
                                            }

                                        
                                        ?> 
                                    </div>
                                </div>
                            </div>
                        </div>
</div>

<?php
    }
?>

 <?php include("templates/footer.php"); ?> 

<script  src="assets/js/profile/profilevalidation.js"></script>

 <?php
        }
 ?>