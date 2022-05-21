<?php include("config.php"); ?>
<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage category</h1>
        <br>
        <a href="add-category.php" style="background-color : green ; padding: 5px 10px; color:white ; display:inline-block ;">Add food</a>

        <br /><br />
        <?php

        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        if (isset($_SESSION['remove'])) {
            echo $_SESSION['remove'];
            unset($_SESSION['remove']);
        }

        if (isset($_SESSION['delete'])) {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }

        if (isset($_SESSION['no-category-found'])) {
            echo $_SESSION['no-category-found'];
            unset($_SESSION['no-category-found']);
        }

        if (isset($_SESSION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }

        if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }

        if (isset($_SESSION['failed-remove'])) {
            echo $_SESSION['failed-remove'];
            unset($_SESSION['failed-remove']);
        }

        ?>
        <br><br>
       

        <br /><br /><br />

        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Title</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th colspan="2" style="text-align:center;">Actions</th>
            </tr>

            <?php

            //Query to Get all CAtegories from Database
            $sql = "SELECT * FROM category";

            //Execute Query
            $res = mysqli_query($conn, $sql);

            //Count Rows
            $count = mysqli_num_rows($res);

            //Create Serial Number Variable and assign value as 1
            $sn = 1;

            //Check whether we have data in database or not
            if ($count > 0) {
                //We have data in database
                //get the data and display
                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    $featured = $row['featured'];
                    $active = $row['active'];

            ?>

                    <tr>
                        <td><?php echo $sn++; ?>. </td>
                        <td><?php echo $title; ?></td>

                        <td>
                            <?php
                            //Chcek whether image name is available or not
                            if ($image_name != "") {
                                //Display the Image
                            ?>

                                <!-- <img src="<?php //echo $SITEURL; 
                                                ?>images/category/<?php //echo $image_name; 
                                                                ?>" width="100px"> -->
                                <img src="images/category/<?php echo $image_name; ?>" width="100px">

                            <?php
                            } else {
                                //DIsplay the MEssage
                                echo "<div class='error'>Image not Added.</div>";
                            }
                            ?>

                        </td>

                        <td><?php echo $featured; ?></td>
                        <td><?php echo $active; ?></td>
                      <td>
                    <a href="update-category.php?id=<?php echo $id ; ?>"  style="background-color : gray ; padding: 5px 10px; color:white ; display:inline-block ;">Update Food</a>
                    <a href="delete-category.php?id=<?php echo $id ; ?>&image_name=<?php echo $image_name ; ?>"  style="background-color : red ; padding: 5px 10px; color:white ; display:inline-block ;">Delete Food</a>
                </td>
            </tr>
            
            
            
            
            
                    <?php
                    
                }
            }
            else
            {
                echo "<tr> <td colspan='7' class='error'>Food not Added any </td></tr>" ;
            }
            ?>
            
            
            
            
            
            

           

        </table>
    </div>

</div>

<?php include('partials/footer.php'); ?>