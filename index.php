<?php include "./includes/connection.php";
        include "./includes/functions.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration System</title>
    <link rel="stylesheet" href="./styles/style.css">
</head>
<body>
<nav>
    <h1>Registration System By: Lucas Abbona</h1>
</nav>
<?php
if(isset($_POST['registrar'])){
    $fullname=$_POST['lastname'];
    $username=$_POST['username'];
    $userEmail=$_POST['email'];
    $password=$_POST['pass'];
    $pass_repeat=$_POST['pass_repeat'];

    if(userExists($username)||EmailExists($userEmail))
    {
        echo "<h3>This username or email is already register. Try another one.</h3>";
    }else{
    if($password !== $pass_repeat){
        echo "<p>Your passwors are not the same</p>";
    }else{
        if(strlen($username)<5){
            echo "<p>Your username is to short. It has to be more than 5 characters and less than 15.</p>";
        }else{
            if(strlen($username)>15){
            echo"<p>Your username is to long. It has to be more than 5 characters and less than 15.</p>";
            }else{
                if(strlen($password)<8){
            echo"<p>Your password has to be more than 8 characters and less than 16.</p>";
        }else{
            if(strlen($password)>16){
            echo"<p>Your password has to be more than 8 characters and less than 16.</p>";
            }else{
        $username=mysqli_real_escape_string($connection,$username);
        $userEmail=mysqli_real_escape_string($connection,$userEmail);
        $password=mysqli_real_escape_string($connection,$password);
        $pass_repeat=mysqli_real_escape_string($connection,$pass_repeat);

        $password=password_hash($password,PASSWORD_BCRYPT);
        $pass_repeat=password_hash($pass_repeat,PASSWORD_BCRYPT);

        $query="INSERT INTO users (lastname, username, user_email, password, password_repeat) VALUES ('{$fullname}', '{$username}', '{$userEmail}', '{$password}', '{$pass_repeat}')";
    $register=mysqli_query($connection,$query);
    echo "<h3>Registration Sucessful</h3>";
    }}}}}}
}
?>
    
    <form action="" method="post">
        <label for="">Full Name</label>
        <input type="text" name="lastname" required placeholder="Enter your Name">
        <label for="">Username</label>
        <input type="text" name="username" required   placeholder="Enter your username">
        <label for="">Email Address</label>
        <input type="email" name="email" required  placeholder="Enter your Email">
        <label for="">Password</label>
        <input type="password" name="pass" required placeholder="Enter your Password">
        <label for="">Repeat your Password</label>
        <input type="password" name="pass_repeat" required id="" placeholder="Enter your Password Again">
        <input class="boton" type="submit" value="Register" name="registrar">
    </form>
    <a class="login" href="./login.php">¿Do you have an account? Sign Up.</a>
    <br>
    <br>

</body>
</html>