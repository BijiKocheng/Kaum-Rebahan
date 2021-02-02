<?php 

require "connectiontoP3.php";

if (isset($_POST['submit'])) {

    $allExt = array('png', 'jpg');
    $nama_file = $_FILES['foto']['name'];
    $x = explode(".", $nama_file);
    $ext = strtolower(end($x));
    $ukuran = $_FILES['foto']['size'];
    $tmp = $_FILES['foto']['tmp_name'];

    $newName = uniqid();
    $newName .= '.';
    $newName .= $ext;
    

    // cek ekstensi file
    if (in_array($ext, $allExt) === true) {
        //cek ukuran file
        if ($ukuran > 1000000) {
            echo "<script>
            alert('File tidak lebih dari 10 Mb');
            window.location.href='../views/comicAdd.php';
            </script>";
            exit();
        }
        else{
            move_uploaded_file($tmp, '../assets/img/comics/'.$newName);
        }
    }else {
        echo "<script>
            alert('Tolong masukan gambar dengan benar');
            window.location.href='../views/comicAdd.php';
        </script>";
        exit();
    }
    
    $nama = $_POST['nama'];
    $title = strtolower($nama);
    $slug = str_replace(" ", "-", $title);
    $foto = $newName;
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $episode = $_POST['episode'];
    $deskripsi = $_POST['deskripsi'];

    $sql = "INSERT INTO comics VALUES ('', '$nama', '$slug', '$foto', '$penulis', '$penerbit', '$episode', '$deskripsi')";
    $query = mysqli_query($conn2, $sql);

    if (mysqli_affected_rows($conn2)) {
        echo "<script>
        alert('Data Comic berhasil ditambahkan!!');
        window.location.href='../views/dashboard.php';
      </script>";
    }

}





?>