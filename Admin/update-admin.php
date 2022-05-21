<?php
session_start();
?>



<?php include('partials/menu.php');
?>

<!-- Main Content Section Start -->
<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>

        <br>

        <?php
        include "config.php";
        $id = $_GET['id'];
        $sql = "SELECT * FROM admin WHERE id='$id'";
        $res = mysqli_query($conn, $sql);
        if ($res == true) {
            $cnt = mysqli_num_rows($res);
            if ($cnt == 1) {
                // echo "Admin available";
                $row = mysqli_fetch_assoc($res);
                $name    =    $row['name'];
                $username    =    $row['username'];
            } else {
                header("location:manage-admin.php");
            }
        }
        ?>
        <br>


        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Name:</td>
                    <td><input type="text" name="name" value="<?php echo $name; ?>"></td>
                </tr>
                <tr>
                    <td>username:</td>
                    <td><input type="text" name="username" value="<?php echo $username; ?>"></td>
                </tr>
                <!-- <tr>
                    <td>password:</td>
                    <td><input type="password" name="password" placeholder="update password"></td>
                </tr> -->
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>


<?php
//check whether the submit button clicked or not
if (isset($_POST['submit'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $username = $_POST['username'];

    $sql = "UPDATE admin SET 
    name='$name',
   username='$username'
   WHERE id = '$id'
";


    $res = mysqli_query($conn, $sql);
    if ($res == true) {
        // Admin updated
        $_SESSION['update'] = "Admin updated";
        header('location:manage-admin.php');
    } else {
        // Admin failed to  update
        $_SESSION['update'] = "Admin failed to  update";
        header('location:manage-admin.php');
    }
}
?>


<!-- Main Content Section End -->

<?php include('partials/footer.php');
?>