<?php
session_start();
?>
<?php
include "config.php";
?>


<?php include('partials/menu.php');
?>

<!-- Main Content Section Start -->
<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>

        <br>
        <?php

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }


        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <!-- <tr>
                    <td>Name:</td>
                    <td><input type="text" name="name" placeholder="enter your name"></td>
                </tr>
                <tr>
                    <td>username:</td>
                    <td><input type="text" name="username" placeholder="enter your username"></td>
                </tr> -->
                <tr>
                    <td>Current password:</td>
                    <td><input type="password" name="current_password" placeholder="current password"></td>
                </tr>
                <tr>
                    <td>Updated password:</td>
                    <td><input type="password" name="new_password" placeholder="enter your new password"></td>
                </tr>
                <tr>
                    <td>Confirm password:</td>
                    <td><input type="password" name="confirm_password" placeholder="re-enter your new password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];


    $sql = "SELECT * FROM admin WHERE id=$id AND password='$current_password'";

    $res = mysqli_query($conn, $sql);

    if ($res == true) {
        $cnt = mysqli_num_rows($res);

        if ($cnt == 1) {

            if ($new_password == $confirm_password) {
                $sql2 = "UPDATE admin SET
                password='$new_password'
                WHERE id=$id";

                $res2 = mysqli_query($conn, $sql2);

                if ($res2 == true) {
                    $_SESSION['change-pass'] = "password changed";
                    header('location:manage-admin.php');
                } else {
                    $_SESSION['change-pass'] = "failed to change password ";
                    header('location:manage-admin.php');
                }
            } else {
                $_SESSION['pass-not-match'] = "password does not match";
                header('location:manage-admin.php');
            }
        } else {
            $_SESSION['user-not-found'] = "User not found";
            header('location:manage-admin.php');
        }
    }
}

?>
<!-- Main Content Section End -->

<?php include('partials/footer.php');
?>