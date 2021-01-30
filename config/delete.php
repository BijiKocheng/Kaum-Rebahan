<?php

require "connectiontoP3.php";

session_start();

if ($_SESSION['level'] != "admin") {
  
    echo "<script>
    alert('Anda bukan admin');
    window.location.href='../views/index.php';
    </script>";
    
    exit();
}

$id = $_GET['id'];

$sql = "DELETE FROM users WHERE id = '$id'";
$query = mysqli_query($conn2, $sql);

if (mysqli_affected_rows($conn2) > 0) {
    
    echo "<script>
    alert('Data Berhasil di Hapus!!');
    window.location.href='../views/listmember.php';
    </script>";

}
else{
    echo "<script>
    alert('Data Gagal Di hapus');
    window.location.href='listmember.php';
    </script>";
}



?>