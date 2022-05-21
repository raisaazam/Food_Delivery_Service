 <?php include('../partial-front/nav.php') ; ?>

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
                 <?php
                 }
                 }
                 else{
                      echo "<tr> <td colspan='7' class='error'>Category not Added any </td></tr>" ;
                 }
                 ?>
                 
                  
            </div>
                
                 
        </section>
<?php include('../partial-front/foot.php') ; ?>