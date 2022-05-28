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














<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
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
   <a href="index.php" class="btn">Continue Shopping</a>

</div>


</div>
    <div class="shopping-cart">
<h1 class="heading">Your order</h1>
<table>
      <thead>
         <th>name</th>
         <th>number</th>
         <th>payment</th>
         <th>shipping</th>
         <th>quantity</th>
         <th>total price</th>
         
      </thead>
      <tbody>
      <?php
         $order_query = mysqli_query($conn, "SELECT * FROM `order` WHERE user_id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($order_query) > 0){
            while($fetch_order = mysqli_fetch_assoc($order_query))
            {
      ?>
         <tr>
            <td><?php echo $fetch_order['name']; ?></td>
            <td><?php echo $fetch_order['number']; ?></td>
            <td><?php echo $fetch_order['pay_meth']; ?></td>
            <td><?php echo $fetch_order['ship_meth']; ?></td>
            <td><?php echo $fetch_order['total_products']; ?></td>
            <td><?php echo $fetch_order['total_price']; ?></td>
         </tr>
         
      <?php
         
            }
         }else{
            echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">order not found</td></tr>';
         }
      ?>
      
   </tbody>
   </table>
</div>
    </div>
</body>
</html>