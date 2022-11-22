<?php
include "./includes/connection.php";
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System</title>
    <link rel="stylesheet" href="./styles/style.css">
</head>
<body>
<nav>
    <h1>Login System By: Lucas Abbona</h1>
</nav>
<?php
    if(isset($_POST['login'])){
        $userEmail=$_POST['user_email'];
        $userPassword=$_POST['password'];

    if(empty($userEmail) || empty($userPassword)){
        echo "<p>The fields can not be empty.</p>";
    }else{

        $userEmail=mysqli_real_escape_string($connection,$userEmail);
        $userPassword=mysqli_real_escape_string($connection,$userPassword);
        $query="SELECT * FROM users WHERE user_email = '{$userEmail}'";
        $user_login=mysqli_query($connection,$query);
        while($row=mysqli_fetch_array($user_login)){
            $db_id=$row['user_id'];
            $db_username=$row['username'];
            $db_userEmail=$row['user_email'];
            $db_userFullname=$row['lastname'];
            $db_userPassword=$row['password'];
        }
        if(password_verify($userPassword,$db_userPassword)){
            $_SESSION['username']=$db_username;
            $_SESSION['user_email']=$db_userEmail;
            $_SESSION['user_password']=$db_userPassword;
            header("Location: ./logedin.php");

        }else{
            echo"<p>Your password is incorrect.</p>";
        }
    }}
?>
<form action="" method="post">
    <label for="">Enter your Email address</label>
    <input type="email" name="user_email" placeholder="Your Email">
    <label for="">Enter your Password</label>
    <input type="password" name="password" placeholder="Your Password">
    <input class="botonin" type="submit" value="Login" name="login">
</form>
<p class="register"><a  href="./index.php">I dont have an account. Register </a></p>
</body>
</html>