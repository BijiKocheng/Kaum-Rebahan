<?php 

require "connectiontoP3.php";

if (isset($_POST['submit'])) {
    
    $allExt = array('png', 'jpg');
    $namaFile = $_FILES['foto']['name'];
    $x = explode('.', $namaFile);
    $ext = strtolower(end($x));
    $size = $_FILES['foto']['size'];
    $tmp = $_FILES['foto']['tmp_name'];

    $newNama = uniqid();
    $newNama .= ".";
    $newNama .= $ext;
    
    //cek ekstensi file
    if (in_array($ext, $allExt) === true) {

        if ($size > 1000000) {
            echo "<script>
            alert('Ukuran gambar tidak lebih dari 10 MB');
            window.location.href='../views/addmember.php';
            </script>";
            exit();
        } else {
            move_uploaded_file($tmp, '../assets/img/users/'.$newNama);
        }
        
    }else {
        echo "<script>
            alert('Gambar harus berformat png atau jpg');
            window.location.href='../views/addmember.php';
        </script>";
        exit();
    }

    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $option = ['cost' => 10];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT, $option);
    $foto = $newNama;
    $level = $_POST['level'];
    $sql = mysqli_query($conn2, "INSERT INTO users VALUES ('', '$username', '$email', '$password', '$foto', '$level')");

    $row = mysqli_affected_rows($conn2);

    if ($row > 0) {
        echo "<script>
            alert('Data Berhasil di tambahkan');
            window.location.href='../views/dashboard.php';
        </script>";
    }else{
        echo "<script>
            alert('Data gagal di tambahkan');
            window.location.href='../views/addmember.php';
        </script>";
    }

}
?>