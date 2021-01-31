<?php 

    include 'connectiontoP3.php';

    if (isset($_POST['submit'])) {
        
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn2, $sql);
    $row = mysqli_fetch_assoc($result);

    if (mysqli_affected_rows($conn2) > 0) {

        if (password_verify($password, $row['password'])) {
        @session_start();
        $_SESSION['username'] = $row['username'];
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['level'] = $row['level'];
        header('location:../views/index.php');
        }
        else {
        echo "
        <script>
            alert('username password salah');
            window.location.href='../views/login.php';
        </script>
        ";
        }

    }
    else{
        echo "
        <script>
            alert('username password salah');
            window.location.href='../views/login.php';
        </script>
        ";
        exit();
    }
    

    }
    

?>
