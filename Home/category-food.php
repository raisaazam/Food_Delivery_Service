<?php include('../partial-front/nav.php') ; ?>
<?php
if(isset($_GET['category_id']))
{
    $id = $_GET['category_id'] ;
    $sql2 ="SELECT title FROM category WHERE id=$category_id" ;
    $res2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($res2) ;
    $category_title = $row2['title'] ;
}
else
{
    header('location:');
}
     ?>

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
            $sql = "SELECT * FROM food WHERE category_id=$category_id" ;
            $res = mysqli_query($conn,$sql) ;
            $count = mysqli_num_rows($res) ;
            
            
            
            if($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {
                    
                     $title = $row['title'] ;
                     $price = $row['price'] ;
                     $description = $row['description'] ;
                     $image_name = $row['image_name'] ;
                     
                      
                          
              
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