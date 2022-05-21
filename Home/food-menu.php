<?php include('../partial-front/nav.php') ; ?>


<!-- search section starts -->
        <section class="search text-center">
             <div class="container">
             <form action="search.php" method="post">
                 <input type="search" name="food-search" placeholder="Explore Your Food">
                 <input type="submit" name="submit" value="Search" class="btn btn-primary">
             </form>
            </div>
        </section>
        <!-- search section ends -->
<!-- food menu section starts -->
        <section class="food-menu">
             <div class="container">
             <h2 class="text-center text-white">Food Menu</h2>
                 
                 
                 
                   <?php
            $sql = "SELECT * FROM food LIMIT 6" ;
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
                          <div class="menu">
                     <div class="food-menu-img">
                         <?php
                           if($image_name=="")
                    {
                        echo "<div class='error' >Image not Added</div>" ;
                    }
                    
                    else
                    {
                         ?>
               <img src="../Admin/images/food/<?php echo $image_name ; ?>" alt="pizza" class="img-responsive img-curve">
                  
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
                 
                 else{
                      echo "<tr> <td colspan='7' class='error'>Food not Added any </td></tr>" ;
                 }
                 ?>
                 
                 
                 
                  
                 <div class="clearfix"></div>
            </div>
                 
        </section>
        <!-- food menu section ends -->
<?php include('../partial-front/foot.php') ; ?>