<?php
include "./includes/connection.php";

function userExists($username){
    global $connection;
    $query="SELECT username FROM users WHERE username = '$username'";
    $result=mysqli_query($connection,$query);
    if(mysqli_num_rows($result)>0){
        return true;
    }else{
        return false;
    }
}
function EmailExists($email){
    global $connection;
    $query="SELECT user_email FROM users WHERE user_email = '$email'";
    $result=mysqli_query($connection,$query);
    if(mysqli_num_rows($result)>0){
        return true;
    }else{
        return false;
    }
}
