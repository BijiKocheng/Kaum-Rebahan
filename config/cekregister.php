<?php 

require "connectiontoP3.php";

function insert($data){

    global $conn2;
    
    $username = strtolower(htmlspecialchars($data['username']));
    $email = htmlspecialchars($data['email']);
    $option = ['cost' => 10];
    $password = htmlspecialchars(password_hash($data['password'], PASSWORD_DEFAULT, $option));
    $level = "member";
    $sql = mysqli_query($conn2, "INSERT INTO users VALUES ('', '$username', '$email', '$password', '$level')");

    return mysqli_affected_rows($conn2);

}

?>