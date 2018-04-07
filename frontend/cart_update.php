<?php
   session_start();
   include "../connection/connection.php";

//FOR INCREASING PRODUCT QUANTITY
if(isset($_GET['update_plus_id'])){

   $update_plus_id = isset($_GET['update_plus_id']) ? $_GET['update_plus_id'] : "";
   $item_counts = isset($_GET['item_counts']) ? $_GET['item_counts'] : "";

   $sql="select stock from `products` where id=$update_plus_id";
   $res=mysqli_query($conn,$sql);
   $row=mysqli_fetch_assoc($res);
   $stock=$row['stock'];
   
   if($item_counts < $stock){
      $_SESSION['cart'][$update_plus_id]['cart_item_qty'] += 1;
      header('location: cart_view.php?status=success');
      exit();
   }
   
   else{
      header('location: cart_view.php?status=out_of_stock&stock='.$stock);
      exit();
   }
  
}


//FOR DECREASING PRODUCT QUANTITY
if(isset($_GET['update_minus_id'])){

   echo 'Minus button clicked';//die;

   $update_minus_id = isset($_GET['update_minus_id']) ? $_GET['update_minus_id'] : "";
   $item_counts = isset($_GET['item_counts']) ? $_GET['item_counts'] : "";
   
   if($item_counts!=1){
      $_SESSION['cart'][$update_minus_id]['cart_item_qty'] -= 1;
      header('location: cart_view.php?status=success');
      exit();
   }
   
   else{  
      unset($_SESSION['cart'][$update_minus_id]);
      header('location: cart_view.php?status=success');
      exit();
   }
}