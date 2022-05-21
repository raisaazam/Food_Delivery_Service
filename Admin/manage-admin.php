<?php include("config.php"); ?>

<?php
include('partials/menu.php');
?>

<!-- Main Content Section Start -->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Admin</h1>
        <br>
        <?php

        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }



        if (isset($_SESSION['delete'])) {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }

        if (isset($_SESSION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
        if (isset($_SESSION['user-not-found'])) {
            echo $_SESSION['user-not-found'];
            unset($_SESSION['user-not-found']);
        }
        if (isset($_SESSION['pass-not-match'])) {
            echo $_SESSION['pass-not-match'];
            unset($_SESSION['pass-not-match']);
        }
        if (isset($_SESSION['change-pass'])) {
            echo $_SESSION['change-pass'];
            unset($_SESSION['change-pass']);
        }
        ?>
        <br>
        <!-- button to add admin  -->

        <a href="add-admin.php" class="btn-primary">Add admin</a>
        <br><br>

        <table class="tbl-full">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Username</th>
                <th colspan="3" style="text-align:center;">Actions</th>
            </tr>

            <tr>
                <?php
                $sql = "SELECT * FROM admin";
                $res = mysqli_query($conn, $sql);

                if ($res == TRUE) {
                    $count = mysqli_num_rows($res);
                    $sl = 1;

                    if ($count > 0) {


                        while ($rows = mysqli_fetch_assoc($res)) {
                            $id = $rows['id'];
                            $name = $rows['name'];
                            $username = $rows['username'];

                ?>


            <tr>
                <td><?php echo $sl++; ?></td>
                <td><?php echo  $name  ?></td>
                <td><?php echo $username ?></td>
                <td><a href="update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a></td>
                <td><a href="update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update admin</a></td>
                <td><a href="delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete admin</a></td>
            </tr>






<?php
                        }
                    } else {
                    }
                }




                // if ($result->num_rows > 0) {

                //     // output data of each row
                //     while ($row = $result->fetch_assoc()) {
                //         $id = $row['id'];
                //         $update = '<a href="#" class="btn-secondary">Update admin</a>';
                //         $delete = '<a href="delete-admin.php" id=' . $id . ' class="btn-danger">Delete admin</a>';
                //         echo '<tr>';
                //         echo '<td>' . $sl++ . '</td>';
                //         echo '<td>' . $row['name'] . '</td>';
                //         echo '<td>' . $row['username'] . '</td>';
                //         echo '<td>' . $update  . '</td>';
                //         echo '<td><a href="delete-admin.php" id="' . $id . '" class="btn-danger">Delete admin</a></td>';
                //         echo '</tr>';
                //     }
                // } else {
                //     echo "no entry found";
                // }
?>
</tr>



        </table>

    </div>
</div>


<!-- Main Content Section End -->

<?php include('partials/footer.php');
?>