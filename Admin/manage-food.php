<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>manage food</h1>
        <br>
        <a href="add-food.php" style="background-color : green ; padding: 5px 10px; color:white ; display:inline-block ;">Add food</a>
      
        <br><br>
<?php
        
      if(isset($_SESSION['add']))
      {
          echo $_SESSION['add'] ;
          unset($_SESSION['add']) ;
      }
        if(isset($_SESSION['delete']))
        {
          echo $_SESSION['delete'] ;
          unset($_SESSION['delete']) ;
        }
        if(isset($_SESSION['upload']))
        {
          echo $_SESSION['upload'] ;
          unset($_SESSION['upload']) ;
        }
        if(isset($_SESSION['unauthorize']))
        {
          echo $_SESSION['unauthorize'] ;
          unset($_SESSION['unauthorize']) ;
        }
        if(isset($_SESSION['update']))
        {
          echo $_SESSION['update'] ;
          unset($_SESSION['update']) ;
        }
        ?>
        
        
        
        <table class="tbl-full">
            <tr>
                <th>SL</th>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
            
           <?php
            $sql = "SELECT * FROM food" ;
            $res = mysqli_query($conn,$sql) ;
            $count = mysqli_num_rows($res) ;
            
            $sn=1 ; //serial number create 
            
            if($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {
                    $id = $row['id'] ; //assign value
                     $title = $row['title'] ;
                     $description = $row['description'] ;
                     $price = $row['price'] ;
                     $image_name = $row['image_name'] ;
                     $featured = $row['featured'] ;
                     $active = $row['active'] ;
                    
                    
                    ?>
            
            <tr>
                <td><?php echo $sn++ ; ?></td>
                <td><?php echo $title; ?></td>
                <td><?php echo $description; ?></td>
                 <td><?php echo $price; ?></td>
                <td><?php
                    if($image_name=="")
                    {
                        echo "<div class='error' >Image not Added</div>" ;
                    }
                    
                    else
                    {
                    ?>    
                    
                    <img src="images/food/<?php echo $image_name ; ?>" width="100px"> ;
                    <?php
                    }
                    ?>
                </td>
               
                <td><?php echo $featured; ?></td>
                <td><?php echo $active; ?></td>

                <td>
                    <a href="update-food.php?id=<?php echo $id ; ?>"  style="background-color : gray ; padding: 5px 10px; color:white ; display:inline-block ;">Update Food</a>
                    <a href="delete-food.php?id=<?php echo $id ; ?>&image_name=<?php echo $image_name ; ?>"  style="background-color : red ; padding: 5px 10px; color:white ; display:inline-block ;">Delete Food</a>
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