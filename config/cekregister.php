<?php 

require "connectiontoP3.php";

    $allExt = array('png', 'jpg');
    $nama_file = $_FILES['photo']['name'];
    $x = explode('.', $nama_file);
    $ext = strtolower(end($x));
    $size = $_FILES['photo']['size'];
    $tmp = $_FILES['photo']['tmp_name'];

    $newFile = uniqid();
    $newFile .= ".";
    $newFile .= $ext;

    //cek ekstensi file gambar
    if (in_array($ext, $allExt) === true) {
        //cek ukuran gambar
        if ($size < 1000000) {
            move_uploaded_file($tmp, '../assets/img/users/' . $newFile);
        }else{
            echo "<script>
            alert('File tidak lebih dari 10 Mb');
            window.location.href='../views/register.php';
            </script>";
            exit();
        }
    }else {
        echo "<script>
            alert('Masukan gambar dengan benarr');
            window.location.href='../views/register.php';
            </script>";
            exit();
    }

    
    $username = strtolower(htmlspecialchars($_POST['username']));
    $email = htmlspecialchars($_POST['email']);
    $option = ['cost' => 10];
    $password = htmlspecialchars(password_hash($_POST['password'], PASSWORD_DEFAULT, $option));
    $foto = $newFile;
    $level = "member";
    $sql = mysqli_query($conn2, "INSERT INTO users VALUES ('', '$username', '$email', '$password', '$foto', '$level')");

    $row = mysqli_affected_rows($conn2);

    if ($row > 0) {
        echo "<script>
        alert('Akun berhasil dibuat');
        window.location.href='../views/login.php';
        </script>";

    }



?>