<?php
include("config.php");
?>

<?php

$id = $_GET['id'];
$sql = "DELETE from admin where id='$id'";

$res = mysqli_query($conn, $sql);
if ($res == true) {
    $_SESSION['delete'] = 'Admin deleted ';
    header('location:manage-admin.php');
} else {
    $_SESSION['delete'] = "failed to delete admin";
    header('location:manage-admin.php');
}
