<?php 

require "connectiontoP3.php";

function login(){

    global $conn2;
    $email = $_POST['email'];
    $password = $_POST['password']; 
    $query = mysqli_query($conn2, "SELECT * FROM users WHERE email = '$email'");
    $row = mysqli_fetch_assoc($query);
    $tod = mysqli_affected_rows($conn2);
    return $tod;

}






?>