<?php include('../partial-front/nav.php') ; ?>
        
        <!-- search section starts -->
        <section class="search text-center text-white">
             <div class="container">
             <form action="search.php" method="post">
                 <input type="search" name="food-search" placeholder="Explore Your Food">
                 <input type="submit" name="submit" value="Search" class="btn btn-primary">
             </form>
            </div>
        </section>
        <!-- search section ends -->
        <section class="About">
        <div class="container">
           <h2 class="text-center">Our Service</h2>
                <p>
                    We are aware that creating client oriented software
that takes a mixture of technical excellence and clear communication between the customers.This service system provides the best way to ensure receiving qualitiful food service. We know every client is unique and we strive to deliver an individual, innovative and affordable test of our food.Our main target is to increase customer satisfaction by speeding up food delivery and to reduce time wasting.
                </p>
            </div>
            </section>
        <!-- genre section starts -->
        <section class="genre">
             <div class="container">
            <h2 class="text-center">Food List</h2>
                
                      <?php

            //Query to Get all CAtegories from Database
            $sql = "SELECT * FROM category  LIMIT 4 ";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
                     if ($count > 0) {
                
                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    $featured = $row['featured'];
                    $active = $row['active'];


       ?>   
                 <a href="category-food.php?category_id=<?php echo $id ;?>">
                  <div class="box float-container">
                      <?php
                        //Chcek whether image name is available or not
                        if ($image_name == "") {
                            
                        

                              echo "<div class='error'>Image not Added.</div>";

                       
                        } else {
                            ?>
                           <img src="../Admin/images/category/<?php echo $image_name ; ?>" alt="Appetizer" class="img-responsive img-radious">
                       <?php
                        }
                        ?>
                     
                     <h3 class="float-text"><?php echo $title ; ?></h3>
                 </div>
                 </a>
                 <?php
                 }
                 }
                 else{
                      echo "<tr> <td colspan='7' class='error'>Category not Added any </td></tr>" ;
                 }
                 ?>
                 
                  
            </div>
        </section>
        <!-- search section ends -->
   
        <!-- Chef section starts -->
        <section class="chef">
             <div class="container">
             <h1 class="text-center">Our Chefs</h1>
                 
                  <div class="box float-container">
                     <img src="images/image17.jpg" alt="chef1" class="img-responsive img-radious">
                     <h3 class="float-text"></h3>
                      <p class=" text-center">
                            <center>Sufina Ahmed is very hard working.He is responsible for italian cuisine</center>
                        </p>
                 </div> 
                 
                  <div class="box float-container">
                     <img src="images/image9.jpg" alt="chef2" class="img-responsive img-radious">
                     <h3 class="float-text"></h3>
                      <p class=" text-center">
                            <center>Radfin Islam is very hard working.He is responsible for thai cuisine.</center>
                        </p>
                 </div> 
                 
                  <div class="box float-container">
                     <img src="images/image8.jpg" alt="chef3" class="img-responsive img-radious">
                     <h3 class="float-text"></h3>
                      <p class=" text-center">
                            <center>Ruslin Ahsan is very hard working.She is responsible for indian and italian cuisine.</center>
                        </p>
                 </div> 
                 
                 <div class="box float-container">
                     <img src="images/image10.jpg" alt="chef4" class="img-responsive img-radious">
                     <h3 class="float-text"></h3>
                      <p class=" text-center">
                            <center>Shafina Hasan is very hard working.She is responsible for desi cuisine.</center>
                        </p>
                 </div> 
            </div>
            
        </section>
        <!-- Chef section ends -->
        
        <!-- food menu section starts -->
        <section class="food-menu">
             <div class="container">
             <h2 class="text-center">Food Menu</h2>
                
                          <?php
            $sql = "SELECT * FROM food WHERE active='Yes' LIMIT 6" ;
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
        
     <! -- Start Contact Us section -- !>
<div class="container" id="Contact">
            <h2 class="text-center">Contact Us</h2>
          
                        <form action=""  method="POST">
                        <input type="text" class="form-control" name="name" placeholder="Name"><br>
                        <input type="text" class="form-control" name="subject" placeholder="Subject"><br>
                        <input type="email" class="form-control" name="email" placeholder="Email"><br>
                        <textarea input type="text" class="form-control" name="message" placeholder="How can we help you?" style="height:150px;"></textarea><br>
                            <p align="left"><input type="submit" class="btn btn-primary" value="Send" name="submit"></p><br>
                            
      
                    </form>
              
        </div>   
 <! -- end contact us section -- !>  
        
       <?php include('../partial-front/foot.php') ; ?>