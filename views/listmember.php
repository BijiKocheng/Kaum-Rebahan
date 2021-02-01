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

require "../config/connectiontoP3.php";

$sql = "SELECT * FROM users";
$query = mysqli_query($conn2, $sql);
$no = 1;

?>

<?php 

if (isset($_POST['search_submit'])) {

$search = $_POST['search'];
$query = mysqli_query($conn2, "SELECT * FROM users where
        username like '%$search%' OR
        email like '%$search%' OR
        password like '%$search%' OR
        level like '%$search%'");

}



?>

<?php include "../admin-templates/header.php"; ?>

<div class="row">
    <div class="col-12">
    <div class="card">
        <div class="card-header">
        <h3 class="card-title">Data Table User</h3>

        <div class="card-tools">
            <form action="" method="post" class="form-inline my-2 my-lg-0">
                <input class="form-control form-control-sm mr-sm-2" type="search" name="search" autofocus autocomplete="off" placeholder="Search Data" aria-label="Search">
                <button class="btn btn-sm btn-outline-success my-2 my-sm-0" name="search_submit" type="submit">Search</button>
            </form>
        </div>
        
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0 table-hover" style="height: 300px;">
        <table class="table table-head-fixed text-nowrap text-center">
            <thead>
            <tr>
                <th>No</th>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Level</th>
                <th>Option</th>
            </tr>
            </thead>
            <tbody>
        <?php while($data = mysqli_fetch_assoc($query)) :?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $data['id']; ?></td>
                <td><?= $data['username']; ?></td>
                <td><?= $data['email']; ?></td>
                <td><b><?= $data['level']; ?></b></td>
                <td>
                    <a href="edit.php?id=<?= $data['id']; ?>" class="btn btn-primary">Edit</a>
                    <a href="../config/delete.php?id=<?= $data['id'];?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <?php $no++; ?>
        <?php endwhile; ?>
            </tbody>
        </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
</div>

<div class="row">
    <div class="col-2">
        <a href="dashboard.php" class="btn btn-block btn-primary">Back</a>
    </div>
</div>

<?php include "../admin-templates/footer.php"; ?>