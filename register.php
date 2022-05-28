<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password_1']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['password_2']));

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'user already exist!';
   }else{
      mysqli_query($conn, "INSERT INTO `user_form`(name, email, password) VALUES('$name', '$email', '$pass')") or die('query failed');
      $message[] = 'registered successfully!';
      
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>

    <link rel="stylesheet" href="pro.css">
</head>
<body>
<?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
}
?>
<div class="nav-container">
        <div class="wrapper">
            <nav>
                <div class="logo">
                    Withinsoul.co
                </div>
    
                <ul class="nav-items">
                    <li>
                        <a href="proj.html">Home</a>
                    </li>
                    
                    <li>
                        <a href="about.html">About</a>
                    </li>
    
                    <li>
                        <a href="contact.html">Contact</a>
                    </li>
    
                    <li>
                        <a href="register.php">Register</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

<div class="header">
        <h2>Register</h2>
    </div>

    <form action="" method="post">
       
        <div class="input-group">
            <label for="username">Username</label>
            <input type="text" name="name">
        </div>
        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" name="email">
        </div>
        <div class="input-group">
            <label for="password_1">Password</label>
            <input type="password" name="password_1">
        </div>
        <div class="input-group">
            <label for="password_2">Confirm Password</label>
            <input type="password" name="password_2">
        </div>
        <div class="input-group">
        <input type="submit" name="submit" class="btn" value="register now">
        </div>
        <p>Already a member? <a href="login.php">Sign in</a></p>
    </form>
</body>