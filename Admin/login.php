<?php include("config.php"); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Order System</title>
    <link rel="stylesheet" href="admin.css">
</head>

<body>
    <div class="login">
        <h1 class="text-center">Login</h1>
        <!-- login form  -->
        <?php

        if (isset($_SESSION['login'])) {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }

        if(isset($_SESSION['no-login-message'])){
            echo $_SESSION['no-login-message'];
            unset($_SESSION['no-login-message']);
        }
        ?>
        <br><br>


        <form action="" method="post" class="text-center">
            Username: <br>
            <input type="text" name="username" placeholder="enter your username"> <br><br>
            Password: <br>
            <input type="password" name="password" placeholder="enter your password"><br><br>
            <input type="submit" name="submit" value="Login" class="btn-secondary"><br><br>
        </form>



        <!-- login form end  -->
        <p class="text-center">Created by <a href="#">Group 6</a></p>
    </div>

</body>

</html>

<?php

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password' ";

    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);



    if ($count == 1) {
        // user available & login success

        $_SESSION['login'] = "Login Successful";
        $_SESSION['user']=$username;
        header('location: index.php');
    } else {
        // user not available
        $_SESSION['login'] = "Login Failed. Username and password didn't match";
        header('location: index.php');
    }
}

?>