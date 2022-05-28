<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE name = '$username' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
      header('location:index.php');
   }else{
      $message[] = 'incorrect password or email!';
   }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <h2>Login</h2>
    </div>

<form action="" method="post">
        
        <div class="input-group">
            <label for="username">Username</label>
            <input type="text" name="username">
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" name="password">
        </div>
        <div class="input-group">
        <input type="submit" name="submit" class="btn" value="login now">
        </div>
        <p>Not yet a member? <a href="register.php">Sign Up</a></p>
    </form>
</body>
</html>