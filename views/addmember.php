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

require "../config/register.php";

if (isset($_POST['submit'])) {
        
    if (insert($_POST) > 0) {
        
        echo "
            <script>
                alert('Data berhasil ditambahkan!');
                document.location.href='dashboard.php';
            </script>
        ";

    }

    else{

        echo "
            <script>
                alert('Data Gagal ditambahkan!');
                document.location.href='addmember.php';
            </script>
        ";

    }

}

?>

<?php include "../admin-templates/header.php"; ?>

<div class="pt-2 col-md-8">
    <h3>Form Add new member</h3>
    <form action="" method="post">
    <input type="hidden" name="id">
    <div class="form-group">
        <label for="exampleInputEmail1">Username</label>
        <input type="text" class="form-control" name="username" required autocomplete="off" autofocus id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" placeholder="Enter Email" required autocomplete="off" id="email">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" name="password" required autocomplete="off" id="exampleInputPassword1" placeholder="Enter password">
    </div>
    <div class="form-group">
        <label for="level">Level</label>
        <select class="custom-select" name="level" id="level">
            <option selected>Select Level Member</option>
            <option value="admin">Admin</option>
            <option value="member">Member</option>
        </select>
    </div>
    <input type="submit" value="submit" name="submit" class="btn btn-primary">
    <a href="dashboard.php" class="btn btn-success">Back</a>
    </form>
</div>

<?php include "../admin-templates/footer.php"; ?>