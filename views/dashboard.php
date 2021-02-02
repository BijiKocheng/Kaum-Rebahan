<?php

require "../config/count.php";

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

  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>Account</h4>

        <p>Create New Member</p>
      </div>
      <div class="icon">
        <i class="fas fa-user-plus"></i>
      </div>
      <a href="addmember.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3><?= count(UsersList()); ?></h3>

        <p>Member Registered</p>
      </div>
      <div class="icon">
        <i class="fas fa-users"></i>
      </div>
      <a href="listmember.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3>Comic</h3>

        <p>Create New Comic</p>
      </div>
      <div class="icon">
        <i class="fas fa-book"></i>
      </div>
      <a href="comicAdd.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-secondary">
      <div class="inner">
        <h3><?= count(ComicList()); ?></h3>

        <p>Comics List</p>
      </div>
      <div class="icon">
        <i class="fas fa-list"></i>
      </div>
      <a href="comicList.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>

</div>
<!-- /.row -->
<?php include "../admin-templates/footer.php"; ?>