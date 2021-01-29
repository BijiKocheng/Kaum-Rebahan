<?php 

session_start();
if (isset($_SESSION['email'])) {
    session_destroy();
    echo "<script>
        alert('Berhasil Logout!!');
        window.location.href='../views/login.php';
    </script>";
} else {
    echo "<script>
        alert('Gagal logout!');
        window.location.href='../views/dashboard/dashboard.php';
    </script>";
}

?>