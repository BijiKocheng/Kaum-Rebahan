<?php 

require "../config/connectiontoP3.php";

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

    $d = $_GET['id'];    
    $sql = "SELECT * FROM users where id = '$d'";
    $query = mysqli_query($conn2, $sql);
    $data = mysqli_fetch_assoc($query);

if (isset($_POST['submit'])) {

    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    $sql = "UPDATE users SET id = '$id', username = '$username', email = '$email', password = '$password', level = '$level' WHERE id ='$id'";
    $query = mysqli_query($conn2, $sql);

    if (mysqli_affected_rows($conn2) > 0) {
        echo "
            <script>
                alert('Data Berhasil Diedit!');
                document.location.href='listmember.php';
            </script>
        ";
    }
    else {
        echo "
            <script>
                alert('Data Gagal Diedit!');
                document.location.href='edit.php';
            </script>
        ";
    }
}
?>

<?php include "../admin-templates/header.php"; ?>

<div class="pt-2 col-md-8">
    <h3>Edit data user <?= $data['username']; ?></h3>
    <form action="" method="post">
    <input type="hidden" name="id" value="<?= $data['id']; ?>">
    <div class="form-group">    
        <label for="exampleInputEmail1">Username</label>
        <input type="text" class="form-control" name="username" required autocomplete="off" autofocus id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $data['username']; ?>">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" value="<?= $data['email']; ?>" required autocomplete="off" id="email">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="text" class="form-control" name="password" required autocomplete="off" id="exampleInputPassword1" value="<?= $data['password']; ?>">
    </div>
    <div class="form-group">
        <label for="level">Level</label>
        <select class="custom-select" name="level" id="level">
            <option value="member">Member</option>
            <option value="admin">Admin</option>
        </select>
    </div>
    <input type="submit" value="submit" name="submit" class="btn btn-primary">
    <a href="listmember.php" class="btn btn-success">Back</a>
    </form>
</div>

<?php include "../admin-templates/footer.php"; ?>