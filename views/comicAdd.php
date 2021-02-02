<?php 

session_start();

if (!isset($_SESSION['email'])) {

  echo "<script>
      alert('harap login terlebih dahulu');
      window.location.href='login.php';
    </script>";

}

if ($_SESSION['level'] != "admin") {

  echo "<script>
  alert('Anda bukan admin');
  window.location.href='index.php';
  </script>";
  
}

?>

<?php include "../admin-templates/header.php"; ?>

<div class="row">
    <div class="col-lg-6 p-3">
        <form action="../config/comicAdd.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleInputEmail1">Nama Komik</label>
            <input type="text" class="form-control" name="nama" autofocus required autocomplete="off" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Foto</label>
            <div class="custom-file">
                <input type="file" name="foto" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">PNG atau JPG</label>
            </div>
        </div>
        <div class="form-group">
            <label for="">Penulis</label>
            <input type="text" class="form-control" name="penulis" id="" required autocomplete="off">
        </div>
        <div class="form-group">
            <label for="">Penerbit</label>
            <input type="text" class="form-control" name="penerbit" id="" required autocomplete="off">
        </div>
        <div class="form-group">
            <label for="">Episode</label>
            <input type="text" class="form-control" name="episode" id="" required autocomplete="off">
        </div>
    </div>
    <div class="col-6 p-3">
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
        </div>
        <input type="submit" value="submit" name="submit" class="btn btn-primary">
        <a href="dashboard.php" class="btn btn-success">Back</a>
    </form>
    </div>
</div>

<?php include "../admin-templates/footer.php"; ?>