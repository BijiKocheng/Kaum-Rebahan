<?php 

    session_start();

    include 'connectiontoP3.php';
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE email = '".$email."' AND password = '".$password."'";
    $data = mysqli_query($conn2, $sql);
    $row = mysqli_fetch_assoc($data);

    if (isset($_POST['submit'])) {

    if (($row['email'] == $email  &&  $row['password'] == $password)) {
        @session_start();
        $_SESSION['username'] = $row['username'];
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['level'] = $row['level'];
        // print_r($_SESSION);
        // die();
        header('location:../views/index.php');
    }
    else{
        echo "
        <script>
            alert('username password salah');
            window.location.href='../views/login.php';
        </script>
        ";
    }

    // if (mysqli_num_rows($data) === 1) {
        
    //     //cek password
    //     $row = mysqli_fetch_assoc($data);
    //     if (password_verify($password, $row["password"])) {
            
    //         //set session
    //         $_SESSION['username'] = $username;
    //         $_SESSION['email'] = $email;
    //         $_SESSION['password'] = $password;
    //         header('location:index.php');
    //         exit;
    //     }

    // } else {
        
    //     echo "ngentod";
    // }
    

    

    }
    

?>
