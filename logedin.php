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
    <title>You are logged in</title>
    <link rel="stylesheet" href="./styles/style.css">
</head>
<body>
<nav>
    <h1>Login System By: Lucas Abbona</h1>
</nav>
    <h1 class="logedas">You are loged in as <?php echo $_SESSION['username']; ?></h1>
    <p><button class="botonout" ><a href="./includes/logout.php">Log out</a></button></p>
</body>
</html>