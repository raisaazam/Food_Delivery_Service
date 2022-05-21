
<?php include('../partial-front/nav.php') ; ?>
<!-- search section starts -->
   <section class="search text-center">
        <div class="container">
            <?php
            $search = $_POST['food-search'] ;
            ?>
            <h2>Food on Search<a href="#" class="text-white"><?php echo $search ;?></a></h2>
        </div>
    </section>
    <!-- search section ends -->
<!-- food menu section starts -->
        <section class="food-menu">
             <div class="container">
             <h2 class="text-center">Food Menu</h2>
                 
                 <?php
                 
                     $sql = "SELECT * FROM food WHERE title LIKE '%$search%' OR description LIKE '%search%'" ;
                     $res = mysqli_query($conn, $sql);
                     $count = mysqli_num_rows($res);
                     if ($count > 0) 
                     {
                         while ($row = mysqli_fetch_assoc($res)) {
                            $id = $row['id'];
                            $title = $row['title'];
                            $price = $row['price'] ;
                            $description = $row['description'] ;
                             $image_name = $row['image_name'];
                             ?>
                               <div class="menu">
                     <div class="food-menu-img">
                          <?php
                        //Chcek whether image name is available or not
                        if ($image_name == "") {
                            
                        

                              echo "<div class='error'>Image not Added.</div>";

                       
                        } else {
                            ?>
                           <img src="../Admin/images/food/<?php echo $image_name ; ?>" alt="Appetizer" class="img-responsive img-radious">
                            <?php
                        }
                        ?>
                         
                     </div>
                     <div class="food-menu-desc">
                         <h4><?php echo $title ; ?></h4>
                         <p class="food-price"><?php echo $price ; ?></p>
                         <p class="food-detail">
                             <?php echo $description ; ?>
                         </p>
                         <br>
                         <a href="#" class="btn btn-primary">Order Now</a>
                     </div>
                 </div>
                 
                             <?php
                 
                         }
                     }
                    else
                 {
                      echo "<div class='error'>Food Not available.</div>";
                 }
                 ?>
                 
                 
                  
                 <div class="clearfix"></div>
            </div>
        </section>
        <!-- food menu section ends -->
<?php include('../partial-front/foot.php') ; ?>