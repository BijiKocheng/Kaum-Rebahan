<?php 

 include "connectiontoP3.php";

 function UsersList(){

    global $conn2;
    $sql = "SELECT * FROM users";
    $query = mysqli_query($conn2, $sql);
    $data = array();
  

    while(($row = mysqli_fetch_assoc($query)) != null){
        $data[] =$row;
    }

    return $data;

}

function ComicList(){

    global $conn2;
    $sql = "SELECT * FROM comics";
    $query = mysqli_query($conn2, $sql);
    $data = array();

    while(($row = mysqli_fetch_assoc($query)) != null){
        $data[] =$row;
    }

    return $data;

}












?>