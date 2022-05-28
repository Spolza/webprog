<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
};
?>
<?php


if(isset($_POST['order_btn'])){

   $name = $_POST['name'];
   $number = $_POST['number'];
   $pay_meth = $_POST['pay_method'];
   $ship_meth = $_POST['ship_method'];
   $address = $_POST['address'];
   $post_code = $_POST['post_code'];

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart`WHERE user_id = '$user_id'");
   $price_total = 0;
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['name'] .' ('. $product_item['quantity'] .') ';
         $product_price = $product_item['price'] * $product_item['quantity'];
         $price_total += $product_price;
      };
   };

   $total_product = implode(', ',$product_name);
   $detail_query = mysqli_query($conn, "INSERT INTO `order`(user_id,name, number,pay_meth,ship_meth,address,postal, total_products, total_price) 
   VALUES('$user_id','$name','$number','$pay_meth','$ship_meth','$address','$post_code','$total_product','$price_total')") or die('query failed');

   if($cart_query && $detail_query){
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>thank you for shopping!</h3>
         <div class='order-detail'>
            <span>".$total_product."</span>
            <span class='total'> total : $".$price_total."/-  </span>
         </div>
         <div class='customer-details'>
            <p> your name : <span>".$name."</span> </p>
            <p> your number : <span>".$number."</span> </p>
            <p> your address : <span>".$address.", ".$post_code."</span> </p>
            <p> your payment mode : <span>".$pay_meth."</span> </p>
            <p> your shipping mode : <span>".$ship_meth."</span> </p>
         </div>
            <a href='index.php' class='btn'>continue shopping</a>
            <a href='view.php' class='btn'>view your order</a>
         </div>
      </div>
      ";
      mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
   }

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style2.css">
    <title>Document</title>
</head>
<body>

<div class="container">
<div class="user-profile">

<?php
   $select_user = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
   if(mysqli_num_rows($select_user) > 0){
      $fetch_user = mysqli_fetch_assoc($select_user);
   };
?>

<p> username : <span><?php echo $fetch_user['name']; ?></span> </p>
<p> email : <span><?php echo $fetch_user['email']; ?></span> </p>
<div class="flex">
   <a href="proj.html" class="btn">Home</a>
   <a href="index.php?logout=<?php echo $user_id; ?>" onclick="return confirm('are your sure you want to logout?');" class="delete-btn">logout</a>

</div>


</div>

<div class="shopping-cart">
<h1 class="heading">Your order</h1>
<table>
      <thead>
         <th>image</th>
         <th>name</th>
         <th>price</th>
         <th>quantity</th>
         <th>total price</th>
         
      </thead>
      <tbody>
      <?php
         $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
         $grand_total = 0;
         if(mysqli_num_rows($cart_query) > 0){
            while($fetch_cart = mysqli_fetch_assoc($cart_query))
            {
      ?>
         <tr>
            <td><img src="pic2.jpg" height="100" alt=""></td>
            <td><?php echo $fetch_cart['name']; ?></td>
            <td>$<?php echo $fetch_cart['price']; ?>/-</td>
            <td>$<?php echo $fetch_cart['quantity']; ?>/-</td>
            <td>$<?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</td>
         </tr>
         
      <?php
         $grand_total += $sub_total;
            }
         }else{
            echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">no item added</td></tr>';
         }
      ?>
      <tr class="table-bottom">
         <td colspan="4">grand total :</td>
         <td>$<?php echo $grand_total; ?>/-</td>
      </tr>
   </tbody>
   </table>
</div>

</div>
<div class="checkout-form">
<form action="" method="post">
<div class="flex">
         <div class="inputBox">
            <span>your name</span>
            <input type="text" placeholder="enter your name" name="name" required>
         </div>
         <div class="inputBox">
            <span>your number</span>
            <input type="text" placeholder="enter your number" name="number" required>
         </div>
         <div class="inputBox">
            <span>payment method</span>
            <select name="pay_method">
               <option value="cash on delivery" selected>cash on devlivery</option>
               <option value="credit card">credit card</option>
               <option value="transfer">transfer</option>
            </select>
         </div>
         <div class="inputBox">
            <span> shipping method</span>
            <select name="ship_method">
               <option value="ems" selected>ems</option>
               <option value="register">register</option>
               <option value="kerry">kerry</option>
            </select>
         </div>
         <div class="inputBox">
            <span>address</span>
            <input type="text" placeholder="address" name="address" required>
         </div>
         <div class="inputBox">
            <span>post code</span>
            <input type="text" placeholder="post cost" name="post_code" required>
         </div>
         
      </div>
     <input type="submit" value="order now" name="order_btn" class="btn">
         <a href="index.php" class="btn">Back</a>



</form>
</div>
 
</div>
</body>
</html>