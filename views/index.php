<?php 

    session_start();
    if (!isset($_SESSION['username'])) {
        echo "<script>
        alert('harap login terlebih dahulu');
        window.location.href='login.php';
        </script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstra/style.css">
</head>
<body>
<div class="jumbotron">
  <h1 class="display-4">Hello, <?= $_SESSION['username']; ?>!</h1>
    <?php if($_SESSION['level'] == 'admin') : ?>
        <a href="dashboard.php">Dashboard</a>
    <?php endif; ?>
  <hr class="my-4">
  <p><?php print_r($_SESSION);   ?></p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="../config/logout.php" role="button">logout</a>
  </p>
</div>
</body>
</html>