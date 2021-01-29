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

<?php include "../admin-templates/header.php"; ?>

<div class="row">
    <div class="col-12">
    <div class="card">
        <div class="card-header">
        <h3 class="card-title">Data Table User</h3>

        <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 200px;">
            <input type="text" name="table_search" autocomplete="off" autofocus class="form-control float-right" placeholder="Search">

            <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
                </button>
            </div>
            </div>
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
                <th>Password</th>
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
                <td><?= $data['password']; ?></td>
                <td><b><?= $data['level']; ?></b></td>
                <td>
                    <a href="edit.php?id=<?= $data['id']; ?>" class="btn btn-primary">Edit</a>
                    <a href="delete.php?id=<?= $data['id']; ?>" class="btn btn-danger">Delete</a>
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