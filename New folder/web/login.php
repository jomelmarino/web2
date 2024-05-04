<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'user'){

        $_SESSION['user_name'] = $row['name'];
        header('location:user_page.php');

     }
     
   }else{
      $error[] = 'incorrect email or Student!';
   }

};
?>



















<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="login.css">
</head>
<body>
  <div class="login-box">
    <h2>Login</h2>
    <form action="" method="post">
      <div class="user-box">
        <input type="text" name="username" required>
        <label>Student Number</label>
      </div>
      <div class="user-box">
        <input type="password" name="password" required>
        <label>Email</label>
      </div>
      <a href="#">

        Login
      </a>
    </form>
  </div>
</body>
</html>